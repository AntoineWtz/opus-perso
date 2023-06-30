<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use App\Models\GenreMusicaux;
use App\Models\Artiste;
use App\Models\TypePublication;
use App\Models\User;
use App\Models\Lieux;
use App\Models\Media;
use App\Models\Galerie;
use App\Models\Evenement;
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
         $event = Evenement::all();

         //dd($event->all());
         return view('publication.FormPublication')
                ->with('genre_musicaux' , $genre_musicaux)
                ->with('artiste' , $artistes)
                ->with('type_publication' , $type_publications)
                ->with('user' , $users)
                ->with('lieux' , $lieux)
                ->with('evenement' , $event);
                
    }
    public function edit($id){
         $genre_musicaux = GenreMusicaux::all();
         $artistes = Artiste::all();
         $type_publications = TypePublication::all();
         $users = User::all();
         $lieux = Lieux::all();
         $event = Evenement::all();
           
          return view('publication.FormPublication')
                ->with('genre_musicaux' , $genre_musicaux)
                ->with('artiste' , $artistes)
                ->with('type_publication' , $type_publications)
                ->with('user' , $users)
                ->with('lieux' , $lieux)
                ->with('evenement' , $event);

    }
    public function destroy($id){
         $publication = Publication::findOrFail($id);
         if(!$publication){
              return redirect()->back()->with('erreur' , 'Publication');
          }
          
          $publication->artistes()->detach();
          $publication->genreMusicauxes()->detach();
          $publication->delete();
          return redirect()->back()->with('succes' , 'Publication supprimé avec succès');
 
    }
    public function store(Request $request){ 
          $request->validate([
               'titre' => 'required',
               'image_demo' => 'required',
          ]);

          $type_publication = $request['type_pub'];
          $titre = $request['titre'];
          $descriptif = $request['descriptif'];
          $toulousain = $request['toulousain'];
          $user = $request['user'];
          $statut = $request['statut'];
          $resume_rs = $request['resume_rs'];
          $date_parution = $request['date_parution'];
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
          //création de la video si elle existe
          if($request['video_demo']){
               $url = $request['video_demo'];
               
               $new_video = new Media;
               $new_video->type_media_id = 2;
               $new_video->chemin = $url;
               $new_video->user_id = $user;
               $new_video->save();

               $video_demo = $new_video->id;
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
           
          //liaison publication - event
          if($request->has('evenement') && $request['evenement'] !== "null" ){
                $event = $request['evenement'];
          }
          



          //création de la publication
          $publication = new Publication;
          $publication->type_publication_id = $type_publication;
          $publication->user_id = $user;
          $publication->titre = $titre;
          $publication->image_aperçu = $image_demo;
          if(isset($video_demo)){
               $publication->video_aperçu = $video_demo;
          } else {
               $publication->video_aperçu = $image_demo;
          }
          $publication->descriptif = $descriptif;
          $publication->date_parution = $date_parution;
          $publication->toulousain = $toulousain;
          $publication->resume_rs = $resume_rs;
          $publication->statut = $statut;
          $publication->lieux_id = $lieux ?? null;
          $publication->evenement_id = $event ?? null;
          
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
                       if(isset($photoArtiste[$i]) && $photoArtiste[$i] !== null){
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
                       
                       if ($request->has("genre_musicaux_art" . ($i + 1))) {
                         $genre_art = $request->input("genre_musicaux_art" . ($i + 1));
                         foreach ($genre_art as $g) {
                             $a_g = GenreMusicaux::find($g);
                             $a_g->artistes()->attach($artiste);
                         }
                    }
               }
          }
     }
          //genre musicaux de la publication
          if($request->has('genre_musicaux')) {
               $genre_musicaux = $request['genre_musicaux'];
               for ($i = 0 ; $i < count($genre_musicaux) ; $i++){
                 $genre = GenreMusicaux::findOrFail($genre_musicaux[$i]);
                 $genre->publications()->attach($publication);    
               }
          }
          if($request->has('nomgenremusical') && $request['nomgenremusical'] !== null){
                $nom_genre = $request['nomgenremusical'];
                
                $genre = GenreMusicaux::where('nom', $nom_genre)->first();
                if ($genre) {
                    // Le genre musical existe déjà, retourner au formulaire avec un message d'erreur
                    return redirect()->back()->withInput()->withErrors('Le genre musical existe déjà.');
                }
                $genre = GenreMusicaux::create(['nom' => $nom_genre]);
                $genre->publications()->attach($publication);

          }
          
          //création d'une galerie
          if($request->has('nomgalerie')){
             $nom_galerie = $request['nomgalerie'];
             
             for ($i = 0 ; $i < count($nom_galerie) ; $i++){
                  if($nom_galerie[$i] !== null){
                     $new_galerie = new Galerie;
                     $new_galerie->nom = $nom_galerie[$i];
                     $new_galerie->save();

                     if($request->has("photoGalerie_$i")){
                         
                         $photos = $request->file("photoGalerie_$i");
                         $photographeGal = $request['photographegalerie'];
                         $count = 1;

                         foreach ($photos as $photo) {
                            $path = $photo->store('public/images');
                            $url = Storage::url($path);
                            
                            $gal_img = new Media;
                            $gal_img->type_media_id = 1;
                            $gal_img->chemin = $url;
                            $gal_img->user_id = $user;
                            $gal_img->balise_alt = $nom_galerie[$i] . strval($count) ;
                            if($photographeGal[$i] !== null){
                                 $gal_img->photographe = $photographeGal[$i];
                            }
                            $gal_img->save();
                            $gal_img->galeries()->attach($new_galerie);
                            $count++;                      
                         }
                         if($request->has('artisteGalerie_$i')){
                            $art_gal = $request['artisteGalerie_$i'];

                            foreach ($art_gal as $id){
                              $a = Artiste::findOrFail($id);
                              $a->galerie()->attach($new_galerie); 

                            }
                         }




                     }

                     
                     





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

          return redirect()->route('GestionPublication.index')->with('succes' , 'Publication créer');
    }
    public function show(){

    }
    
}
