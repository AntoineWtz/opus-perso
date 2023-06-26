<x-app-layout>

    <x-slot name="header">
        <div class="m-4">
            <h1 class="text-center text-4xl">Information Affichage</h1>
            <p class="text-center">Listes des éléments À La Une</p>
        </div>
    </x-slot>

    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionInfoAffichage" sectionName="InfoAffichage" />

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class="text-center">
                    <th class="w-auto">Titre</th>
                    <th class="w-auto">Zone</th>
                    <th class="w-auto">Visibilité</th>
                    <th class="w-auto">Ordre</th>
                    <!-- <th class="w-auto">Chemin média</th> -->
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Action</th>
                </tr>
                <thead>

                    @foreach ($infoAffichages as $infoAffichage)
                    <tr class="border-collapse text-center">
                        <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100">{{$infoAffichage->titre}}</td>
                        <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100">{{$infoAffichage->zone}}</td>
                        <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100">{{$infoAffichage->visibilite}}</td>
                        <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100">{{$infoAffichage->ordre}}</td>
                        <!-- <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100"> ajouter chemin du média </td> -->
                        <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100">{{$infoAffichage->created_at}}</td>
                        <td class="px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100">{{$infoAffichage->updated_at}}</td>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                            <!-- modifier -->
                            @include('components.bouton.ButtonModifier', ['routeName' => 'GestionInfoAffichage', 'itemId' => $infoAffichage->id])

                        </td>
                        <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                            <!-- supprimer -->

                            <x-bouton.buttonSupprimer routeName="GestionInfoAffichage" itemId="{{ $infoAffichage->id }}" />

                        </td>
                    </tr>
                    @endforeach
        </table>
    </x-slot>
</x-app-layout>