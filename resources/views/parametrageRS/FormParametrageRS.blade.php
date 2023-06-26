<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @if (isset($parametrageRS))
            Modifier le motif de contact : "{{$parametrageRSs[0]['ParametrageRS']}}"
            @else Nouveau parametrageRS
            @endif
        </h1>
    </x-slot>
    
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($parametrageRS) ? route('GestionParametrageRS.update', ['GestionParametrageRS' => $parametrageRS->id]) : route('GestionParametrageRS.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if(isset($parametrageRS))
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

            <!-- Champ pour le nom -->
            <h2 class="font-bold mt-2">Nom</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="motif" placeholder="Nom" value="{{ isset($parametrageRS) ? $parametrageRS->nom : '' }}">

            <!-- Champ pour code -->
            <h2 class="font-bold mt-2">Code</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="code" placeholder="Code RS" value="{{ isset($parametrageRS) ? $parametrageRS->code : '' }}">

            <!-- Champ pour token -->
            <h2 class="font-bold mt-2">Token</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="token" placeholder="Token RS" value="{{ isset($parametrageRS) ? $parametrageRS->token : '' }}">

            <!-- Champ pour picto -->
            <h2 class="font-bold mt-2">Picto</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="picto" placeholder="Picto RS" value="{{ isset($parametrageRS) ? $parametrageRS->picto : '' }}">

            <br>
            <!-- Bouton de soumission du formulaire -->

            @include('components.bouton.buttonAnnuler', ['route' => 'GestionParametrageRS.index'])

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