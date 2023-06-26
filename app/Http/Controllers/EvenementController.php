<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Media;
use App\Models\GenreMusicaux;
use App\Models\Artiste;
use App\Models\TypeEvenement;
use App\Models\Lieux;
use Illuminate\Http\Request;


class EvenementController extends Controller

{
    public function Index()
    {
        $evenements = Evenement::all();

        return view('evenement.ListeEvenement')->with('evenements', $evenements);
    }
    public function create()
    {
        $type_evenements = TypeEvenement::all();
        $lieux = Lieux::all();

        return view('evenement.FormEvenement')
            ->with('type_evenements', $type_evenements)
            ->with('lieux', $lieux);
    }

    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        $lieux = Lieux::all();
        $type_evenements = TypeEvenement::all();
       return view('evenement.FormEvenement')
            ->with('evenement', $evenement)
            ->with('lieux', $lieux)
            ->with('type_evenements', $type_evenements);
    }

    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        if (!$evenement) {
            return redirect()->back()->with('error', 'Evenement introuvable');
        }

        $evenement->delete();
        return redirect()->back()->with('success', 'Événement supprimé avec succès');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'type_evenement_id' => 'required',
            'lieux_id' => 'required',
            'titre' => 'required',
            // 'descriptif' => 'required',
            'date_event' => 'required',
            'billeterie' => 'nullable|url',
            'mise_en_avant' => 'required',
            'visibilite' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Créer un nouvel événement
        $evenement = new Evenement;
        $evenement->type_evenement_id = $validatedData['type_evenement_id'];
        $evenement->lieux_id = $validatedData['lieux_id'];
        $evenement->titre = $validatedData['titre'];
        // $evenement->descriptif = $validatedData['descriptif'];
        $evenement->date_event = $validatedData['date_event'];
        $evenement->billeterie = $validatedData['billeterie'];
        $evenement->mise_en_avant = $validatedData['mise_en_avant'];
        $evenement->visibilite = $validatedData['visibilite'];

        // Gérer l'upload de l'image s'il y en a une
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $evenement->image = $imagePath;
        }

        // Enregistrer l'événement dans la base de données
        $evenement->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionEvenement.index')->with('success', 'L\'événement a été créé avec succès.');

    }

    public function update(Request $request, $id)
    {
        $evenement = Evenement::findOrFail($id);
    
        $validatedData = $request->validate([
            'titre' => 'required',
            // 'descriptif' => 'required',
            'lieux_id' => 'required',
            'type_evenement_id' => 'required',
            'media' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'billeterie' => 'url',
            'date_event' => 'required|date',
            'mise_en_avant' => 'required',
            'visibilite' => 'required',
        ]);
    
        $evenement->titre = $request->titre;
        $evenement->lieux_id = $request->lieux_id;
        $evenement->type_evenement_id = $request->type_evenement_id;
        // $evenement->descriptif = $request->descriptif;
        $evenement->media_id = $request->media;
        $evenement->billeterie = $request->billeterie;
        $evenement->date_event = $request->date_event;
        $evenement->mise_en_avant = $request->mise_en_avant;
        $evenement->visibilite = $request->visibilite;
    
        $evenement->save();
    
        return redirect()->back()->with('success', 'L\'événement a été mis à jour avec succès.');
    }
}
