<?php

namespace App\Http\Controllers;

use App\Models\MotifContact;
use Illuminate\Http\Request;


class MotifContactController extends Controller

{
    public function Index()
    {
        $motifContacts = MotifContact::all();

        return view('motifContact.ListeMotifContact')->with('motifContacts', $motifContacts);
    }
    public function create()
    {
        return view('motifContact.FormMotifContact');
    }
    public function edit($id)
    {
        $motifContact = MotifContact::findOrFail($id);

        return view('motifContact.FormMotifContact')
            ->with('motifContact', $motifContact);
    }
    public function destroy($id)
    {
        $motifContact = MotifContact::findOrFail($id);
        if (!$motifContact) {
            return redirect()->back()->with('error', 'Contact introuvable');
        }

        $motifContact->delete();
        return redirect()->back()->with('success', 'Contact supprimé avec succès');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'motif' => 'required',
            'email' => 'required|email',
            'visibilite' => 'required',
            'ordre' => 'required|integer|unique:motif_contacts,ordre,' . $request->id,
        ], [
            'motif.required' => 'Veuillez renseigner le motif',
            'email.required' => 'Veuillez renseigner un email valide',
            'visibilite.required' => 'Veuillez renseigner la visibilité',
            'ordre.required' => 'Veuillez renseigner l\'ordre dans le formulaire',
        ]);

        // Créer un nouvel objet Contact
        $motifContact = new MotifContact();
        $motifContact->motif = $validatedData['motif'];
        $motifContact->email = $validatedData['email'];
        $motifContact->visibilite = $validatedData['visibilite'];
        $motifContact->ordre = $validatedData['ordre'];

        // Enregistrer dans la base de données
        $motifContact->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionMotifContact.index')->with('success', 'Motif de contact ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $motifContact = MotifContact::findOrFail($id);
    
        $validatedData = $request->validate([
            'motif' => 'required',
            'email' => 'required|email',
            'visibilite' => 'required',
            'ordre' => 'required|integer|unique:motif_contacts,ordre,' . $motifContact->id,
        ], [
            'motif.required' => 'Veuillez renseigner le motif',
            'email.required' => 'Veuillez renseigner un email valide',
            'visibilite.required' => 'Veuillez renseigner la visibilité',
            'ordre.required' => 'Veuillez renseigner l\'ordre dans le formulaire',
            'ordre.unique' => 'L\'ordre est déjà pris. Veuillez en choisir un autre.',
        ]);
    
        $motifContact->motif = $request->motif;
        $motifContact->email = $request->email;
        $motifContact->visibilite = $request->visibilite;
        $motifContact->ordre = $request->ordre;
    
        $motifContact->save();
    
        return redirect()->route('GestionMotifContact.index')->with('success', 'Le contact a été mis à jour avec succès.');
    }
}
