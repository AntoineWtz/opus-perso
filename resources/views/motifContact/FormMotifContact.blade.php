<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($motifContacts))
            Modifier le motif de contact : "{{$motifContacts[0]['motif']}}"
            @else Nouveau motif de contact
            @endif
        </h1>
    </x-slot>
    
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($motifContact) ? route('GestionMotifContact.update', ['GestionMotifContact' => $motifContact->id]) : route('GestionMotifContact.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($motifContact))
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

            <!-- Champ pour le motif -->
            <h2 class="font-bold mt-2">Motif</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="motif" placeholder="Motif de contact" value="{{ isset($motifContact) ? $motifContact->motif : '' }}">

            <!-- Champ pour l'e-mail -->
            <h2 class="font-bold mt-2">E-mail</h2>
            <input class="w-10/12 rounded border-gray-200" type="email" name="email" placeholder="E-mail contact" value="{{ isset($motifContact) ? $motifContact->email : '' }}">

            <!-- Champ pour la visibilité -->
            <h2 class="font-bold mt-2" for="visibilite">Visibilité:</h2>
            <select name="visibilite">
                <option value="Actif" @if (isset($motifContacts) && $motifContacts[0]['visibilite']=='Actif' ) selected @endif>Actif</option>
                <option value="Inactif" @if (isset($motifContacts) && $motifContacts[0]['visibilite']=='Inactif' ) selected @endif>Inactif</option>
            </select> <br>

            <!-- Champ pour l'ordre -->
            <h2 class="font-bold mt-2">Ordre dans le formulaire</h2>
            <input class="w-10/12 rounded border-gray-200" type="number" name="ordre" placeholder="Ordre dans le formulaire" value="{{ isset($motifContact) ? $motifContact->ordre : '' }}" min="0">

            <br><br>
            <!-- Bouton de soumission du formulaire -->

            @include('components.bouton.buttonAnnuler', ['route' => 'GestionMotifContact.index'])

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