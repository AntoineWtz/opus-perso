<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function Index(){
         $publications = Publication::all();
 
         return view('publication.ListePublication')->with('publications' , $publications);
    }
    public function create(){

    }
    public function edit(){

    }
    public function remove(){

    }
}
