<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenreMusicaux;

class GenreMusicauxController extends Controller
{
    //
    public function create() {
        return view('genre_musicaux.FormGenreMusicaux');
    }
    public function store(Request $request){
        $nom = $request;
        
        GenreMusicaux::create([
              'nom' => $request,
              'visibilite' => 'Actif'
        ]);

    }
    
}
