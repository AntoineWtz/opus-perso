<?php

namespace App\Http\Controllers;

use App\Models\Lieux;
use Illuminate\Http\Request;

class LieuxController extends Controller

{
    public function Index()
    {
        $lieuxes = Lieux::all();

        return view('lieux.ListeLieux')->with('lieuxes', $lieuxes);
    }   
    public function create()
    {
        return view('Lieux.FormLieux');
    }
    public function edit($id)
    {
        $lieux = Lieux::findOrFail($id);

        return view('lieux.FormLieux')
            ->with('lieux', $lieux);
    }
    public function destroy($id)
    {
        $lieux = Lieux::findOrFail($id);
        if (!$lieux) {
            return redirect()->back()->with('error', 'Lieux introuvable');
        }

        $lieux->delete();
        return redirect()->back()->with('success', 'Lieux supprimé avec succès');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'visibilite' => 'required',
        ], [
            'nom.required' => 'Veuillez renseigner votre nom',
            'adresse.required' => 'Veuillez renseigner une adresse',
            'visibilite.required' => 'Veuillez renseigner une visibilité',
        ]);

        // Créer un nouvel objet Contact
        $lieux = new Lieux();
        $lieux->nom = $validatedData['nom'];
        $lieux->adresse = $validatedData['adresse'];
        $lieux->visibilite = $validatedData['visibilite'];

        // Enregistrer dans la base de données
        $lieux->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionLieux.index')->with('success', 'Lieux ajouté avec succès');
    }
    public function update(Request $request, $id)
    {
        $lieux = Lieux::findOrFail($id);
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'visibilite' => 'required',
        ], [
            'nom.required' => 'Veuillez renseigner votre nom',
            'adresse.required' => 'Veuillez renseigner une adresse',
            'visibilite.required' => 'Veuillez renseigner une visibilité',
        ]);
    
        $lieux->nom = $request->nom;
        $lieux->adresse = $request->adresse;
        $lieux->visibilite = $request->visibilite;
    
        $lieux->save();
    
        return redirect()->route('GestionLieux.index')->with('success', 'Le lieu a été mis à jour avec succès.');
    }
}
