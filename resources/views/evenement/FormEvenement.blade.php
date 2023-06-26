<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($evenements))
            Modifier l'événement : "{{ $evenements[0]['titre'] }}"
            @else
            Nouvel événement

            @endif
        </h1>
    </x-slot>
    
    <x-slot name="slot">
        <form class="m-4 w-full" action="{{ isset($evenement) ? route('GestionEvenement.update', ['GestionEvenement' => $evenement->id]) : route('GestionEvenement.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($evenement))
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
                <!-- Champ pour le titre -->
                <div class="m-8">
                    <h2 class="font-bold">Titre</h2>
                    <input class="w-10/12 rounded border-gray-200" type="text" name="titre" placeholder="Titre de l'événement" value="{{ isset($evenement) ? $evenement->titre : '' }}">
                </div>
                <!-- Champ pour le descriptif -->
                <!-- <div class="m-8"> -->
                    <!-- <h2 class="font-bold m-2">Descriptif</h2> -->
                    <!-- <textarea class="w-10/12 rounded border-gray-200" id="editor" type="text" name="descriptif" placeholder="Description de l'événement"> {{ isset($evenement) ? $evenement->descriptif : '' }}</textarea> -->
                <!-- </div> -->
            </div>

            <div class="flex justify-evenly items-center m-8">
                <!-- Champ pour le lieu -->
                <div class="flex">
                    <h2 class="font-bold m-2" for="lieux_id">Lieu</h2>
                    <select class="mr-4 rounded border-gray-200" name="lieux_id">
                        @foreach($lieux as $lieu)
                        <option value="{{ $lieu->id }}" {{ (isset($evenement) && $evenement->lieux_id == $lieu->id) ? 'selected' : '' }}>
                            {{ $lieu->nom }}
                        </option>
                        @endforeach
                    </select>
                    @component('components.bouton.buttonAjouter')
                    @endcomponent
                </div>
                <div class="flex">
                    <!-- Champ pour le type d'événement -->
                    <h2 class="font-bold m-2">Type d'événement</h2>
                    <select name="type_evenement_id" id="type_evenement" class="rounded border-gray-200">
                        @foreach($type_evenements as $type_evenement)
                        <option value="{{ $type_evenement->id }}" @if(isset($evenement) && $evenement->type_evenement_id == $type_evenement->id) selected @endif>{{ $type_evenement->type_event }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Champ pour la billetterie -->
                <div class="flex">
                    <h2 class="font-bold m-2" for="billeterie">Billetterie</h2>
                    <input type="url" class="rounded border-gray-200" name="billeterie" value="{{ isset($evenement) ? ($evenement->billeterie) : '' }}">
                </div>
            </div>
            <div class="flex justify-evenly items-center m-8">
                <div class="flex">
                    <!-- Champ pour la date de l'événement -->
                    <h2 class="font-bold m-2" for="date_event">Date de l'événement</h2>
                    <input type="date" class="rounded border-gray-200" name="date_event" value="{{ old('date_event', isset($evenement) ? $evenement->date_event->format('Y-m-d') : '') }}">
                </div>
                <!-- Champ pour la mise en avant -->
                <div class="flex">
                    <h2 class="font-bold m-2" for="mise_en_avant">Mise en avant</h2>
                    <select name="mise_en_avant" class="rounded border-gray-200">
                        <option value="oui" {{ isset($evenement) && $evenement->mise_en_avant == 'oui' ? 'selected' : '' }}>Oui</option>
                        <option value="non" {{ isset($evenement) && $evenement->mise_en_avant == 'non' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
    
                <!-- Champ pour la visibilité -->
                <div class="flex">
                    <h2 class="font-bold m-2" for="visibilite">Visibilité</h2>
                    <select name="visibilite" class="rounded border-gray-200">
                        <option value="Actif" {{ isset($evenement) && $evenement->visibilite == 'Actif' ? 'selected' : '' }}>Actif</option>
                        <option value="Inactif" {{ isset($evenement) && $evenement->visibilite == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                    </select>
                </div>
            </div>

            <!-- Champ pour Media -->
            <div class="flex justify-center items-center m-8">
                <h2 class="font-bold m-2">Image d'aperçu</h2>
                <input type="file" name="media" accept="media/*" value="{{ isset($evenement) ? $evenement->media : '' }}">
            </div>

            <div class="flex justify-evenly m-8">
                <!-- Bouton de soumission du formulaire -->
                @include('components.bouton.buttonAnnuler', ['route' => 'GestionEvenement.index'])

                @component('components.bouton.buttonValider')
                @endcomponent
            </div>
        </form>
        @if (session('success'))
        <div class="text-center m-4">
            <div class="bg-green-500 text-white px-4 py-2 rounded-md inline-block">
                {{ session('success') }}
            </div>
        </div>
        @endif
    </x-slot>
</x-app-layout>