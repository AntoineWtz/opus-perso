<?php

namespace App\Http\Controllers;

use App\Models\TypeEvenement;
use Illuminate\Http\Request;


class TypeEvenementController extends Controller

{
    public function Index()
    {
        $typeEvenements = TypeEvenement::all();

        return view('TypeEvenement.ListeTypeEvenement')->with('typeEvenements', $typeEvenements);
    }
    
    public function create()
    {
        return view('TypeEvenement.FormTypeEvenement');
    }

    public function edit($id)
        {
    $typeEvenement = TypeEvenement::findOrFail($id);

    return view('TypeEvenement.FormTypeEvenement')
        ->with('typeEvenement', $typeEvenement);
    }


    public function destroy($id)
    {
        $typeEvenement = TypeEvenement::findOrFail($id);
        if (!$typeEvenement) {
            return redirect()->back()->with('error', 'Type Evenement introuvable');
        }

        $typePublication->delete();
        return redirect()->back()->with('success', 'Type Evenement supprimé avec succès');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'type_event' => 'required',
        ]);

        // Créer un nouvel objet Contact
        $typeEvenement = new TypeEvenement();
        $typeEvenement->type_event = $validatedData['type_event'];

        // Enregistrer dans la base de données
        $typeEvenement->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionTypeEvenement.index')->with('success', 'Type Evenement ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $typeEvenement = TypeEvenement::findOrFail($id);
    
        $validatedData = $request->validate([
            'type_event' => 'required',
        ]);
    
        $typeEvenement->type_pub = $request->type_pub;
        $typeEvenement->couleur = $request->couleur;
    
        $typeEvenement->save();
    
        return redirect()->back()->with('success', 'Le type evenement a été mis à jour avec succès.');
    }
}
