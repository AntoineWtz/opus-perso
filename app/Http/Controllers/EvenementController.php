<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\GenreMusicaux;
use App\Models\Artiste;
use App\Models\TypeEvenement;
use App\Models\User;
use App\Models\Lieux;
use App\Models\Media;
use App\Models\Galerie;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::with('img')->get();

        return view('evenement.ListeEvenement', compact('evenements'));
    }

    public function create()
    {
        $publicationsNonLiees = Publication::whereNull('evenement_id')->get();
        $type_evenements = TypeEvenement::all();
        $lieux = Lieux::all();
        $artistes = Artiste::all();
        $genre_musicaux = GenreMusicaux::all();

        return view('evenement.FormEvenement', compact('type_evenements', 'lieux', 'artistes', 'genre_musicaux', 'publicationsNonLiees'));
    }

    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        $lieux = Lieux::all();
        $type_evenements = TypeEvenement::all();
        $artistes = Artiste::all();
        $genre_musicaux = GenreMusicaux::all();
        $publicationsNonLiees = Publication::whereNull('evenement_id')->latest()->get();

        return view('evenement.FormEvenement', compact('evenement', 'lieux', 'type_evenements', 'artistes', 'genre_musicaux', 'publicationsNonLiees'));
    }

    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);

        if (!$evenement) {
            return redirect()->back()->with('erreur', 'Événement introuvable');
        }

        $evenement->artistes()->detach();
        $evenement->genreMusicauxes()->detach();
        $evenement->delete();

        return redirect()->back()->with('succes', 'Événement supprimé avec succès');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_evenement_id' => 'required',
            'lieux_id' => 'required',
            'titre' => 'required',
            'date_event' => 'required',
            'mise_en_avant' => 'required',
            'visibilite' => 'required',
            'image_demo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'alt_img_demo' => 'required',
        ]);

        $evenement = new Evenement;
        $evenement->type_evenement_id = $request->type_evenement_id;
        $evenement->lieux_id = $request->lieux_id;
        $evenement->titre = $request->titre;
        $evenement->date_event = $request->date_event;
        $evenement->billeterie = $request->billeterie;
        $evenement->mise_en_avant = $request->mise_en_avant;
        $evenement->visibilite = $request->visibilite;

        if ($request->hasFile('image_demo')) {
            $image = $request->file('image_demo');
            $imagePath = $image->store('public/images');
            $url = Storage::url($imagePath);

            // Enregistrement de l'image dans la table "media"
            $media = new Media;
            $media->chemin = $url;
            $media->balise_alt = $request->alt_img_demo;
            $media->type_media_id = 1;

            $media->save();

            // Liaison de l'image avec l'événement
            $evenement->media_id = $media->id;
        }
        $evenement->save();

        if ($request->has('artiste')) {
            $attach_art = $request['artiste'];
            foreach ($attach_art as $art) {
                $artiste = Artiste::findOrFail($art);

                if (isset($artiste)) {
                    $artiste->evenements()->attach($evenement);
                }
            }
        }

        if ($request->has('genre_musicaux')) {
            $attach_genres = $request['genre_musicaux'];
            foreach ($attach_genres as $genre) {
                $genreMusical = GenreMusicaux::findOrFail($genre);

                if (isset($genreMusical)) {
                    $genreMusical->evenements()->attach($evenement);
                }
            }
        }

        return redirect()->route('GestionEvenement.index')->with('success', 'L\'événement a été créé avec succès.');
    }

    public function update(Request $request, $id)
    {
        $evenement = Evenement::findOrFail($id);

        $validatedData = $request->validate([
            'type_evenement_id' => 'required',
            'lieux_id' => 'required',
            'titre' => 'required',
            'date_event' => 'required',
            'mise_en_avant' => 'required',
            'visibilite' => 'required',
            'image_demo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'alt_img_demo' => 'required',
        ]);

        $evenement->titre = $request->titre;
        $evenement->lieux_id = $request->lieux_id;
        $evenement->type_evenement_id = $request->type_evenement_id;
        $evenement->artiste_id = $request->artiste_id;
        $evenement->billeterie = $request->billeterie;
        $evenement->date_event = $request->date_event;
        $evenement->mise_en_avant = $request->mise_en_avant;
        $evenement->visibilite = $request->visibilite;

        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imagePath = $image->store('public/images');
            $url = Storage::url($imagePath);

            // Mise à jour de l'image dans la table "media"
            $media = $evenement->media;
            if ($media) {
                $media->chemin = $url;
                $media->save();
            }
        }

        $evenement->save();

        return redirect()->back()->with('success', 'L\'événement a été mis à jour avec succès.');
    }
}
