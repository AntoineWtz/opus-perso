<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <title>Opus Musique - Le webzine musical toulousain - Accueil</title>
    <!-- Slick carousel -->
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
            <!-- CARROUSEL A LA UNE => créer la boucle qui
             récupère les publications indiquées à la une dans le back office  -->
            <div class="mt-8 autoplay mx-auto text-center"> 
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/wallace.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-yellow-500 text-white font-semibold rounded">Brève</span>
                        <h2 class="absolute top-1/2 right-0 mt-12 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Wallace Cleaver : la poésie urbaine qui transperce les mots</h2>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/damlif.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-white text-yellow-500 font-semibold rounded">Interview</span>
                        <h2 class="absolute top-1/2 right-0 mt-12 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Damlif : son nouveau projet "Maison à l'aide"</h2>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/laylow.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-black text-white font-semibold rounded">Concert</span>
                        <h2 class="absolute top-1/2 right-0 mt-12 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Laylow en concert au Zénith le 32/06/2024</h2>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/mandarine.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-black text-yellow-500 font-semibold rounded">Photos</span>
                        <h2 class="absolute top-1/2 right-0 mt-12 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Mandarine, les coulisses d'un groupe acidulé</h2>
                    </div>
                </div>
            </div>
            <!-- FIN CARROUSEL -->

            <!-- BLOC DERNIERES PUBLICATIONS -->
            <div>
                <div class="flex justify-between items-center m-16">
                    <h2 class="text-3xl font-bold text-center">Dernières publications</h2>
                    <hr class="my-4" style="width: 50%;">
                </div>
            <!-- BLOC PUBLICATIONS -->
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <!-- bloc gauche => créer boucle pour afficher les deux publications récentes -->
                    <div class="flex flex-col sm:items-center">
                        <div class="relative">
                            <img src="{{ asset('asset/imageAccueil/zinee-mini.png') }}" alt="photoPublication" class="w-full">
                            <div class="absolute top-1/2 right-4 text-right">
                                <span class="text-sm px-2 py-1 bg-black text-white font-semibold rounded">Concert</span>
                                <h2 class="text-lg mt-4 text-white">Zinée au Métronum le 30 Février</h2>
                            </div>
                        </div>
                        <div class="relative mt-8">
                            <img src="{{ asset('asset/imageAccueil/mandarine-mini.png') }}" alt="photoPublication" class="w-full">
                            <div class="absolute top-1/2 right-4 text-right">
                                <span class="text-sm px-2 py-1 bg-white text-yellow-500 font-semibold rounded">Interview</span>
                                <h2 class="text-lg mt-4 text-white">On épluche les créations de Mandarine</h2>
                            </div>
                        </div>
                    </div>
                    <!-- bloc droit => créer boucle pour afficher les trois autres publications récentes -->
                    <div class="flex-col justify-between items-center mt-8 sm:mt-0">
                        <div class="flex items-center justify-between">
                            <div class="m-4">
                                <h3 class="text-lg mb-4">Damlif - Maison à l'Aide</h3>
                                <span class="text-sm px-2 py-1 bg-gray-100 text-yellow-500 font-semibold rounded">Interview</span>
                            </div>
                            <img src="{{ asset('asset/imageAccueil/damlif-mini.png') }}" alt="photoPublication">
                        </div>
                        <div class="flex items-center justify-between mt-8">
                            <div class="m-4">
                                <h3 class="text-lg mb-4">Li$on - Weapons</h3>
                                <span class="text-sm px-2 py-1 bg-yellow-500 text-white font-semibold rounded">Brève</span>
                            </div>
                            <img src="{{ asset('asset/imageAccueil/lison-mini.png') }}" alt="photoPublication">
                        </div>
                        <div class="flex items-center justify-between mt-8">
                            <div class="m-4">
                                <h3 class="text-lg mb-4">Al'Tarba & DJ Nix'on @Dour Festival</h3>
                                <span class="text-sm px-2 py-1 bg-black text-yellow-500 font-semibold rounded">Photos</span>
                            </div>
                            <img src="{{ asset('asset/imageAccueil/altarba-mini.png') }}" alt="photoPublication">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN BLOC PUBLICATIONS -->

            <!-- BLOC AGENDA -->
            <div>
                <div class="flex justify-around items-center m-16">
                    <h2 class="text-3xl font-bold text-center">Concerts à venir</h2>
                    <hr class="my-4" style="width: 50%;">
                </div>
                <!-- Contenu de la grille => créer une boucle avec un des blocs 
                pour afficher les 6 dernières publications Evenements -->
                <div class="flex flex-wrap lg:justify-between items-center justify-center">
                    <div class="flex flex-col items-center text-center mb-4">
                        <img src="{{ asset('asset/imageAccueil/zinee.png') }}" alt="photoEvent">
                        <p class="text-xl">Artiste - Date</p>
                        <p>Lieu du concert</p>
                    </div>
                    <div class="flex flex-col items-center text-center mb-4">
                        <img src="{{ asset('asset/imageAccueil/wallace2.png') }}" alt="photoEvent">
                        <p class="text-xl">Artiste - Date</p>
                        <p>Lieu du concert</p>
                    </div>
                    <div class="flex flex-col items-center text-center mb-4">
                        <img src="{{ asset('asset/imageAccueil/damlif2.png') }}" alt="photoEvent">
                        <p class="text-xl">Artiste - Date</p>
                        <p>Lieu du concert</p>
                    </div>
                    <div class="flex flex-col items-center text-center mb-4">
                        <img src="{{ asset('asset/imageAccueil/zinee.png') }}" alt="photoEvent">
                        <p class="text-xl">Artiste - Date</p>
                        <p>Lieu du concert</p>
                    </div>
                    <div class="flex flex-col items-center text-center mb-4">
                        <img src="{{ asset('asset/imageAccueil/wallace2.png') }}" alt="photoEvent">
                        <p class="text-xl">Artiste - Date</p>
                        <p>Lieu du concert</p>
                    </div>
                    <div class="flex flex-col items-center text-center mb-4">
                        <img src="{{ asset('asset/imageAccueil/damlif2.png') }}" alt="photoEvent">
                        <p class="text-xl">Artiste - Date</p>
                        <p>Lieu du concert</p>
                    </div>
                </div>
            </div>

            <!-- DEUXIEME CARROUSEL -->
            <div class="mt-16 autoplay mx-auto text-center"> 
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/wallace.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-yellow-500 text-white font-semibold rounded">Brève</span>
                        <h2 class="absolute top-1/2 right-0 mt-8 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Wallace Cleaver : la poésie urbaine qui transperce les mots</h2>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/damlif.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-white text-yellow-500 font-semibold rounded">Interview</span>
                        <h2 class="absolute top-1/2 right-0 mt-8 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Damlif : son nouveau projet "Maison à l'aide"</h2>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/laylow.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-black text-white font-semibold rounded">Concert</span>
                        <h2 class="absolute top-1/2 right-0 mt-8 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Laylow en concert au Zénith le 32/06/2024</h2>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('asset/imageAccueil/mandarine.png') }}" alt="photoPublication" class="w-full">
                        <span class="absolute top-1/2 right-0 mr-8 px-2 py-1 bg-black text-yellow-500 font-semibold rounded">Photos</span>
                        <h2 class="absolute top-1/2 right-0 mt-8 mr-4 px-2 py-1 text-lg text-white font-bold sm:text-2xl">Mandarine, les coulisses d'un groupe acidulé</h2>
                    </div>
                </div>
                <!-- FIN CARROUSEL -->
            </div>
        </div>
        <!-- FIN PAGE ACCUEIL -->
        @include('partials.modal')

        @include('partials.footer')
    </div>
    
</body>

</html>