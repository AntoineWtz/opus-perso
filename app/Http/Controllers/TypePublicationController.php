<?php

namespace App\Http\Controllers;

use App\Models\TypePublication;
use Illuminate\Http\Request;


class TypePublicationController extends Controller

{
    public function Index()
    {
        $typePublications = TypePublication::all();

        return view('TypePublication.ListeTypePublication')->with('typePublications', $typePublications);
    }
    
    public function create()
    {
        return view('TypePublication.FormTypePublication');
    }

    public function edit($id)
        {
    $typePublication = TypePublication::findOrFail($id);

    return view('TypePublication.FormTypePublication')
        ->with('typePublication', $typePublication);
    }


    public function destroy($id)
    {
        $typePublication = TypePublication::findOrFail($id);
        if (!$typePublication) {
            return redirect()->back()->with('error', 'Type Publication introuvable');
        }

        $typePublication->delete();
        return redirect()->back()->with('success', 'Type Publication supprimé avec succès');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'type_pub' => 'required',
        ]);

        // Créer un nouvel objet Contact
        $typePublication = new TypePublication();
        $typePublication->type_pub = $validatedData['type_pub'];

        // Enregistrer dans la base de données
        $typePublication->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionTypePublication.index')->with('success', 'Type publication ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $typePublication = TypePublication::findOrFail($id);
    
        $validatedData = $request->validate([
            'type_pub' => 'required',
        ]);
    
        $typePublication->type_pub = $request->type_pub;
    
        $typePublication->save();
    
        return redirect()->back()->with('success', 'Le type evenement a été mis à jour avec succès.');
    }
}
