<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use App\Models\GenreMusicaux;
use App\Models\Artiste;
use App\Models\TypePublication;
use App\Models\User;
use App\Models\Lieux;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
          if($request->has('photographe_img')){
               $photographe_demo = $request['photographe_img'];
          }
          if($request->has('alt_img_demo')){
               $alt = $request['alt_img_demo'];
          }         
          //création de l'image de démo
          if($request['image_demo']){
               $file = $request->file('image_demo');
               $path = $file->store('public/images');
               $url = Storage::url($path);
              
               $new_img = new Media;
               $new_img->type_media_id = 1;
               $new_img->chemin = $url;
               $new_img->user_id = $user;
               if($alt){
                    $new_img->balise_alt = $alt;
               }
               if($photographe_demo){
                    $new_img->photographe = $photographe_demo;
               }
               $new_img->save();
               $image_demo = $new_img->id;

          }

          //création du lieux de la publication
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
          $publication->image_demo = $image_demo;
          $publication->descriptif = $descriptif;
          $publication->toulousain = $toulousain;
          $publication->statut = $statut;
          $publication->lieux_id = $lieux ?? null;
          
          $publication->save();
          
          //creation d'un artiste
          if($request->has('nomArtiste')) {
               $nomsArtiste = $request['nomArtiste'];
               if($request['descriptifArtiste']){
                    $descArtiste = $request['descriptifArtiste'];
               }
               if($request['photoArtiste']){
                    $photoArtiste = $request['photoArtiste'];
               }
               if($request['facebook']){
                    $facebookArtiste = $request['facebook'];
               }
               if($request['youtube']){
                    $youtubeArtiste = $request['youtube'];
               }
               if($request['twitter']){
                    $twitterArtiste = $request['twitter'];
               }
               if( $request['instagram']){
                    $instagramArtiste = $request['instagram'];
               }
               

               for($i = 0 ; $i < count($nomsArtiste) ; $i++ ){
                  if($nomsArtiste[$i] !== null){

                       $artiste = new Artiste;
                       $artiste->nom = $nomsArtiste[$i];
                       if($descArtiste[$i] !== null){
                            $artiste->descriptif = $descArtiste[$i];
                       }
                       if($photoArtiste[$i] && $photoArtiste[$i] !== null){
                            $file = $request->file('photoArtiste')[$i];
                            $path = $file->store('public/images');
                            $url = Storage::url($path);
                            
                            $art_img = new Media;
                            $art_img->type_media_id = 1;
                            $art_img->chemin = $url;
                            $art_img->user_id = $user;
                            $art_img->balise_alt = $nomsArtiste[$i];
                            $art_img->save();
                            $pdpArtiste = $art_img->id;

                            $artiste->media_id = $pdpArtiste;
                       }
                       if($facebookArtiste[$i] && $facebookArtiste[$i] !== null){
                            $artiste->lien_facebook = $facebookArtiste[$i];
                       }
                       if($youtubeArtiste[$i] && $youtubeArtiste[$i] !== null){
                            $artiste->lien_youtube = $youtubeArtiste[$i];
                       }
                       if($twitterArtiste[$i] && $twitterArtiste[$i] !== null){
                            $artiste->lien_twitter = $twitterArtiste[$i];
                       }
                       if($instagramArtiste[$i] && $instagramArtiste[$i] !== null){
                            $artiste->lien_instagram = $instagramArtiste[$i];
                         }
                       $artiste->save();        
                       $artiste->publications()->attach($publication);                  
                    }
               }
          }
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          


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
