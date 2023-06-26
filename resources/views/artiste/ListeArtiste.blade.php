<x-app-layout>
    <x-slot name="header">
    <h1 class='text-center text-4xl'>Artiste</h1>
    <p class="text-center">Liste des Artistes</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionArtiste" sectionName="Artiste" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Nom</th>
                    <th class="w-8">description</th>
                    <th class="w-8">Lien Facebook</th>
                    <th class="w-8">Lien Youtube</th>
                    <th class="w-8">Lien twitter</th>
                    <th class="w-5">Lien Instagram</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Action</th>
                </tr>
            </thead>

            @foreach ($artistes as $artiste)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->nom}}</td>
                <td class='px-6 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->descriptif}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->lien_facebook}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->lien_youtube}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->lien_twitter}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->lien_instagram}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->created_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$artiste->updated_at}}</td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- modifier -->
                    @include('components.bouton.ButtonModifier', ['routeName' => 'GestionArtiste', 'itemId' => $artiste->id])

                </td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- supprimer -->

                    <x-bouton.buttonSupprimer routeName="GestionArtiste" itemId="{{ $artiste->id }}" />

                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>