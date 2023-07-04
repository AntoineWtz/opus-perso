<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-3xl m-4'>Lieux</h1>
        <p class="text-center">Liste des Lieux</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionLieux" sectionName="Lieux" />
        </div>
        
        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Nom</th>
                    <th class="w-auto">Adresse</th>
                    <th class="w-auto">Visibilité</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lieuxes as $lieux)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$lieux->nom}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$lieux->adresse}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$lieux->visibilite}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$lieux->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$lieux->updated_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionLieux', 'itemId' => $lieux->id])
                    </td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionLieux" itemId="{{ $lieux->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>