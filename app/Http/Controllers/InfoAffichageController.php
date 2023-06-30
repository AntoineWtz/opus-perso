<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAffichage;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class InfoAffichageController extends Controller
{
    public function Index()
    {
        $infoAffichages = InfoAffichage::all();

        return view('infoAffichage.ListeInfoAffichage')->with('infoAffichages', $infoAffichages);
    }

    public function create()
    {
        $medias = Media::all();
    
        return view('infoAffichage.FormInfoAffichage')
            ->with(['media' => $medias]);
    }
    
    public function edit($id)
    {
        $infoAffichage = InfoAffichage::findOrFail($id);
        $medias = Media::all();
        return view('infoAffichage.FormInfoAffichage')
            ->with('infoAffichage', $infoAffichage)
            ->with('medias', $medias);
    }
    
    public function destroy($id)
    {
        $infoAffichage = InfoAffichage::findOrFail($id);
        if (!$infoAffichage) {
            return redirect()->route('GestionInfoAffichage.index')->with('error', 'InfoAffichage non trouvé');
        }
        $infoAffichage->delete();
        return redirect()->route('GestionInfoAffichage.index')->with('success', 'InfoAffichage supprimé avec succès');
    }

    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $validatedData = $request->validate([
            'media_id' => 'required',
            'titre' => 'required',
            'zone' => 'nullable',
            'visibilite' => 'nullable',
            'ordre' => 'nullable',
            'chemin' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'balise_alt' => 'required',
            'modifieur' => 'nullable',
            'photographe' => 'nullable',
        ]);

        // Créer un nouveau InfoAffichage
        $infoAffichage = new InfoAffichage();
        $infoAffichage->media_id = $validatedData['media_id'];
        $infoAffichage->titre = $validatedData['titre'];
        $infoAffichage->zone = $validatedData['zone'];
        $infoAffichage->visibilite = $validatedData['visibilite'];
        $infoAffichage->ordre = $validatedData['ordre'];
        $infoAffichage->chemin = $validatedData['chemin'];
        $infoAffichage->balise_alt = $validatedData['balise_alt'];

        // Gestion upload image
        if ($request->hasFile('chemin')) {
            $image = $request->file('chemin');
            $imagePath = $image->store('public/images');
            $infoAffichage->chemin = $imagePath;
        }

        // Enregistre le InfoAffichage
        $infoAffichage->save();

        return redirect()->route('GestionInfoAffichage.index')->with('success', 'InfoAffichage créé avec succès');
    }

    public function update(Request $request, $id)
    {
        $infoAffichage = InfoAffichage::findOrFail($id);
    
        $validatedData = $request->validate([
            'media_id' => 'required',
            'titre' => 'required',
            'zone' => 'nullable',
            'visibilite' => 'nullable',
            'ordre' => 'nullable',
            'chemin' => 'image|mimes:jpeg,png,jpg|max:2048',
            'balise_alt' => 'required',
            'modifieur' => 'nullable',
            'photographe' => 'nullable',
        ]);
    
        $infoAffichage->media_id = $request->media_id;
        $infoAffichage->titre = $request->titre;
        $infoAffichage->zone = $request->zone;
        $infoAffichage->visibilite = $request->visibilite;
        $infoAffichage->ordre = $request->ordre;
        $infoAffichage->chemin = $request->chemin;
        $infoAffichage->balise_alt = $request->balise_alt;
        
        $infoAffichage->save();
    
        return redirect()->back()->with('success', 'InfoAffichage mis à jour avec succès');
    }
    
}
