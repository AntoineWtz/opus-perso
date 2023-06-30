<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class="text-center text-4xl">Information Parametrage RS</h1>
            <p class="text-center">Listes Parametrage RS pour le formulaire</p>
        </div>
    </x-slot>

    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionParametrageRS" sectionName="Parametrage RS" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Nom</th>
                    <th class="w-8">Code</th>
                    <th class="w-8">Token</th>
                    <th class="w-8">Picto</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>
                </tr>
            </thead>

            @foreach ($parametrageRSes as $parametrageRS)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$parametrageRS->nom}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$parametrageRS->code}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$parametrageRS->token}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$parametrageRS->picto}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$parametrageRS->created_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$parametrageRS->updated_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- modifier -->
                    @include('components.bouton.buttonModifier', ['routeName' => 'GestionParametrageRS', 'itemId' => $parametrageRS->id])

                </td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- supprimer -->

                    <x-bouton.buttonSupprimer routeName="GestionParametrageRS" itemId="{{ $parametrageRS->id }}" />

                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>