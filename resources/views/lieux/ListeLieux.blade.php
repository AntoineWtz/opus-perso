<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-3xl'>Liste des lieux</h1>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionLieux" sectionName="Lieux" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Nom</th>
                    <th class="w-8">Adresse</th>
                    <th class="w-8">Visibilité</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Lieux</th>
                </tr>
            </thead>

            @foreach ($lieuxes as $lieux)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$lieux->nom}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$lieux->adresse}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$lieux->visibilite}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$lieux->created_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$lieux->updated_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>
                    <!-- modifier -->
                    @include('components.bouton.buttonModifier', ['routeName' => 'GestionLieux', 'itemId' => $lieux->id])
                </td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>
                    <!-- supprimer -->
                    <x-bouton.buttonSupprimer routeName="GestionLieux" itemId="{{ $lieux->id }}" />
                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>