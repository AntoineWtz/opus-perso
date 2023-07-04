<x-app-layout>
    <x-slot name="header">
            <h1 class='text-center text-4xl m-4'>Type Média</h1>
            <p class="text-center">Liste des types de Média</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionTypeMedia" sectionName="Type Media" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Type de Média</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeMedias->reverse() as $typeMedia)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $typeMedia->type_med }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $typeMedia->created_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $typeMedia->updated_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionTypeMedia', 'itemId' => $typeMedia->id])
                    </td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionTypeMedia" itemId="{{ $typeMedia->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>