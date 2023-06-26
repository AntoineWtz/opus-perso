<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class='text-center text-4xl'>Type Evenement</h1>
            <p class="text-center">Liste des types d'Evenement</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionTypeEvenement" sectionName="Type Evenement" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Type d'Evenement</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>

                </tr>
            </thead>

            @foreach ($typeEvenements->reverse() as $typeEvenement)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typeEvenement->type_event }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typeEvenement->created_at }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typeEvenement->updated_at }}</td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- modifier -->
                    @include('components.bouton.ButtonModifier', ['routeName' => 'GestionTypeEvenement', 'itemId' => $typeEvenement->id])

                </td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- supprimer -->

                    <x-bouton.buttonSupprimer routeName="GestionTypeEvenement" itemId="{{ $typeEvenement->id }}" />

                </td>

            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>