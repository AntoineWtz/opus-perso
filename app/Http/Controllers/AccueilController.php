<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAffichage;
use App\Models\Media;
use App\Models\Publication;
use App\Models\Evenement;

class AccueilController extends Controller
{
    public function Index()
    {
        $infoAffichages = InfoAffichage::all();
        $medias = Media::all();
        $publications = Publication::all();
        $evenements = Evenement::all();

        return view('accueil')
            ->with('infoAffichages', $infoAffichages)
            ->with('medias', $medias)
            ->with('publications', $publications)
            ->with('evenements', $evenements);
    }
}