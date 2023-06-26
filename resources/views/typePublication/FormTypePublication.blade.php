<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($typePublication))
            Modifier le type de publication : "{{ $typePublication->type_pub }}"
            @else
            Nouveau Type de Publication
            @endif
        </h1>
    </x-slot>
    
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($typePublication) ? route('GestionTypePublication.update', ['GestionTypePublication' => $typePublication->id]) : route('GestionTypePublication.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($typePublication))
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
            <h2 class="font-bold mt-2">Type de Publication</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="type_pub" placeholder="Type de publication" value="{{ isset($typePublication) ? $typePublication->type_pub : '' }}">

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
