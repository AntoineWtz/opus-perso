<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($typeEvenement))
            Modifier le type d'Evenement : "{{ $typeEvenement->type_event }}"
            @else
            Nouveau Type de Evenement
            @endif
        </h1>
    </x-slot>
    
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($typeEvenement) ? route('GestionTypeEvenement.update', ['GestionTypeEvenement' => $typeEvenement->id]) : route('GestionTypeEvenement.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($typeEvenement))
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

            <!-- Champ pour le type de publication -->
            <h2 class="font-bold mt-2">Type de Evenement</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="type_event" placeholder="Type de Evenement" value="{{ isset($typeEvenement) ? $typeEvenement->type_event : '' }}">


            <!-- Bouton de soumission du formulaire -->
            @include('components.bouton.buttonAnnuler', ['route' => 'GestionTypeEvenement.index'])
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
