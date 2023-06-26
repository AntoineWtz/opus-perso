<?php

namespace App\Http\Controllers;
use App\Models\Galerie;
use Illuminate\Http\Request;

class GalerieController extends Controller

{
    public function Index()
    {
        $galeries = Galerie::all();

        return view('galerie.ListeGalerie')->with('galeries', $galeries);
    }   
    public function create()
    {
    }
    public function edit()
    {
    }
    public function destroy($id)
    {
        $galerie = Galerie::findOrFail($id);
        if (!$galerie) {
            return redirect()->back()->with('error', 'Galerie introuvable');
        }
        
        $galerie->delete();
        return redirect()->back()->with('success', 'Galerie supprimé avec succès');
    }
}