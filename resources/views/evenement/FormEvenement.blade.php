<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
           @if (isset($evenements))
            Modifier l'Evenement : "{{ $evenements[0]['titre'] }}"
            @else
            Nouvel Evenement
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

            <!-- Champ pour le titre -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2">Titre : <span style="color:#feb2b2;">*</span></h2>
                <input class="w-10/12 rounded border-gray-200" type="text" name="titre" placeholder="Titre de l'événement" value="{{ isset($evenement) ? $evenement->titre : '' }}">
            </div>

            <!-- Champ pour le lieu -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2">Lieux <span style="color:#feb2b2;">*</span></h2>
                <select name="lieux_id" id="lieux_id" class="w-72 rounded border-gray-200 js-example-basic-single">
                    @foreach ($lieux as $lieu)
                    @if ($lieu->visibilite == 'Actif')
                    <option value="{{ $lieu->id }}"
                        @if (isset($evenements) && $evenements[0]['lieux_id'] == $lieu->id) selected @endif>
                        {{ $lieu->nom }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>

            <!-- Champ pour les artistes présents à l'événement -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2">Artistes <span style="color:#feb2b2;">*</span></h2>
                <select name="artiste_id[]" id="artiste" class="w-72 rounded border-gray-200 js-example-basic-multiple" multiple>
                    @foreach ($artistes as $artiste)
                    <option value="{{ $artiste->id }}"
                        @if (isset($evenement) && $evenement->artistes->contains('id', $artiste->id)) selected @endif>
                        {{ $artiste->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Champ pour le type d'événement -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2">Type d'événement : <span style="color:#feb2b2;">*</span></h2>
                <select name="type_evenement_id" id="type_evenement" class="rounded border-gray-200">
                    @foreach($type_evenements as $type_evenement)
                    <option value="{{ $type_evenement->id }}" @if(isset($evenement) && $evenement->type_evenement_id == $type_evenement->id) selected @endif>{{ $type_evenement->type_event }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Genre musicaux -->
            <div class="flex ml-8 m-2">
                <h2 class='font-bold m-2'>Genre Musicaux</h2>
                <select name="genre_musicaux[]" id="genre_musicaux" class="w-72 rounded border-gray-200 js-example-basic-multiple" multiple>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($genre_musicaux as $genre)
                        @if ($genre->visibilite == 'Actif')
                            <option value="{{ $genre->id }}" @if (isset($evenements) && $evenements[0]['genre_musicaux_id'] == $genre->id) selected @endif>
                                {{ $count }} - {{ $genre->nom }}
                            </option>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Champ pour la billetterie -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2" for="billeterie">Billetterie</h2>
                <input type="url" class="rounded border-gray-200" name="billeterie" value="{{ isset($evenement) ? $evenement->billeterie : '' }}">
            </div>

            <!-- Champ pour la date de l'événement -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2" for="date_event">Date de l'événement<span style="color:#feb2b2;">*</span></h2>
                <input type="date" class="rounded border-gray-200" name="date_event" value="{{ old('date_event', isset($evenement) ? $evenement->date_event->format('Y-m-d') : '') }}">
            </div>
        
            <!-- Champ pour lier une publication -->
            <div class="flex ml-8 m-2">
                <label class="font-bold m-2" for="publication_id">Lier une Publication :</label>
                <select name="publication_id" class="form-control">
                    <option value="">Sélectionner une publication</option>
                    @foreach($publicationsNonLiees as $publication)
                    <option value="{{ $publication->id }}">{{ $publication->titre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Champ pour la mise en avant -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2" for="mise_en_avant">Mise en avant</h2>
                <select name="mise_en_avant" class="rounded border-gray-200">
                    <option value="oui" {{ isset($evenement) && $evenement->mise_en_avant == 'oui' ? 'selected' : '' }}>Oui</option>
                    <option value="non" {{ isset($evenement) && $evenement->mise_en_avant == 'non' ? 'selected' : '' }}>Non</option>
                </select>
            </div>
    
            <!-- Champ pour la visibilité -->
            <div class="flex ml-8 m-2">
                <h2 class="font-bold m-2" for="visibilite">Visibilité</h2>
                <select name="visibilite" class="rounded border-gray-200">
                    <option value="Actif" {{ isset($evenement) && $evenement->visibilite == 'Actif' ? 'selected' : '' }}>Actif</option>
                    <option value="Inactif" {{ isset($evenement) && $evenement->visibilite == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>
        
           <!-- Image d'aperçu -->
            <div class="flex ml-8 m-2">
                <h2 class="redimg font-bold">Image d'aperçu <span style="color:#feb2b2;">*</span></h2>
                <input type="file" name="image_demo" id="image-demo">
                <label class="redalt" for="alt_img_demo">Balise alternative de l'image :<span style="color:#feb2b2;">*</span></label>
                <input class="w-25 rounded border-gray-200" type="text" name="alt_img_demo" id="alt_img_demo">

            <!-- Affichage de l'image d'aperçu -->
                @if (isset($evenement) && $evenement->image_demo)
                <img src="{{ asset($evenement->image_demo) }}" alt="{{  asset($evenement->alt_img_demo) }}" class="w-16 h-16">
                @endif
            </div>

            <!-- Boutons -->
            <div class="flex ml-8 m-2">
                <!-- Bouton d'annulation du formulaire -->
                <div class="flex m-8">
                    @include('components.bouton.buttonAnnuler', ['route' => 'GestionEvenement.index'])
                </div>
                <!-- Bouton de soumission du formulaire -->
                <div class="flex m-8">
                    @component('components.bouton.buttonValider')
                    @endcomponent
                </div>
            </div>
        </form>
        <script src="{{ asset('js/evenement.js') }}" defer></script>
    </x-slot>
</x-app-layout>
