<x-app-layout>
    <x-slot name="header">
    <h1 class="font-bold text-3xl text-center mt-2">
        @if (isset($lieuxes))
        Modifier le lieux : "{{$lieuxes[0]['lieux']}}"
        @else Nouveau lieux
        @endif
    </x-slot>
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($lieux) ? route('GestionLieux.update', ['GestionLieux' => $lieux->id]) : route('GestionLieux.store') }}" method="POST">
            @csrf
            @if(isset($lieux))
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

            <!-- Champ pour le nom du lieu -->
                <label for="nom" class="block font-bold">Nom :</label>
                <input type="text" name="nom" id="nom" value="{{ isset($lieux) ? $lieux->nom : '' }}" required class="w-full px-4 py-2 mt-1 border rounded-md">
          

            <!-- Champ pour l'adresse du lieu -->
                <label for="adresse" class="block font-bold">Adresse :</label>
                <input type="text" name="adresse" id="adresse" value="{{ isset($lieux) ? $lieux->adresse : '' }}" required class="w-full px-4 py-2 mt-1 border rounded-md">


              <!-- Champ pour la visibilité -->
              <h2 class="font-bold mt-2" for="visibilite">Visibilité:</h2>
            <select name="visibilite">
                <option value="Actif" {{ isset($lieuxes) && $lieuxes->visibilite == 'Actif' ? 'selected' : '' }}>Actif</option>
                <option value="Inactif" {{ isset($lieuxes) && $lieuxes->visibilite == 'Inactif' ? 'selected' : '' }}>Inactif</option>
            </select> <br>
        
            <!-- Bouton de soumission du formulaire -->
            <!-- Par exemple, dans la page GestionPublication -->
            <div class='mt-4' >
                @include('components.bouton.buttonAnnuler', ['route' => 'GestionArtiste.index'])
                @component('components.bouton.buttonValider')
                @endcomponent
            </div>
        </form>
    </x-slot>
</x-app-layout>
