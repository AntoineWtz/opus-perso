<x-app-layout>

    <x-slot name="header">
        <h1>
            @if (isset($publications))
                Modifier la publication : "{{ $publications[0]['titre'] }}"
            @else
                Nouvelle publication
            @endif
        </h1>
    </x-slot>
    <x-slot name="slot">
        <form class="mx-5 flex flex-col "
            action=" @if (isset($publications)) {{ route('GestionPublication.update', ['publication' => $publications[0]['id']]) }} @else {{ route('GestionPublication.store') }} @endif"
            method="POST" enctype="multipart/form-data">
            @csrf

            @if (isset($publications))
                @method('PUT')
            @endif
            
            @if ($errors->any())
    
            <div class="bg-red-600 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- type publication --}}
            <div class="w-full mt-3">
                <h2 class="font-bold">Type de Publication</h2>
                <select name="type_pub" id="type_pub" class="w-72 rounded border-gray-200 js-example-basic-single">
                    @foreach ($type_publication as $type_publication)
                        <option value="{{ $type_publication->id }}" @if (isset($publications) && $publications[0]['type_publication_id'] == $type_publications->id) selected @endif>
                            {{ $type_publication->type_pub }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- titre --}}
            <div class="w-full mt-3">
                <h2 class='font-bold'>Titre</h2>
                <input class="w-10/12 rounded  border-gray-200" type="text" name="titre"
                    placeholder="Titre de la publication"
                    @if (isset($publications)) value="{{ $publications[0]['titre'] }}" @endif>
            </div>

            {{-- descriptif --}}
            <div class="w-full mt-3">
                <h2 class='font-bold'>Descriptif</h2>
                <textarea class="w-10/12 rounded  border-gray-200" id='editor' type="text" name="descriptif"
                    placeholder="Description de la publication"
                    @if (isset($publications)) value="{{ $publications[0]['descriptif'] }}" @endif></textarea>
            </div>

            {{-- Genre musicaux --}}
            <div class="w-full mt-3">
                <h2 class='font-bold'>Genre Musicaux</h2>
                <select name="genre_musicaux" id="genre_musicaux"
                    class="w-72 rounded border-gray-200 js-example-basic-multiple" multiple>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($genre_musicaux as $genre_musicaux)
                        @if ($genre_musicaux->visibilite == 'Actif')
                            <option value="{{ $genre_musicaux->id }}" @if (isset($publications) && $publications[0]['genre_musicaux_id'] == $genre_musicaux->id) selected @endif>
                                {{ $count }} - {{ $genre_musicaux->nom }}
                            </option>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </select>
                {{-- btn new genre musical --}}
                <button type="button" id="new-genre-musicaux-btn"
                    class=" flex bg-transparent hover:bg-purple-600 text-purple-600 font-semibold hover:text-white py-2 px-4 border border-purple-600 hover:border-transparent rounded ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 st0 fill-current" fill="none"
                        viewBox="0 0 24 24">
                        <g fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M1.25 8A6.75 6.75 0 0 1 8 1.25h8A6.75 6.75 0 0 1 22.75 8v8A6.75 6.75 0 0 1 16 22.75H8A6.75 6.75 0 0 1 1.25 16V8ZM8 2.75A5.25 5.25 0 0 0 2.75 8v8c0 2.9 2.35 5.25 5.25 5.25h8c2.9 0 5.25-2.35 5.25-5.25V8c0-2.9-2.35-5.25-5.25-5.25H8Z" />
                            <path
                                d="M12 7.007a.75.75 0 0 1 .75.75v8.486a.75.75 0 0 1-1.5 0V7.757a.75.75 0 0 1 .75-.75Z" />
                            <path d="M17 12a.75.75 0 0 1-.75.75H7.765a.75.75 0 0 1 0-1.5h8.485A.75.75 0 0 1 17 12Z" />
                        </g>
                    </svg>
                    <span class="ml-2">New</span></button>
                {{-- Modal new genre musical --}}
                <div class="hidden modalgenremusical">
                    <div class="bg-white ">
                        <h2 class='font-bold'>Nouveau genre musical</h2>
                        <input class=" rounded  border-gray-200" type="text" name="nomgenremusical"
                            placeholder="nom">
                        {{-- btn annuler new genre musical --}}
                        <div class="flex">
                            <button type="reset" id="annulerbtn"
                                class=" flex bg-transparent hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 border border-red-600 hover:border-transparent rounded ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 st0 fill-current"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="m12.5 11.793 2.646-2.647a.5.5 0 0 1 .708.708L13.207 12.5l2.647 2.646a.5.5 0 0 1-.708.708L12.5 13.207l-2.646 2.647a.5.5 0 0 1-.708-.708l2.647-2.646-2.647-2.646a.5.5 0 1 1 .708-.708l2.646 2.647ZM12.5 23C6.701 23 2 18.299 2 12.5S6.701 2 12.5 2 23 6.701 23 12.5 18.299 23 12.5 23Zm0-1a9.5 9.5 0 1 0 0-19 9.5 9.5 0 0 0 0 19Z" />
                                </svg>
                                <span class="ml-2 flex">Annuler</span></button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Artistes --}}
            <div class="w-full mt-3">
                <h2 class="font-bold">Définir Un Artiste</h2>

                <h3>Artiste déjà créer</h3>
                <select name="artiste" id="artiste" class="w-72 rounded border-gray-200 js-example-basic-multiple2"
                    multiple>

                    @foreach ($artiste as $artiste)
                        <option value="{{ $artiste->id }}" @if (isset($publications) && $publications[0]['artiste_id'] == $artiste->id) selected @endif>
                            {{ $artiste->nom }}
                        </option>
                    @endforeach

                </select>
                <button type="button" id="newArtiste-1" >New</button>
                <div id="content" class="flex flex-wrap">
                    {{-- Artiste 1 --}}
                    <div class='Artiste-1 hidden flex flex-wrap w-full'>
                        <h2 class='font-bold'> Artiste 1 </h2>

                        <div class="block w-full">
                            <h2 class='font-bold'>Photo de profil de l'artiste 1 </h2>
                            <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
                                id="myDropzone2" type="file" name="photoArtiste[]" placeholder="Saisir des images">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold'>Nom de l'artiste 1</h2>
                            <input class=" rounded  border-gray-200" type="text" name="nomArtiste[]"
                                placeholder="nom">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold '>Descriptif de l'artiste 1</h2>
                            <textarea class="w-2/4 rounded  border-gray-200" type="text" name="descriptifArtiste[]" placeholder="discriptif"></textarea>
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Facebook artiste 1 </h2>
                            <input class="full rounded  border-gray-200" type="text" name="=facebook[]"
                                placeholder="lien facebook">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Youtube artiset 1</h2>
                            <input class="full rounded  border-gray-200" type="text" name="=youtube[]"
                                placeholder="lien Youtube">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Twitter artiste 1</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=twitter[]"
                                placeholder="lien Twitter">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Instagram 1</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=instagram[]"
                                placeholder="lien Instagram">
                        </div>
                        <button type="button" id="newArtiste-2" >New</button>
                        <button type="button"  id="annulerArtiste-1">Annuler</button>
                    </div>
                    {{-- Artiste 2 --}}
                    <div class='Artiste-2 hidden flex flex-wrap w-full' >
                        <h2 class='font-bold'> Artiste 2 </h2>

                        <div class="block w-full">
                            <h2 class='font-bold'>Photo de profil de l'artiste 2 </h2>
                            <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
                                id="myDropzone2" type="file" name="photoArtiste[]"
                                placeholder="Saisir des images">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold'>Nom de l'artiste 2</h2>
                            <input class=" rounded  border-gray-200" type="text" name="nomArtiste[]"
                                placeholder="nom">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold '>Descriptif de l'artiste 2</h2>
                            <textarea class="w-2/4 rounded  border-gray-200" type="text" name="descriptifArtiste[]" placeholder="discriptif"></textarea>
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Facebook artiste 2 </h2>
                            <input class="full rounded  border-gray-200" type="text" name="=facebook[]"
                                placeholder="lien facebook">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Youtube artiset 2</h2>
                            <input class="full rounded  border-gray-200" type="text" name="=youtube[]"
                                placeholder="lien Youtube">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Twitter artiste 2</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=twitter[]"
                                placeholder="lien Twitter">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Instagram 2</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=instagram[]"
                                placeholder="lien Instagram">
                        </div>
                        <button type="button" id="newArtiste-3" >New</button>
                        <button type="button"  id="annulerArtiste-2">Annuler</button>
                    </div>
                    {{-- Artiste 3 --}}
                    <div class='Artiste-3 hidden flex flex-wrap w-full'>
                        <h2 class='font-bold'> Artiste 3 </h2>

                        <div class="block w-full">
                            <h2 class='font-bold'>Photo de profil de l'artiste 3 </h2>
                            <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
                                id="myDropzone2" type="file" name="photoArtiste[]"
                                placeholder="Saisir des images">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold'>Nom de l'artiste 3</h2>
                            <input class=" rounded  border-gray-200" type="text" name="nomArtiste[]"
                                placeholder="nom">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold '>Descriptif de l'artiste 3</h2>
                            <textarea class="w-2/4 rounded  border-gray-200" type="text" name="descriptifArtiste[]" placeholder="discriptif"></textarea>
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Facebook artiste 3 </h2>
                            <input class="full rounded  border-gray-200" type="text" name="=facebook[]"
                                placeholder="lien facebook">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Youtube artiset 3</h2>
                            <input class="full rounded  border-gray-200" type="text" name="=youtube[]"
                                placeholder="lien Youtube">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Twitter artiste 3</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=twitter[]"
                                placeholder="lien Twitter">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Instagram 3</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=instagram[]"
                                placeholder="lien Instagram">
                        </div>
                        <button type="button" id="newArtiste-4" >New</button>
                        <button type="button" id="annulerArtiste-3">Annuler</button>
                    </div>
                    {{-- Artiste 4 --}}
                    <div class='Artiste-4 hidden flex flex-wrap w-full' >
                        <h2 class='font-bold'> Artiste 4 </h2>

                        <div class="block w-full">
                            <h2 class='font-bold'>Photo de profil de l'artiste 4 </h2>
                            <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
                                id="myDropzone2" type="file" name="photoArtiste[]"
                                placeholder="Saisir des images">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold'>Nom de l'artiste 4</h2>
                            <input class=" rounded  border-gray-200" type="text" name="nomArtiste[]"
                                placeholder="nom">
                        </div>

                        <div class="block w-full">
                            <h2 class='font-bold '>Descriptif de l'artiste 4</h2>
                            <textarea class="w-2/4 rounded  border-gray-200" type="text" name="descriptifArtiste[]" placeholder="discriptif"></textarea>
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Facebook artiste 4 </h2>
                            <input class="full rounded  border-gray-200" type="text" name="=facebook[]"
                                placeholder="lien facebook">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Youtube artiset 4</h2>
                            <input class="full rounded  border-gray-200" type="text" name="=youtube[]"
                                placeholder="lien Youtube">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Twitter artiste 4</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=twitter[]"
                                placeholder="lien Twitter">
                        </div>

                        <div class="block w-2/4">
                            <h2 class='font-bold'>lien vers Instagram 4</h2>
                            <input class=" rounded  border-gray-200" type="text" name="=instagram[]"
                                placeholder="lien Instagram">
                        </div>      
                        <button type="button" id="annulerArtiste-4">Annuler</button>
                    </div>












                </div>
            </div>



            {{-- Galerie Photo --}}
            <div class="w-full mt-3">
                <button type="button" class="block" id="new-galerie1-btn">Créer une galerie photo</button>
                <div class="hidden modalGalerie w-full">
                    <div class="w-full">
                        <h2 class='font-bold w-full'>Nom de la galerie</h2>
                        <input class=" rounded  border-gray-200" type="text" name="nomgalerie" placeholder="nom">
                    </div>
                    <div class="w-full">
                        <h2 class='font-bold w-full'>Image de la galerie</h2>
                        <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
                            id="myDropzone" type="file" name="photo[]" placeholder="Saisir des images" multiple>

                    </div>
                    <button type="reset" id="annuler-galerie1-btn">Annuler</button>
                    <button type="button" class="block" id="new-galerie2-btn">Créer une deuxième galerie
                        photo</button>
                </div>
                <div class="hidden modalGalerie2 w-full">
                    <div class="w-full">
                        <h2 class='font-bold w-full'>Nom de la galerie</h2>
                        <input class=" rounded  border-gray-200" type="text" name="nomgalerie2"
                            placeholder="nom">
                    </div>
                    <div class="w-full">
                        <h2 class='font-bold w-full'>Image de la galerie</h2>
                        <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
                            id="myDropzone" type="file" name="photo2[]" placeholder="Saisir des images" multiple>
                    </div>
                    <button type="reset" id="annuler-galerie2-btn">Annuler</button>

                </div>
            </div>




            {{-- Lier la publication a un évènement ? --}}







            {{-- Définir un lieux --}}
            <div id="SetLieux" class="w-full mt-3">
                <h2 class="font-bold">Lieux de la publication</h2>
                <div class="allLieux" id="allLieux">
                    <select name="lieux" id="lieux"
                        class="w-72 rounded border-gray-200 js-example-basic-single">
                        <option value=null>Sélectionnez un lieux</option>
                        @foreach ($lieux as $lieux)
                            @if ($lieux->visibilite == 'Actif')
                                <option value="{{ $lieux->id }}"
                                    @if (isset($publications) && $publications[0]['lieux_id'] == $lieux->id) selected @endif>
                                    {{ $lieux->nom }} - {{ $lieux->adresse }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <button type="button" id="newLieux">New</button>
                </div>
                <div class="hidden modalLieux w-full">
                    <div class="bg-white w-full">
                        <h2 class='font-bold'>Nom du lieux <span style="color:#feb2b2;">*</span></h2>
                        <input class="nomLieux rounded  border-gray-200" type="text" id="nomLieux" name="nomLieux" placeholder="nom">
                        <h2 class="font-bold">Adresse <span style="color:#feb2b2;" >*</span></h2>
                        <input class="adresseLieux rounded  border-gray-200" type="text" id="adresseLieux" name="adresseLieux"
                            placeholder="adresse">
                        <button class="block" type="reset" id="annulerLieux" >Annuler</button>
                    </div>
                </div>
            </div>



            {{-- Toulousain  --}}
            <div class="w-full mt-3">
                <h2 class="font-bold">La publication est elle toulousaine ?</h2>
                <input type="radio" name="toulousain" id="oui" value="oui"
                    @if (isset($publications) && $publications[0]['toulousain'] == 'oui') checked @endif>
                <label for="oui">oui</label>
                <input type="radio" name="toulousain" id="non" value="non"
                    @if ((isset($publications) && $publications[0]['toulousain'] == 'non') || !isset($publications)) checked @endif>
                <label for="non">non</label>
            </div>

            {{-- Statut de la publication --}}
            <div class="w-full mt-3">
                <h2 class="font-bold">Etat de la publication</h2>
                <select name="statut" id="statut">
                    <option value="Brouillon" @if ((isset($publications) && $publications[0]['statut'] == 'Brouillon') || !isset($publications)) selected @endif>Brouillon</option>
                    <option value="Relecture" @if (isset($publications) && $publications[0]['statut'] == 'Relecture') selected @endif>En Relecture</option>
                    <option value="Valide" @if (isset($publications) && $publications[0]['statut'] == 'Valide') selected @endif>Validé</option>
                </select>
            </div>

            {{-- Créateur de la publication --}}
            <div class="w-full mt-3">
                <h2 class="bold-font">Créer par : </h2>
                <select class="js-example-basic-single" name="user" id="user">
                    @foreach ($user as $user)
                        <option value="{{ $user->id }}" @if (isset($publications) && $publications[0]['user_id'] == $user->id) selected @endif>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- btn envoie ou annulation --}}
            <div class="w-full mt-3">

                {{-- Boutton Annuler --}}
                <button
                    class="bg-transparent hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 border border-red-600 hover:border-transparent rounded "
                    type="button"><a href="{{ route('GestionPublication.index') }}">Annuler</a> </button>
                {{-- Boutton Valider --}}
                <button
                    class="bg-transparent hover:bg-green-400 text-green-400 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded "
                    type="submit" onclick="return validerFormulaire()">Valider</button>

            </div>

        </form>


        <script src="{{ asset('js/publication.js') }}" defer></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });


            });
        </script>


    </x-slot>

</x-app-layout>
