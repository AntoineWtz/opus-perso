<x-app-layout>
    <x-slot name="header">
            <h1 class='text-center text-4xl m-4'>Type Evenement</h1>
            <p class="text-center">Liste des types d'Evenement</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionTypeEvenement" sectionName="Type Evenement" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Type d'Evenement</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeEvenements->reverse() as $typeEvenement)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $typeEvenement->type_event }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $typeEvenement->created_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $typeEvenement->updated_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionTypeEvenement', 'itemId' => $typeEvenement->id])
                    </td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionTypeEvenement" itemId="{{ $typeEvenement->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>