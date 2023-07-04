<x-app-layout>
    <x-slot name="header">
            <h1 class="text-center text-4xl m-4">Genre Musicaux</h1>
            <p class="text-center">Listes des genres musicaux</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionGenreMusicaux" sectionName="GenreMusicaux" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Nom</th>
                    <th class="w-auto">Visibilité</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            <thead>
            <tbody>
                    @foreach ($genreMusicauxes as $genreMusicaux)
                    <tr class='border-collapse text-center'>
                        <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$genreMusicaux->nom}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$genreMusicaux->visibilite}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$genreMusicaux->created_at}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$genreMusicaux->updated_at}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>

                            <!-- modifier -->
                            @include('components.bouton.buttonModifier', ['routeName' => 'GestionGenreMusicaux', 'itemId' => $genreMusicaux->id])

                        </td>

                        <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>

                            <!-- supprimer -->

                            <x-bouton.buttonSupprimer routeName="GestionGenreMusicaux" itemId="{{ $genreMusicaux->id }}" />

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>