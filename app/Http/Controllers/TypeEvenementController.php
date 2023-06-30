<?php

namespace App\Http\Controllers;

use App\Models\TypeEvenement;
use Illuminate\Http\Request;


class TypeEvenementController extends Controller

{
    public function Index()
    {
        $typeEvenements = TypeEvenement::all();

        return view('typeEvenement.ListeTypeEvenement')->with('typeEvenements', $typeEvenements);
    }
    
    public function create()
    {
        return view('typeEvenement.FormTypeEvenement');
    }

    public function edit($id)
        {
    $typeEvenement = TypeEvenement::findOrFail($id);

    return view('typeEvenement.FormTypeEvenement')
        ->with('typeEvenement', $typeEvenement);
    }


    public function destroy($id)
    {
        $typeEvenement = TypeEvenement::findOrFail($id);
        if (!$typeEvenement) {
            return redirect()->back()->with('error', 'Type Evenement introuvable');
        }

        $typeEvenement->delete();
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
    
        $typeEvenement->type_event = $request->type_event;
    
        $typeEvenement->save();
    
        return redirect()->route('GestionTypeEvenement.index')->with('success', 'Le type evenement a été mis à jour avec succès.');
    }
}
