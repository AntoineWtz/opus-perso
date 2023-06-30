<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <title>Opus Musique - Accueil / Le webzine musical toulousain</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body class="font-poppins">
    <div class="bg-white min-h-screen">
        @include('partials.header')
        <!-- BLOC PAGE -->
        <div class="mt-16 mb-8 mx-auto container">
            <!-- CARROUSEL -->
            <div class="mt-8 autoplay mx-auto text-center"> 
                @foreach ($infoAffichages as $infoAffichage)
                    @if ($infoAffichage->zone === '1')
                    <div class="relative p-4">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset($infoAffichage->media->chemin) }}" alt="{{ $infoAffichage->media->balise_alt}}" class="w-full">
                            <h2 class="absolute top-1/2 right-0 mt-12 px-2 py-1 text-lg text-black font-bold sm:text-2xl bg-yellow-500 mr-8">{{ $infoAffichage->titre }}</h2>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <!-- FIN CARROUSEL -->

            <!-- BLOC PUBLICATIONS -->
            <div>
                <!-- titre -->
                <div class="flex justify-between items-center m-16">
                    <h2 class="text-3xl font-bold text-center text-black uppercase underline decoration-4 decoration-yellow-500">Publications récentes</h2>
                    <hr class="my-4" style="width: 50%;">
                </div>

                <!-- bloc publis -->
    <div class="flex flex-col md:flex-row justify-between items-center">
        <!-- bloc gauche => créer boucle pour afficher les deux publications récentes -->
        <div class="flex flex-col items-center w-full md:w-1/2">
            @foreach($publications->take(2) as $publication)
                <div class="relative m-4">
                    <img src="{{ asset($publication->Img->chemin) }}" alt="photoPublication" class="w-full h-auto aspect-w-3 aspect-h-2">
                    <div class="absolute top-1/2 right-4 text-right">
                        <span class="text-lg px-2 py-1 bg-yellow-500 text-black font-semibold">{{ $publication->typePublication->type_pub }}</span>
                        <h2 class="text-2xl mt-4 text-white font-bold">{{ $publication->titre }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- bloc droit => créer boucle pour afficher les trois autres publications récentes -->
        <div class="flex flex-col justify-between items-stretch w-auto md:w-auto">
            @foreach($publications->slice(2, 3) as $publication)
                <div class="flex items-center justify-between m-4">
                    <div class="m-4">
                        <h3 class="text-2xl mb-4 font-bold">{{ $publication->titre }}</h3>
                        <span class="text-lg px-2 py-1 bg-yellow-500 text-black font-semibold">{{ $publication->typePublication->type_pub }}</span>
                    </div>
                    <img src="{{ asset($publication->Img->chemin) }}" alt="photoPublication" class="w-64 h-64 object-cover">
                </div>
            @endforeach
        </div>
    </div>
            </div>
            <!-- FIN PUBLICATIONS -->

            <!-- BLOC AGENDA -->
            <div>
                <div class="flex justify-between items-center m-16">
                    <h2 class="text-3xl font-bold text-center text-black uppercase underline decoration-4 decoration-yellow-500">Agenda</h2>
                    <hr class="my-4" style="width: 50%;">
                </div>
                <div class="flex flex-wrap lg:justify-between items-center justify-center">
                @foreach ($evenements->sortBy('date_event')->take(6) as $evenement)
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset($evenement->media->chemin) }}" alt="Photo de l'événement">
                            <p class="text-xl">{{ $evenement->titre}}</p>
                            <p>{{ $evenement->lieux->nom }} {{ date('d/m/Y', strtotime($evenement->date_event)) }}</p>
                        </div>
                @endforeach
                </div>
            </div>
            <!-- FIN AGENDA -->

            <!-- CARROUSEL 2  --> 
            <div class="mt-8 autoplay mx-auto text-center"> 
                @foreach ($infoAffichages as $infoAffichage)
                    @if ($infoAffichage->zone === '2')
                    <div class="relative p-4">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset($infoAffichage->media->chemin) }}" alt="{{ $infoAffichage->media->balise_alt}}" class="w-full">
                            <h2 class="absolute top-1/2 right-0 mt-12 px-2 py-1 text-lg text-black font-bold sm:text-2xl bg-yellow-500 mr-8">{{ $infoAffichage->titre }}</h2>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <!-- FIN CARROUSEL 2 -->
        </div>
        <!-- FIN PAGE ACCUEIL -->
        @include('partials.modal')
        @include('partials.footer')
    </div>
</body>
</html>