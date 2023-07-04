<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-4xl m-4'>Artiste</h1>
        <p class="text-center">Liste des Artistes</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionArtiste" sectionName="Artiste" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Nom</th>
                    <th class="w-auto">Description</th>
                    <th class="w-auto">Facebook</th>
                    <th class="w-auto">Youtube</th>
                    <th class="w-auto">Twitter</th>
                    <th class="w-auto">Instagram</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($artistes as $artiste)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->nom}}</td>
                    <td class='px-6 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->descriptif}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->lien_facebook}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->lien_youtube}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->lien_twitter}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->lien_instagram}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$artiste->updated_at}}</td>

                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionArtiste', 'itemId' => $artiste->id])
                    </td>

                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionArtiste" itemId="{{ $artiste->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>