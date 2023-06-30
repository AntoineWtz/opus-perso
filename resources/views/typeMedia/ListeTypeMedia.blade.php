<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class='text-center text-4xl'>Type Média</h1>
            <p class="text-center">Liste des types de Média</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionTypeMedia" sectionName="Type Media" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Type de Média</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>

                </tr>
            </thead>

            @foreach ($typeMedias->reverse() as $typeMedia)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typeMedia->type_med }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typeMedia->created_at }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typeMedia->updated_at }}</td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- modifier -->
                    @include('components.bouton.buttonModifier', ['routeName' => 'GestionTypeMedia', 'itemId' => $typeMedia->id])

                </td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- supprimer -->

                    <x-bouton.buttonSupprimer routeName="GestionTypeMedia" itemId="{{ $typeMedia->id }}" />

                </td>

            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>