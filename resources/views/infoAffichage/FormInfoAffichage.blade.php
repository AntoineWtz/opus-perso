<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($infoAffichages))
            Modifier Affichage : "{{ $infoAffichages[0]['titre'] }}"
            @else
            Nouvelle info affichage

            @endif
        </h1>
    </x-slot>

    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($infoAffichage) ? route('GestionInfoAffichage.update', ['GestionInfoAffichage' => $infoAffichage->id]) : route('GestionInfoAffichage.store') }}" 
            method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($infoAffichage))
            @method('PUT')
            @endif

            <!-- Affichage des erreurs de validation -->
            @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div>
                <h3 class="Font-bold text-xl m-8 text-blue-500">Infos Affichages</h3>
                <!-- Champ Titre -->
                <label for="titre">Titre</label>
                <input class="w-10/12 rounded border-gray-200" type="text" name="titre" placeholder="Titre de l'info affichage" value="{{ isset($infoAffichage) ? $infoAffichage->titre : '' }}"><br>
    
                <!-- Champ Zone -->
                <label for="zone">Zone</label>
                <select name="zone">
                    <option value="1">Carrousel 1</option>
                    <option value="2">Carrousel 2</option>
                </select><br>
    
                <!-- Champ Visibilité -->
                <label for="visibilite">Visibilité</label>
                <select name="visibilite" id="visibilite" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="Actif">Actif</option>
                    <option value="Inactif">Inactif</option>
                </select>
            </div>
            <br>
            <!-- Champ Ordre -->
            <label for="ordre">Ordre</label>
            <select name="ordre" id="ordre" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                <option value="1">n°1</option>
                <option value="2">n°2</option>
                <option value="3">n°3</option>
                <option value="4">n°4</option>
                <option value="5">n°5</option>
            </select><br>


            <!-- Champ Média -->
            <div>
                <h3 class="Font-bold text-xl m-8">Infos Média</h3>
                <!-- Champ Chemin Média -->
                <label for="chemin">Chemin</label>
                <input id="myDropzone chemin-media" type="file" name="chemin" class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                <!-- Champ Type Média -->
                <label for="type_media_id">Type média</label>
                <select name="type_media_id" id="type_media_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="1">1 - Photo</option>
                    <option value="2">2 - Vidéo</option>
                </select>

                <!-- Champ Balise Média -->
                <label for="balise_alt">Balise ALT</label>
                <input type="text" name="balise_alt" id="balise_alt" class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                <!-- Champ Modifieur -->
                <label for="modifieur">Modifieur</label>
                <input type="text" name="modifieur" id="modifieur" class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                <!-- Champ Photographe -->
                <label for="photographe">Photographe</label>
                <input type="text" name="photographe" id="photographe" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>
            <br>
            <!-- Bouton de soumission du formulaire -->
            @include('components.bouton.buttonAnnuler', ['route' => 'GestionInfoAffichage.index'])
            @component('components.bouton.buttonValider')
            @endcomponent
        </form>
        </div>
        @if (session('success'))
        <div class="text-center mt-4 mb-2">
            <div class="bg-green-500 text-white px-4 py-2 rounded-md inline-block">
                {{ session('success') }}
            </div>
        </div>
        @endif
        <script>
            const myDropzone = document.querySelector("#myDropzone")
            Dropzone.options.myDropzone = {
                paramName: "photo",
                acceptedFiles: ".jpeg,.jpg,.png",
                dictDefaultMessage: "Déposez vos fichiers ici ou cliquez pour les sélectionner",
                uploadMultiple: false,
            }
        </script>
    </x-slot>
</x-app-layout>