<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class='text-center text-4xl'>Type Publication</h1>
            <p class="text-center">Liste des type Publication</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionTypePublication" sectionName="Type Publication" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Type de Publication</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>

                </tr>
            </thead>

            @foreach ($typePublications->reverse() as $typePublication)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typePublication->type_pub }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typePublication->created_at }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $typePublication->updated_at }}</td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- modifier -->
                    @include('components.bouton.buttonModifier', ['routeName' => 'GestionTypePublication', 'itemId' => $typePublication->id])

                </td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- supprimer -->

                    <x-bouton.buttonSupprimer routeName="GestionTypePublication" itemId="{{ $typePublication->id }}" />

                </td>

            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>