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

            <div class="flex flex-wrap m-8 mx-auto bg-yellow-500 justify-evenly items-center">
                <div class="flex flex-col p-4">

                    <label for="periodes">
                        Période : </label>
                    <select id="periodes" class="px-4 py-2">
                        <option value="">Toutes les périodes</option>
                        <option value="bla">bla</option>
                        <option value="blabla">blabla</option>
                        <option value="blablabla">blablabla</option>
                        <option value="blaaaaaah">blaaaaaah</option>
                        <option value="blu">blu</option>
                    </select>
                </div>

                <div class="flex flex-col p-4">
                    <label for="style-musical">
                        Style musical :</label>
                    <select id="style-musical" class="px-4 py-2">
                        <option value="">Tous les styles</option>
                   
                        <option value="rap">Rap</option>
                        <option value="pop-rock">Pop Rock</option>
                        <option value="electro">Electro</option>
                        <option value="jazz">Jazz</option>
                        <option value="metal">Metal</option>
                    </select>

                </div>
             
                <div class="flex flex-col p-4 w-1/3">
                   
                    <label for="artistes">
                        Artiste : </label>
                    <input id="artistes" class="px-2 py-2" placeholder="Rechercher votre artiste préféré">
                    
                </div>
             
            </div>


            <!-- Premier bloc -->
            <div class="max-w-4xl mx-auto mb-8">
                <!-- mx-auto = centre horizontalement la div -->
                <img src="{{ asset('asset/imageConcert/Worakls.jpg') }}" alt="Image de l'événement"
                    class="w-full h-auto object-contain mb-4">
                <h3 class="text-2xl text-yellow-500 font-bold mb-2 flex items-center justify-center"> Worakls @Zénith -
                    15
                    juin 2023
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/lien-alt-bk.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/billet-bk.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                </h3>
                <hr class="max-w-xl mx-auto">
                <!-- Crée une ligne horizontale pour séparer le contenu : max-w-lg définit une largeur max
                mx-auto =centre horizontalement l'élément-->
            </div>

            <!-- Deuxième bloc -->
            <div class="max-w-4xl mx-auto mb-8">
                <img src="{{ asset('asset/imageConcert/Boris-Brejcha.jpg') }}" alt="Image de l'événement"
                    class="w-full h-auto object-contain mb-4">
                <!-- src = chemin de l'image, alt = Ce qui sera afficher si 0 chargement d'image
                w-full = largueur défini à 100% de la largeur de son conteneur,
                h-auto = hauteur ajusté automatiquement tout en gardant les proportions de l'img
                object-contain= assure que l'image est entièrement visible dans son conteneur, mb-4 = ajoute un marge inférieur de 4 unités-->
                <h3 class="text-2xl text-yellow-500 font-bold mb-2 flex items-center justify-center"> Boris Brejcha
                    @Bikini
                    - 25 décembre 2023
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/lien-alt-bk.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/billet-bk.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                </h3>
                <hr class="max-w-lg mx-auto">
            </div>
            <!-- Troisième bloc -->
            <div class="max-w-4xl mx-auto mb-8">
                <img src="{{ asset('asset/imageConcert/The-Kooks.jpg') }}" alt="Image de l'événement"
                    class="w-full h-auto object-contain mb-4">
                <h3 class="text-2xl text-yellow-500 font-bold mb-2 flex items-center justify-center"> Mandarine
                    @Connexion
                    Live - 1 avril 2024
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/lien-alt-bk.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                    <a href="" target="_blank" class="ml-4 transform transition-all hover:scale-125">
                        <img src="{{ asset('asset/icons/billet-bk.png') }}" alt="Article" class="h-6 w-6">
                    </a>
                </h3>

                <hr class="max-w-lg mx-auto">
            </div>
        </div>
        @include('partials.modal')

        @include('partials.footer')
    </div>
</body>

</html>