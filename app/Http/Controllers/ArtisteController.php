<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Media;
use Illuminate\Http\Request;

class ArtisteController extends Controller

{
    public function Index()
    {
        $artistes = Artiste::all();

        return view('artiste.ListeArtiste')->with('artistes', $artistes);
    }

    public function create()
    {
        $artistes = Artiste::all();

        return view('artiste.FormArtiste');
            
    }

    public function edit($id)
    {
        $artiste = Artiste::findOrFail($id);
        $media = Media::all();
        
       return view('artiste.FormArtiste', compact('artiste', 'media'));

    }

    public function destroy($id)
    {
        $artiste = Artiste::findOrFail($id);
        if (!$artiste) {
            return redirect()->back()->with('error', 'Artiste introuvable');
        }
        
        $artiste->delete();
        return redirect()->back()->with('success', 'Artiste supprimé avec succès');
    }

    public function store(Request $request)
    {
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required',
        'descriptif' => 'required',
    ]);

    // Création d'un nouvel artiste avec les données validées
    $artiste = new Artiste();
    $artiste->nom = $validatedData['nom'];
    $artiste->descriptif = $validatedData['descriptif'];
    if ($request->lien_facebook !== null) {
        $artiste->lien_facebook = $request->lien_facebook;
    }
    if ($request->lien_youtube !== null) {
        $artiste->lien_youtube = $request->lien_youtube;
    }
    if ($request->lien_twitter !== null) {
        $artiste->lien_twitter = $request->lien_twitter;
    }
    if ($request->lien_instagram !== null) {
        $artiste->lien_instagram = $request->lien_instagram;
    }

    // Sauvegarde de l'artiste dans la base de données
    $artiste->save();

    // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
    return redirect()->route('GestionArtiste.index')->with('success', 'Artiste créé avec succès');
    }

    public function update(Request $request, $id)
    {
    $artiste = Artiste::findOrFail($id);

    $validatedData = $request->validate([
        'nom' => 'required',
        'descriptif' => 'required',
    ]);

    $artiste->nom = $request->nom;
    $artiste->descriptif = $request->descriptif;
    if ($request->lien_facebook !== null) {
        $artiste->lien_facebook = $request->lien_facebook;
    }
    if ($request->lien_youtube !== null) {
        $artiste->lien_youtube = $request->lien_youtube;
    }
    if ($request->lien_twitter !== null) {
        $artiste->lien_twitter = $request->lien_twitter;
    }
    if ($request->lien_instagram !== null) {
        $artiste->lien_instagram = $request->lien_instagram;
    }

    $artiste->save();

    return redirect()->route('GestionArtiste.index')->with('success', 'Artiste mis à jour avec succès.');
    }
}
