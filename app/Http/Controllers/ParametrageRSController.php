<?php

namespace App\Http\Controllers;

use App\Models\ParametrageRS;
use Illuminate\Http\Request;


class ParametrageRSController extends Controller

{
    public function Index()
    {
        $parametrageRSs = ParametrageRS::all();

        return view('ParametrageRS.ListeParametrageRS')->with('parametrageRSs', $parametrageRSs);
    }
    public function create()
    {
        $parametrageRS = ParametrageRS::all();

        return view('parametrageRS.FormParametrageRS')
            ->with('parametrageRS', $parametrageRS);
    }
    public function edit($id)
    {
        $parametrageRS = ParametrageRS::findOrFail($id);

        return view('parametrageRS.FormParametrageRS')
            ->with('parametrageRS', $parametrageRS);
    }
    public function destroy($id)
    {
        $parametrageRS = ParametrageRS::findOrFail($id);
        if (!$parametrageRS) {
            return redirect()->back()->with('error', 'Parametrage RS introuvable');
        }

        $parametrageRS->delete();
        return redirect()->back()->with('success', 'Parametrage RS supprimé avec succès');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'code' => 'required',
            'token' => 'required',
        ]);

        // Créer un nouvel objet
        $parametrageRS = new ParametrageRS();
        $parametrageRS->nom = $validatedData['nom'];
        $parametrageRS->code = $validatedData['code'];
        $parametrageRS->token = $validatedData['token'];
        $parametrageRS->picto = $validatedData['picto'];

        // Enregistrer dans la base de données
        $parametrageRS->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionParametrageRS.index')->with('success', 'parametrage RS ajouté avec succès');
    }
    public function update(Request $request, $id)
    {
        $parametrageRS = ParametrageRS::findOrFail($id);
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'code' => 'required',
            'token' => 'required',
        ]);
    
        $parametrageRS->nom = $request->nom;
        $parametrageRS->code = $request->code;
        $parametrageRS->token = $request->token;
        $parametrageRS->picto = $request->picto;
    
        $parametrageRS->save();
    
        return redirect()->back()->with('success', 'Parametrage RS a été mis à jour avec succès.');
    }
}