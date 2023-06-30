<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class="text-center text-4xl">Information Genre Musicaux</h1>
            <p class="text-center">Listes des genres musicaux pour le formulaire</p>
        </div>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionGenreMusicaux" sectionName="GenreMusicaux" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Nom</th>
                    <th class="w-5">Visibilité</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>
                </tr>
                <thead>

                    @foreach ($genreMusicauxes as $genreMusicaux)
                    <tr class='border-collapse text-left'>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$genreMusicaux->nom}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$genreMusicaux->visible}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$genreMusicaux->created_at}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$genreMusicaux->updated_at}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                            <!-- modifier -->
                            @include('components.bouton.buttonModifier', ['routeName' => 'GestionGenreMusicaux', 'itemId' => $genreMusicaux->id])

                        </td>

                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                            <!-- supprimer -->

                            <x-bouton.buttonSupprimer routeName="GestionGenreMusicaux" itemId="{{ $genreMusicaux->id }}" />

                        </td>
                    </tr>
                    @endforeach
        </table>
    </x-slot>
</x-app-layout>