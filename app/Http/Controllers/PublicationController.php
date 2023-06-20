<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use App\Models\GenreMusicaux;
use App\Models\Artiste;
use App\Models\TypePublication;
use App\Models\User;
use App\Models\Lieux;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function Index(){
         $publications = Publication::all();
 
         return view('publication.ListePublication')->with('publications' , $publications);
    }
    public function create(){
         $genre_musicaux = GenreMusicaux::all();
         $artistes = Artiste::all();
         $type_publications = TypePublication::all();
         $users = User::all();
         $lieux = Lieux::all();

         return view('publication.FormPublication')
                ->with('genre_musicaux' , $genre_musicaux)
                ->with('artiste' , $artistes)
                ->with('type_publication' , $type_publications)
                ->with('user' , $users)
                ->with('lieux' , $lieux);
                
    }
    public function edit($id){
         $genre_musicaux = GenreMusicaux::all();
         $artistes = Artiste::all();
         $type_publications = TypePublication::all();
         $users = User::all();
         $lieux = Lieux::all();

           
     return view('publication.FormPublication')
                ->with('genre_musicaux' , $genre_musicaux)
                ->with('artiste' , $artistes)
                ->with('type_publication' , $type_publications)
                ->with('user' , $users)
                ->with('lieux' , $lieux);

    }
    public function destroy($id){
         $publication = Publication::findOrFail($id);
         if(!$publication){
              return redirect()->back()->with('erreur' , 'Publication');
          }
          $publication->delete();
          return redirect()->back()->with('succes' , 'Publication supprimé avec succès');
 
    }
    public function store(Request $request){ 
          $type_publication = $request['type_pub'];
          $titre = $request['titre'];
          $descriptif = $request['descriptif'];
          $genre_musicaux = $request['genre_musicaux'];
          
          //envoie des tables de la publication

          $publication = Publication::create([
                'titre' => $titre,
                'descriptif' => $descriptif,
                
          ]);

          dd($request->all());
    }
    public function show(){

    }
    
}
