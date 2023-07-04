<?php


namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Lieux;
use App\Models\Artiste;
use App\Models\GenreMusicaux;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function index(Request $request)
    {
        // Récupérez tous les événements
        $evenements = Evenement::where('date_event', '>=', date('Y-m-d'))
        ->where('visibilite', 'Actif')
        ->get();

        $genre_musicaux = GenreMusicaux::where('visibilite', 'Actif')->get();
        $artistes = Artiste::all();
        $lieux = Lieux::where('visibilite', 'Actif')->get();


        // // Vérifiez si une recherche a été effectuée
        if ($request->filled('genre_musical') || $request->filled('artiste') || ($request->filled('date_start') && $request->filled('date_end'))) {

            return $this->search($request);
        }

        // Retournez la vue avec les données des événements
        return view('agenda', compact('evenements', 'genre_musicaux', 'artistes', 'lieux'));
    }

    public function search(Request $request)
    {
        $genre_musicaux = GenreMusicaux::where('visibilite', 'Actif')->get();
        $artistes = Artiste::all();
        $lieux = Lieux::where('visibilite', 'Actif')->get();

        // Permet de construire la requête en fonction des filtres de recherche
        $query = Evenement::query();

        // Vérifiez si une recherche par style musical a été effectuée grâce au filled
        // filled : utilisée pour vérifier si une valeur est présente dans la requête et n'est pas vide
        if ($request->filled('genre_musical')) {
            //On récupére la valeur sélectionnée et l'assignons à la variable $genreMusical.
            $genreMusical = $request->input('genre_musical');

            // Convertir la valeur JSON en tableau associatif
            $genreMusicalArray = json_decode($genreMusical, true);

            // Extraire l'ID du genre musical à partir du tableau associatif
            $genreMusicalId = $genreMusicalArray['id'];

            // Utiliser l'ID du genre musical dans la clause whereHas de la requête
            $query->whereHas('genreMusicauxes', function ($query) use ($genreMusicalId) {
                $query->where('genre_musicaux_id', $genreMusicalId);
            });
        }


        // Vérifiez si une recherche par artiste a été effectuée
        if ($request->filled('artiste')) {
            $artisteSearch = $request->input('artiste');

            $query->whereHas('artistes', function ($query) use ($artisteSearch) {
                $query->where('artistes.nom', 'LIKE', '%' . $artisteSearch . '%');
            });
        }

        // Vérifies si les deux dates sont présentes
        if ($request->filled('date_start') && $request->filled('date_end')) {
            $dateStart = $request->input('date_start');
            $dateEnd = $request->input('date_end');
            // Vérifie si date_end est supérieure ou égale à date_start
            if ($dateEnd >= $dateStart) {
                // Utilise la méthode "whereBetween" pour filtrer les événements en fonction de la plage de dates
                $query->whereBetween('date_event', [$dateStart, $dateEnd]);
            } else {
                // La date_end est inférieure à la date_start, vous pouvez prendre une action appropriée, par exemple, rediriger ou afficher un message d'erreur.
                return redirect()->back()->with('error', "La date de fin ne peut pas être inférieure à la date de début.<br> Veuillez renouveler votre choix de période.");
            }
            // $query->whereDate('date_event', '>=', $dateDe)
            // ->whereDate('date_event', '<=', $dateA);
        }


        // Exécutez la requête pour récupérer les événements filtrés
        $evenements = $query->get();

        // Retournez la vue avec les données des événements filtrés
        return view('agenda', compact('evenements', 'genre_musicaux', 'artistes', 'lieux'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
