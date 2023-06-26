<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($artistes))
                Modifier l'artiste : "{{ $artistes[0]['nom'] }}"
            @else
                Nouvel artiste
                
            @endif
        </h1>
    </x-slot>
    <x-slot name="slot">
    <form class="ml-4" action="{{ isset($artiste) ? route('GestionArtiste.update', ['GestionArtiste' => $artiste->id]) : route('GestionArtiste.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
        @csrf
        @if(isset($artiste))
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

        <!-- Champ pour le Nom -->
        <label for="nom" class="block font-bold">Nom :</label>
        <input type="text" name="nom" id="nom" class="border border-gray-300 rounded px-2 py-1"  value="{{ isset($artiste) ? $artiste->nom : '' }}">
      
        <!-- Champ pour le descriptif -->
        <h2 class="font-bold mt-2">Descriptif: </h2>
        <textarea class="w-10/12 rounded border-gray-200" id="editor" type="text" name="descriptif" placeholder="Description de l'événement" > {{ isset($artiste) ? $artiste->descriptif : '' }}</textarea>
        
        <!-- Champ pour FB -->
        <label for="lien_facebook" class="block font-bold">Lien Facebook :</label>
        <input type="text" name="lien_facebook" id="lien_facebook" class="border border-gray-300 rounded px-2 py-1" value="{{ isset($artiste) ? $artiste->lien_facebook : '' }}">
        
        <!-- Champ pour Youtube -->
        <label for="lien_youtube" class="block font-bold">Lien YouTube :</label>
        <input type="text" name="lien_youtube" id="lien_youtube" class="border border-gray-300 rounded px-2 py-1" value="{{ isset($artiste) ? $artiste->lien_youtube : '' }}">
        
        <!-- Champ pour Twiiter -->
        <label for="lien_twitter" class="block font-bold">Lien Twitter :</label>
        <input type="text" name="lien_twitter" id="lien_twitter" class="border border-gray-300 rounded px-2 py-1" value="{{ isset($artiste) ? $artiste->lien_twitter : '' }}">
    

        <!-- Champ pour Instagram -->
        <label for="lien_instagram" class="block font-bold">Lien Instagram :</label>
        <input type="text" name="lien_instagram" id="lien_instagram" class="border border-gray-300 rounded px-2 py-1" value="{{ isset($artiste) ? $artiste->lien_instagram : '' }}">
</br>
    
        <!-- Bouton de soumission du formulaire -->
        <!-- Par exemple, dans la page GestionPublication -->
        <div class='mt-4' >
            @include('components.bouton.buttonAnnuler', ['route' => 'GestionArtiste.index'])
            @component('components.bouton.buttonValider')
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
    </x-slot>
</x-app-layout>