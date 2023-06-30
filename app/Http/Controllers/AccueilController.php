<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAffichage;
use App\Models\Media;
use App\Models\Publication;
use App\Models\TypePublication;
use App\Models\Evenement;

class AccueilController extends Controller
{
    public function Index()
    {
        $infoAffichages = InfoAffichage::where('visibilite', 'Actif')->get();
        $medias = Media::all();
        $publications = Publication::where('statut', 'Valide')
            ->orderBy('date_parution', 'desc')
            ->get();
        $evenements = Evenement::where('visibilite', 'Actif')->get();

        return view('accueil')
            ->with('infoAffichages', $infoAffichages)
            ->with('medias', $medias)
            ->with('publications', $publications)
            ->with('evenements', $evenements);
    }
}