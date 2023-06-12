<!-- HEADER - NAVBAR -->
<header class="bg-black relative">
    <!-- bandeau jaune pour les réseaux sociaux, icons placées à droite du bloc  -->
    <div class="bg-yellow-500 flex justify-end items-start p-4">
        <div class="flex items-center">
            <a href="https://www.facebook.com/opusmusiques" target="_blank" class="mr-4 transform transition-all hover:scale-125">
                <img src="{{ asset('asset/icons/facebook-wh.png') }}" alt="Facebook">
            </a>
            <a href="https://twitter.com/OpusMusiques" target="_blank" class="mr-4 transform transition-all hover:scale-125">
                <img src="{{ asset('asset/icons/twitter-wh.png') }}" alt="Twitter">
            </a>
            <a href="https://www.instagram.com/opusmusiques/" target="_blank" class="mr-4 transform transition-all hover:scale-125">
                <img src="{{ asset('asset/icons/instagram-wh.png') }}" alt="Instagram">
            </a>
            <a href="https://www.youtube.com/channel/UCfjlOXiFj7oYllUIplighBg" target="_blank" class="mr-4 transform transition-all hover:scale-125">
                <img src="{{ asset('asset/icons/youtube-wh.png') }}" alt="YouTube">
            </a>
            <a href="https://www.flickr.com/photos/137192779@N08/albums" target="_blank" class="mr-4 transform transition-all hover:scale-125">
                <img src="{{ asset('asset/icons/flickr-wh.png') }}" alt="Flickr">
            </a>
            <a href="#" class="transform transition-all hover:opacity-50 opacity-80 open-modal">
                <img src="{{ asset('asset/icons/search-wh.png') }}" alt="Search">
            </a>
        </div>
    </div>
    <!-- bandeau noir pour le menu, texte centré dans le bloc -->
    <nav class="bg-black flex justify-center text-white text-center items-center">
        <a href="/" class="px-6 py-2 font-medium hover:bg-yellow-500 hover:text-black">Accueil</a>
        <a href="/publications" class="px-6 py-2 font-medium hover:bg-yellow-500 hover:text-black">Publications</a>
        <a href="/concert" class="px-6 py-2 font-medium hover:bg-yellow-500 hover:text-black">Agenda</a>
        <a href="/contact" class="px-6 py-2 font-medium hover:bg-yellow-500 hover:text-black">Contact</a>
    </nav>
    <!-- logo aligné à gauche, positionné au centre des deux bandeaux de couleur -->
    <div class="absolute transform -translate-y-2/3 left-4">
        <a href="/">
            <img src="{{ asset('asset/opus-logo.png') }}" alt="Logo" class="mt-4 w-2/3">
        </a>
    </div>
</header>
<!-- FIN NAVBAR -->