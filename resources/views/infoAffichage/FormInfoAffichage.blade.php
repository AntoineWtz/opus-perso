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
        <form class="m-8" action="{{ isset($infoAffichage) ? route('GestionInfoAffichage.update', ['GestionInfoAffichage' => $infoAffichage->id]) : route('GestionInfoAffichage.store') }}" 
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
                <h3 class="font-bold text-xl m-8 uppercase">Infos Affichage</h3>
                
                <!-- Champ Titre -->
                <div class="m-4">
                    <label for="titre" class="font-bold">Titre</label>
                    <input class="w-1/2 rounded border-gray-200 ml-4" type="text" name="titre" placeholder="Titre de l'info affichage" value="{{ isset($infoAffichage) ? $infoAffichage->titre : '' }}">
                </div>
                
                <!-- Champ Zone -->
                <div class="m-4">
                    <label for="zone" class="font-bold">Zone</label>
                    <select name="zone" class="w-1/2 rounded border-gray-200 ml-4">
                        <option value="1">Carrousel 1</option>
                        <option value="2">Carrousel 2</option>
                    </select>
                </div>

                <!-- Champ Visibilité -->
                <div class="m-4">
                    <label for="visibilite" class="font-bold">Visibilité</label>
                    <select name="visibilite" id="visibilite" class="w-1/2 rounded border-gray-200 ml-4">
                        <option value="Actif">Actif</option>
                        <option value="Inactif">Inactif</option>
                    </select>
                </div>

                <!-- Champ Ordre -->
                <div class="m-4">
                    <label for="ordre" class="font-bold">Ordre</label>
                    <select name="ordre" id="ordre" class="w-1/2 rounded border-gray-200 ml-4">
                        <option value="1">n°1</option>
                        <option value="2">n°2</option>
                        <option value="3">n°3</option>
                        <option value="4">n°4</option>
                        <option value="5">n°5</option>
                    </select>
                </div>
            </div>

            <!-- Champ Média -->
            <div>
                <h3 class="font-bold text-xl m-8 uppercase">Infos Média</h3>

                <!-- Champ Chemin Média -->
                <div class="m-4">
                    <label for="chemin" class="font-bold">Chemin</label>
                    <input id="myDropzone chemin-media" type="file" name="chemin" class="w-1/2 rounded border-gray-200 ml-4">
                </div>

                <!-- Champ Type Média -->
                <div class="m-4">
                    <label for="type_media_id" class="font-bold">Type média</label>
                    <select name="type_media_id" id="type_media_id" class="w-1/2 rounded border-gray-200 ml-4">
                        <option value="1">1 - Photo</option>
                        <option value="2">2 - Vidéo</option>
                    </select>
                </div>

                <!-- Champ Balise Média -->
                <div class="m-4">
                    <label for="balise_alt" class="font-bold">Balise ALT</label>
                    <input type="text" name="balise_alt" id="balise_alt" class="w-1/2 rounded border-gray-200 ml-4">
                </div>

                <!-- Champ Modifieur -->
                <div class="m-4">
                    <label for="modifieur" class="font-bold">Modifieur</label>
                    <input type="text" name="modifieur" id="modifieur" class="w-1/2 rounded border-gray-200 ml-4">
                </div>

                <!-- Champ Photographe -->
                <div class="m-4">
                    <label for="photographe" class="font-bold">Photographe</label>
                    <input type="text" name="photographe" id="photographe" class="w-1/2 rounded border-gray-200 ml-4">
                </div>
            </div>

            <div class="flex items-center justify-center">
                <!-- Bouton de soumission du formulaire -->
                <div class="m-4">
                    @include('components.bouton.buttonAnnuler', ['route' => 'GestionInfoAffichage.index'])
                </div>
                <div class="m-4">
                    @component('components.bouton.buttonValider')
                </div>
                @endcomponent
            </div>
        </form>

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