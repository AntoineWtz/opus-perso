<x-app-layout>
    <x-slot name="header">
            <h1 class="text-center text-4xl m-4">Information Affichage</h1>
            <p class="text-center">Listes des éléments À La Une</p>
    </x-slot>
    <x-slot name="slot">
        {{-- Boutton Création --}}
        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionInfoAffichage" sectionName="InfoAffichage" />
        </div>
        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class="text-center">
                    <th class="w-auto">Titre</th>
                    <th class="w-auto">Zone</th>
                    <th class="w-auto">Visibilité</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infoAffichages as $infoAffichage)
                <tr class="border-collapse text-center">
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100">{{$infoAffichage->zone}}</td>
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100 text-left">{{$infoAffichage->titre}}</td>
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100">{{$infoAffichage->visibilite}}</td>
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100">{{$infoAffichage->created_at}}</td>
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100">{{$infoAffichage->updated_at}}</td>
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100">
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionInfoAffichage', 'itemId' => $infoAffichage->id])
                    </td>
                    <td class="px-4 border-l-2 border-y-2 border-solid bg-gray-100">
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionInfoAffichage" itemId="{{ $infoAffichage->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>