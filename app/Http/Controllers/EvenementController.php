<?php
namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\GenreMusicaux;
use App\Models\Artiste;
use App\Models\TypeEvenement;
use App\Models\User;
use App\Models\Lieux;
use App\Models\Media;
use App\Models\Galerie;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();

        return view('evenement.ListeEvenement')->with('evenements', $evenements);
    }

    public function create()
{
    $publicationsNonLiees = Publication::whereNull('evenement_id')->latest()->get();
    $type_evenements = TypeEvenement::all();
    $lieux = Lieux::all();
    $artistes = Artiste::all();
    $genre_musicaux = GenreMusicaux::all(); 

    return view('evenement.FormEvenement', compact('type_evenements', 'lieux', 'artistes', 'genre_musicaux', 'publicationsNonLiees'));
}


    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        $lieux = Lieux::all();
        $type_evenements = TypeEvenement::all();
        $artistes = Artiste::all();
        $genre_musicaux = GenreMusicaux::all();

        return view('evenement.FormEvenement', compact('evenement', 'lieux', 'type_evenements', 'artistes', 'genre_musicaux'));
    }

    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
    
        if (!$evenement) {
            return redirect()->back()->with('erreur', 'Événement introuvable');
        }
    
        $evenement->artistes()->detach();
        $evenement->genreMusicauxes()->detach();
        $evenement->delete();
    
        return redirect()->back()->with('succes', 'Événement supprimé avec succès');
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_evenement_id' => 'required',
            'lieux_id' => 'required',
            'titre' => 'required',
            'date_event' => 'required',
            'mise_en_avant' => 'required',
            'visibilite' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $evenement = new Evenement;
        $evenement->type_evenement_id = $request->type_evenement_id;
        $evenement->lieux_id = $request->lieux_id;
        $evenement->titre = $request->titre;
        $evenement->date_event = $request->date_event;
        $evenement->billeterie = $request->billeterie;
        $evenement->mise_en_avant = $request->mise_en_avant;
        $evenement->visibilite = $request->visibilite;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $evenement->image = $imagePath;
        }
        $evenement->save();
        
        if($request->has('artiste')){
            $attach_art = $request['artiste'];
            foreach( $attach_art as $arts) {
                 $art = Artiste::findOrFail($arts);

                 if(isset($art)){
                      $art->evenements()->attach($evenement);
                 }

            }
       }

       if($request->has('genre_musicaux')){
        $attach_art = $request['genre_musicaux'];
        foreach( $attach_art as $arts) {
             $art = Genremusicaux::findOrFail($arts);

             if(isset($art)){
                  $art->evenements()->attach($evenement);
             }

        }
   }

        return redirect()->route('GestionEvenement.index')->with('success', 'L\'événement a été créé avec succès.');
    }

    public function update(Request $request, $id)
    {
        $evenement = Evenement::findOrFail($id);

        $validatedData = $request->validate([
            'titre' => 'required',
            'lieux_id' => 'required',
            'type_evenement_id' => 'required',
            'artiste_id' => 'nullable',
            'media' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'billeterie' => 'url',
            'date_event' => 'required|date',
            'mise_en_avant' => 'required',
            'visibilite' => 'required',
        ]);

        $evenement->titre = $request->titre;
        $evenement->lieux_id = $request->lieux_id;
        $evenement->type_evenement_id = $request->type_evenement_id;
        $evenement->artiste_id = $request->artiste_id;
        $evenement->media_id = $request->media;
        $evenement->billeterie = $request->billeterie;
        $evenement->date_event = $request->date_event;
        $evenement->mise_en_avant = $request->mise_en_avant;
        $evenement->visibilite = $request->visibilite;

        $evenement->save();

        return redirect()->back()->with('success', 'L\'événement a été mis à jour avec succès.');
    }
}
