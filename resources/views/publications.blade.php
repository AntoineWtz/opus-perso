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
            <!-- DEBUT BLOC 1 - publications à la une -->
            <div class="flex flex-col lg:flex-row justify-around items-stretch">
                <div class="w-full lg:w-1/2 relative lg:m-0 sm:m-2">
                    <img src="{{ asset('asset/imagePublications/wallace-big.png') }}" alt="">
                    <a href="/publication" class="hover:opacity-75">
                    <div class="absolute bottom-0 left-0 p-8">
                        <h2 class="text-2xl font-bold text-white mb-4">Wallace Cleaver</h2>
                        <span class="px-2 py-1 bg-yellow-500 text-white font-semibold rounded">Brève</span>
                    </div>
                    </a>
                </div>
                <div class="w-full lg:w-1/2 flex justify-between items-center">
                    <div>
                        <div class="relative sm:mt-4 lg:mt-0 m-2">
                            <img src="{{ asset('asset/imagePublications/altarba.png') }}" alt="">
                            <div class="absolute bottom-0 left-0 p-8">
                                <h2 class="text-lg font-bold text-white mb-4">Al'Tarba & DJ Ni'xon</h2>
                                <span class="px-2 py-1 bg-black text-yellow-500 font-semibold rounded">Photos</span>
                            </div>
                        </div>
                        <div class="relative sm:mt-4 lg:mt-0 m-2">
                            <img src="{{ asset('asset/imagePublications/lison.png') }}" alt="">
                            <div class="absolute bottom-0 left-0 p-8">
                                <h2 class="text-lg font-bold text-white mb-4">Li$on - Weapons</h2>
                                <span class="px-2 py-1 bg-yellow-500 text-white font-semibold rounded">Brève</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative sm:mt-4 lg:mt-0 m-2">
                            <img src="{{ asset('asset/imagePublications/damlif1.png') }}" alt="">
                            <div class="absolute bottom-0 left-0 p-8">
                                <h2 class="text-lg font-bold text-white mb-4">Damlif - Maison à l'aide</h2>
                                <span class="px-2 py-1 bg-white text-yellow-500 font-semibold rounded">Interview</span>
                            </div>
                        </div>
                        <div class="relative sm:mt-4 lg:mt-0 m-2">
                            <img src="{{ asset('asset/imagePublications/larafabian.png') }}" alt="">
                            <div class="absolute bottom-0 left-0 p-8">
                                <h2 class="text-lg font-bold text-white mb-4">Lara Fabian</h2>
                                <span class="px-2 py-1 bg-black text-white font-semibold rounded">Concert</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN BLOC 1 -->
            <!-- BLOC 2 -->
            <div>
                <div class="flex justify-between items-center m-16">
                    <h2 class="text-3xl font-bold text-center">Publications récentes</h2>
                    <hr class="my-4" style="width: 50%;">
                </div>
                <div class="flex flex-wrap items-stretch justify-center lg:justify-between mx-auto">
                    <div>
                        <img src="{{ asset('asset/imagePublications/mandarine.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/boro.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/zinee.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/boro.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/zinee.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div class="overflow-hidden">
                        <img src="{{ asset('asset/imagePublications/mandarine.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/zinee.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/mandarine.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/boro.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/zinee.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/mandarine.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/imagePublications/boro.png') }}" alt="">
                        <h3 class="text-xl font-bold text-center text-yellow-500 mt-4">Titre de la publication</h3>
                        <p class="text-center text-gray-500 mb-8">Auteur - Date</p>
                    </div>
                </div>
            </div>
            <!-- FIN BLOC 2 -->
            <!-- BLOC PAGINATION à faire -->
            <div class="flex justify-around my-8">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300 rounded-l-md"><</a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300">1</a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300">2 </a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300">3</a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300">4</a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300">5</a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-black hover:bg-yellow-300 rounded-r-md">></a>
                </nav>
            </div>

            <!-- FIN PAGINATION -->
        </div>
        <!-- FIN PAGE ACCUEIL -->
        @include('partials.modal')

        @include('partials.footer')
    </div>
    
</body>

</html>