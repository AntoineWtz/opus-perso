<x-app-layout>
    <x-slot name="header">
            <h1 class='text-center text-4xl m-4'>Type Publication</h1>
            <p class="text-center">Liste des type Publication</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionTypePublication" sectionName="Type Publication" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Type de Publication</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typePublications->reverse() as $typePublication)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid  bg-gray-100'>{{ $typePublication->type_pub }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid  bg-gray-100'>{{ $typePublication->created_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid  bg-gray-100'>{{ $typePublication->updated_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionTypePublication', 'itemId' => $typePublication->id])
                    </td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionTypePublication" itemId="{{ $typePublication->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>