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
        return view('genreMusicaux.FormGenreMusicaux');
    }
    public function store(Request $request)
    {
        $nom = $request;

        GenreMusicaux::create([
            'nom' => $request,
            'visibilite' => 'Actif'
        ]);
    }
    public function edit()
    {
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
    public function update(Request $request, $id)
    {
        $genreMusicaux = GenreMusicaux::findOrFail($id);
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'visibilite' => 'required',
        ]);
    
        $genreMusicaux->nom = $request->nom;
        $genreMusicaux->visibilite = $request->visibilite;
    
        $genreMusicaux->save();
    
        return redirect()->back()->with('success', 'Le Genre Musicale  a été mis à jour avec succès.');
    }
}
