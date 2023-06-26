<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($genreMusicaux))
            Modifier le type de publication : "{{ $genreMusicaux->type_pub }}"
            @else
            Nouveau Genre Musicale
            @endif
        </h1>
    </x-slot>
    
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($genreMusicaux) ? route('GestionGenreMusicaux.update', ['GestionGenremusicaux' => $genreMusicaux->id]) : route('GestionGenreMusicaux.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($genreMusicaux))
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

            <!-- Champ pour le genre musicaux -->
            <h2 class="font-bold mt-2">Genre Musicaux</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="nom" placeholder="Genre Musicale" value="{{ isset($genreMusicaux) ? $genreMusicaux->nom : '' }}">

            <!-- Champ pour la visibilité -->
            <div class="flex">
                    <h2 class="font-bold m-2" for="visibilite">Visibilité</h2>
                    <select name="visibilite" class="rounded border-gray-200">
                        <option value="Actif" {{ isset($evenement) && $evenement->visibilite == 'Actif' ? 'selected' : '' }}>Actif</option>
                        <option value="Inactif" {{ isset($evenement) && $evenement->visibilite == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                    </select>
                </div>

            <!-- Bouton de soumission du formulaire -->
            @include('components.bouton.buttonAnnuler', ['route' => 'GestionGenreMusicaux.index'])
            @component('components.bouton.buttonValider')
            @endcomponent
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
