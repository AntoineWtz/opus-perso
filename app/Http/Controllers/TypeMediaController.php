<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;


class TypeMediaController extends Controller

{
    public function Index()
    {
        $typeMedias = TypeMedia::all();

        return view('typeMedia.ListeTypeMedia')->with('typeMedias', $typeMedias);
    }
    
    public function create()
    {
        return view('TypeMedia.FormTypeMedia');
    }

    public function edit($id)
        {
    $typeMedia = TypeMedia::findOrFail($id);

    return view('TypeMedia.FormTypeMedia')
        ->with('typeMedia', $typeMedia);
    }


    public function destroy($id)
    {
        $typeMedia = TypeMedia::findOrFail($id);
        if (!$typeMedia) {
            return redirect()->back()->with('error', 'Type Media introuvable');
        }

        $typeMedia->delete();
        return redirect()->back()->with('success', 'Type Media supprimé avec succès');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'type_med' => 'required|unique:type_media,type_med,' . $request->id,
        ], [
            'type_med.required' => 'Veuillez renseigner le type de media',
        ]);

        // Créer un nouvel objet Contact
        $typeMedia = new TypeMedia();
        $typeMedia->type_med = $validatedData['type_med'];

        // Enregistrer dans la base de données
        $typeMedia->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionTypeMedia.index')->with('success', 'Type Media ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $typeMedia = TypeMedia::findOrFail($id);
    
        $validatedData = $request->validate([
            'type_med' => 'required|unique:type_media,type_med,' . $typeMedia->id,
        ], [
            'type_med.required' => 'Veuillez renseigner le type de media',
        ]);
    
        $typeMedia->type_med = $request->type_med;
    
        $typeMedia->save();
    
        return redirect()->back()->with('success', 'Le type type de Média a été mis à jour avec succès.');
    }
}
