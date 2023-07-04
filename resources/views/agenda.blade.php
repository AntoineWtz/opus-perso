<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Opus Musique - Le webzine musical toulousain - Agenda/Concert</title>
</head>

<body class="font-poppins">
    <div class="bg-white min-h-screen">
        @include('partials.header')
        <div class="mt-16 mb-8 mx-auto container">

            <div class="m-8 mx-auto bg-yellow-500">
                <form id="search-form" action="{{ route('agenda.index') }}"
                    class="flex flex-wrap mx-auto w-full justify-evenly items-center content-evenly " method="GET">
                    <div class="flex flex-col py-4 px-2">

                        <label for="periodes">
                            Période :
                            <input type="date" id="date_start" name="date_start"
                                value="{{ old('date_start', $dateStart ?? '') }}">
                            <input type="date" id="date_end" name="date_end"
                                value="{{ old('date_end', $dateEnd ?? '') }}">
                        </label>

                    </div>

                    <div class="flex flex-col py-4 px-2">
                        <label for="style-musical">
                            Style musical :
                            <select id="genre_musical" name="genre_musical" class="px-4 py-2">
                                <option value="">Tous les styles</option>
                                @foreach($genre_musicaux as $genre_musical)
                                <!-- ucfirst = Mettre la première lettre de chaque style en Majuscule -->
                                <option value="{{ $genre_musical }}">{{ ucfirst($genre_musical['nom']) }}</option>
                                @endforeach
                            </select>
                        </label>

                    </div>

                    <div class="flex flex-col py-4 px-2">
                        <label for="artiste" class="">
                            Artiste :
                            <input id="artiste" name="artiste" class="px-2 py-2 placeholder:text-base"
                                placeholder="Rechercher votre artiste">
                        </label>
                    </div>

                    <div class="flex flex-col py-4 px-2">
                        <button type="submit" class="transform transition-all hover:scale-125">
                            <img src="{{ asset('asset/icons/recherche-agenda.png') }}" alt="Article" class="h-6 w-6">
                        </button>

                    </div>
                </form>
            </div>
            @if (request()->filled('genre_musical') || request()->filled('artiste') || (request()->filled('date_start')
            && request()->filled('date_end')))
            @if (session('error'))
            <div class="text-2xl text-red-500 font-bold mb-2 flex justify-center">
                {!! session('error') !!}
                <br><br>
            </div>
            @endif
            @if (isset($evenements) && !$evenements->isEmpty())
            <h2 class="text-2xl font-bold mb-2 flex items-center justify-center">
                {{ count($evenements) }} événement{{ count($evenements) > 1 ? 's' : '' }} trouvé{{ count($evenements) >
                1 ? 's' : '' }}
            </h2>
            @else
            <h2 class="text-2xl font-bold mb-2 flex items-center justify-center">
                Aucun événement trouvé
            </h2>
            @endif
            @endif

            @if(isset($evenements))
            <!-- Premier bloc -->
            @foreach ($evenements as $evenement)
            <div class="max-w-4xl mx-auto mb-8">
                <!-- mx-auto = centre horizontalement la div -->
                <!-- <img src="{{ asset('asset/imageConcert/Worakls.jpg') }}" alt="Image de l'événement"
                    class="w-full h-auto object-contain mb-4"> -->
                <!-- $evenement->media->chemin -->
                @foreach ($evenement->artistes as $artiste)
                <h3 class="text-2xl text-yellow-500 font-bold mb-2 flex items-center justify-center">

                    {{ $artiste->nom }}
                    @endforeach
                    @ {{ $evenement->lieux->nom }}
                    - {{ $evenement->date_event->format('d/m/Y') }}
 
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/lien.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                    @if($evenement->billeterie !==NULL) 
                    <a href="{{ $evenement->billeterie}}" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/billet.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                    @endif
                </h3>
                <hr class="max-w-xl mx-auto">
                <!-- Crée une ligne horizontale pour séparer le contenu : max-w-lg définit une largeur max
                mx-auto =centre horizontalement l'élément-->
            </div>
            @endforeach
            @endif
        </div>
        @include('partials.modal')

        @include('partials.footer')
    </div>
</body>

</html>