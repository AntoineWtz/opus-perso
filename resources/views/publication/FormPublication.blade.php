

<x-app-layout>
   
    <x-slot name="header">
        <h1>@if ( isset($publications)) Modifier la publication : "{{$publications[0]['titre']}}" @else Nouvelle publication @endif</h1>
    </x-slot>
    <x-slot name="slot">
        <form  class="mx-5 " action=" @if ( isset($publications)) {{ route('GestionPublication.update', ['publication' => $publications[0]['id']]) }} @else {{ route('GestionPublication.store')}} @endif" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf

            @if ( isset($publications))
            @method('PUT')
            @endif
            {{-- type publication --}}
            <h2 class="font-bold">Type de Publication</h2>
            <select name="type_pub" id="type_pub" class="w-72 rounded border-gray-200">
                @foreach ($type_publication as $type_publication)
                <option value="{{ $type_publication->id }}" @if (isset($publications) && $publications[0]['type_publication_id']==$type_publications->id) selected @endif>
                    {{ $type_publication->type_pub }}
                </option>
                @endforeach
            </select>
            
            {{-- titre --}}
            <h2 class='font-bold'>Titre</h2>
            <input class="w-10/12 rounded  border-gray-200" type="text" name="titre" placeholder="Titre de la publication" @if ( isset($publications)) value="{{ $publications[0]['titre']}}" @endif>
            
            {{-- descriptif --}}
            <h2 class='font-bold'>Descriptif</h2>
            <textarea class="w-10/12 rounded  border-gray-200" id='editor' type="text" name="descriptif" placeholder="Description de la publication" @if ( isset($publications)) value="{{ $publications[0]['descriptif']}}" @endif></textarea>
       
            {{-- Genre musicaux --}}
            <h2 class='font-bold'>Genre Musicaux</h2>
            <select name="genre_musicaux" id="genre_musicaux" class="w-72 rounded border-gray-200" multiple>
                @php
                    $count = 1
                @endphp
                @foreach ($genre_musicaux as $genre_musicaux)
                 @if( $genre_musicaux->visibilite == "Actif" )
                <option value="{{ $genre_musicaux->id }}" @if (isset($publications) && $publications[0]['genre_musicaux_id']==$genre_musicaux->id) selected @endif>
                   {{ $count }}  - {{ $genre_musicaux->nom }}
                </option>
                  @php
                      $count++;
                  @endphp
                 @endif
                @endforeach
            </select>
            <button type="button" id="new-genre-musicaux-btn">New</button>
            <div class="hidden modalgenremusical">      
                <div class="bg-white ">            
                        <h2 class='font-bold'>Nom du genre musical</h2>
                        <input class="w-12 rounded  border-gray-200" type="text" name="nomgenremusical" placeholder="nom"> 
                        <button type="reset" id="annulerbtn">Annuler</button>               
                </div>
            </div>
            
            {{-- Artistes --}}
            <h2 class="font-bold">Définir Un Artiste</h2>

            <h3 >Artiste déjà créer</h3>
            <select name="genre_musicaux" id="genre_musicaux" class="w-72 rounded border-gray-200" multiple>
                
                @foreach ($artiste as $artiste)             
                <option value="{{ $artiste->id }}" @if (isset($publications) && $publications[0]['artiste_id']==$artiste->id) selected @endif>
                   {{ $artiste->nom }}
                </option>               
                @endforeach
                
            </select>
            <button type="button" id="new-artiste-btn">New</button>


            {{-- Galerie Photo --}}
            <button type="button" class="block" id="new-galerie1-btn">Créer une galerie photo</button>

            <div class="hidden modalGalerie">      
                <div>            
                        <h2 class='font-bold'>Nom de la galerie</h2>
                        <input class="w-12 rounded  border-gray-200" type="text" name="nomgalerie" placeholder="nom">                
                </div>
                <div>            
                        <h2 class='font-bold'>Image de la galerie</h2>
                        <input class="w-12 rounded  border-gray-200" type="file" name="photo[]" placeholder="saisir des images" multiple>                
                </div>
                <button type="reset" id="annuler-galerie-btn">Annuler</button>


            </div>



            

            {{-- Lier la publication a un évènement ?--}}





            {{-- Définir un lieux --}}
            <h2 class="font-bold">Lieux de la publication</h2>
            <select name="lieux" id="lieux" class="w-72 rounded border-gray-200" multiple>
                @foreach ($lieux as $lieux)
                 @if( $lieux->visibilite == "Actif" )
                <option value="{{ $lieux->id }}" @if (isset($publications) && $publications[0]['lieux_id']==$lieux->id) selected @endif>
                  {{ $lieux->nom }} - {{$lieux->adresse}}
                </option>
                 @endif
                @endforeach
            </select>
            <button type="button" id="new-lieux-btn">New</button>
            <div class="hidden modalLieux">      
                <div class="bg-white ">            
                        <h2 class='font-bold'>Nom du lieux</h2>
                        <input class="w-12 rounded  border-gray-200" type="text" name="nomLieux" placeholder="nom"> 
                        <h2 class="font-bold">Adresse</h2>
                        <input class="w-12 rounded  border-gray-200" type="text" name="adresseLieux" placeholder="adresse"> 
                        <button type="reset" id="annuler-lieux-btn">Annuler</button>               
                </div>
            </div>





























            {{-- Toulousain  --}}
            <h2 class="font-bold">La publication est elle toulousaine ?</h2>
            <input type="radio" name="toulousain" id="oui" value="oui" @if (isset($publications) && $publications[0]['toulousain']== "oui") checked @endif>
            <label for="oui">oui</label>
            <input type="radio" name="toulousain" id="non" value="non" @if (isset($publications) && $publications[0]['toulousain']== "non" || !isset($publications) ) checked @endif>
            <label for="non">non</label>

            {{-- Statut de la publication --}}
            <h2 class="font-bold">Etat de la publication</h2>
            <select name="statut" id="statut">
                <option value="Brouillon" @if( isset($publications) && $publications[0]['statut'] == "Brouillon" || !isset($publications) ) selected @endif >Brouillon</option>
                <option value="Relecture" @if( isset($publications) && $publications[0]['statut'] == "Relecture" ) selected @endif>En Relecture</option>
                <option value="Valide"    @if( isset($publications) && $publications[0]['statut'] == "Valide" ) selected @endif>Validé</option>
            </select>

            {{-- Créateur de la publication --}}
            <h2 class="bold-font">Créer par : </h2>
            <select name="user" id="user">
                @foreach ( $user as $user )
                <option value="{{$user->id}}" @if( isset($publications) && $publications[0]['user_id'] == $user->id ) selected @endif>{{$user->name}}</option>
                @endforeach
            </select>

            <div class="">

                {{-- Boutton Annuler --}}
                <button class="bg-transparent hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 border border-red-600 hover:border-transparent rounded " type="button"><a href="{{ route('GestionPublication.index') }}">Annuler</a> </button>
                {{-- Boutton Valider --}}
                <button class="bg-transparent hover:bg-green-400 text-green-400 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded " type="submit">Valider</button>
           
            </div>

        </form>
    
    
    <script src="{{ asset('js/publication.js') }}" defer></script>
    <script>
        ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {
    console.error( error );
});
    </script>
       
   
    </x-slot>
   
</x-app-layout>
