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
          $request->validate([
               'titre' => 'required',
               'descriptif' => 'required'
          ]);

          $type_publication = $request['type_pub'];
          $titre = $request['titre'];
          $descriptif = $request['descriptif'];
          $genre_musicaux = $request['genre_musicaux'];
          $toulousain = $request['toulousain'];
          $user = $request['user'];
          $statut = $request['statut'];
          
          if($request->has('lieux') && $request['lieux'] !== "null"){
               $lieux = $request['lieux'];
          }
          else if($request->has('nomLieux') && $request->has('adresseLieux') && $request['nomLieux'] !== null && $request['adresseLieux']) {

               $newlieux = Lieux::create([
                    'nom' => $request['nomLieux'],
                    'adresse' => $request['adresseLieux'],
                    'visibilite' => 'Actif',
               ]);

               $lieux = $newlieux->id;
          }
          

          $publication = new Publication;
          $publication->type_publication_id = $type_publication;
          $publication->user_id = $user;
          $publication->titre = $titre;
          $publication->descriptif = $descriptif;
          $publication->toulousain = $toulousain;
          $publication->statut = $statut;
          if(isset($lieux)){
               $publication->lieux_id = $lieux;
          };
          $publication->save();


          //envoie des tables de la publication
          // $publication = Publication::create([
          //       'type_publication_id' => $type_publication,
          //       'user_id' => $user,
          //       'titre' => $titre,
          //       'descriptif' => $descriptif,
          //       'toulousain' => $toulousain,
          //       'statut' => $statut,
          //       'lieux_id' => $lieux ?: null,
                 


          // ]);

         dd($request->all());
          return redirect()->route('GestionPublication.index')->with('succes' , 'Publication créer');
    }
    public function show(){

    }
    
}
