<?php

namespace App\Http\Controllers;

use App\Models\GenreMusicaux;
use Illuminate\Http\Request;

class GenreMusicauxController extends Controller

{
    public function index()
    {
        $genreMusicauxes = GenreMusicaux::all();

        return view('genreMusicaux.ListeGenreMusicaux')->with('genreMusicauxes', $genreMusicauxes);
    }

    public function create()
    {
        return view('GenreMusicaux.FormGenreMusicaux');
    }

    public function edit($id)
    {
        $genreMusicaux = GenreMusicaux::findOrFail($id);

        return view('genreMusicaux.FormGenreMusicaux')
            ->with('genreMusicaux', $genreMusicaux);
    }

    public function destroy($id)
    {
        $genreMusicaux = GenreMusicaux::findOrFail($id);
        if (!$genreMusicaux) {
            return redirect()->back()->with('error', 'Genre musicaux introuvable');
        }

        $genreMusicaux->delete();
        return redirect()->back()->with('success', 'Genre musicaux supprimé avec succès');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'visibilite' => 'required',
        ], [
            'nom.required' => 'Veuillez renseigner le nom',
            'visibilite.required' => 'Veuillez renseigner la visibilité',
        ]);

        // Créer un nouvel objet Contact
        $genreMusicaux = new GenreMusicaux();
        $genreMusicaux->nom = $validatedData['nom'];
        $genreMusicaux->visibilite = $validatedData['visibilite'];

        // Enregistrer dans la base de données
        $genreMusicaux->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionGenreMusicaux.index')->with('success', 'Genre Musical ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $genreMusicaux = GenreMusicaux::findOrFail($id);
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'visibilite' => 'required',
        ], [
            'nom.required' => 'Veuillez renseigner le nom',
            'visibilite.required' => 'Veuillez renseigner la visibilité',
        ]);
    
        $genreMusicaux->nom = $request->nom;
        $genreMusicaux->visibilite = $request->visibilite;
    
        $genreMusicaux->save();
    
        return redirect()->back()->with('success', 'Le Genre Musical  a été mis à jour avec succès.');
    }
}
