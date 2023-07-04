<x-app-layout>
    <x-slot name="header">
            <h1 class="text-center text-4xl m-4">Information Parametrage RS</h1>
            <p class="text-center">Listes Parametrage RS pour le formulaire</p>
    </x-slot>

    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionParametrageRS" sectionName="Parametrage RS" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Nom</th>
                    <th class="w-auto">Code</th>
                    <th class="w-auto">Token</th>
                    <th class="w-auto">Picto</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($parametrageRSes as $parametrageRS)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$parametrageRS->nom}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$parametrageRS->code}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$parametrageRS->token}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$parametrageRS->picto}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$parametrageRS->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$parametrageRS->updated_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>

                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionParametrageRS', 'itemId' => $parametrageRS->id])

                    </td>

                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>

                        <!-- supprimer -->

                        <x-bouton.buttonSupprimer routeName="GestionParametrageRS" itemId="{{ $parametrageRS->id }}" />

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>