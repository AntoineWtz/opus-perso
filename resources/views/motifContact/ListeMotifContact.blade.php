<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class="text-center text-4xl">Information Motif Contact</h1>
            <p class="text-center">Listes motif de contact pour le formulaire</p>
        </div>
    </x-slot>

    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionMotifContact" sectionName="Motif Contact" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Motif de contact</th>
                    <th class="w-8">E-mail</th>
                    <th class="w-8">Visibilité</th>
                    <th class="w-8">Ordre dans le formulaire</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>
                </tr>
            </thead>

            @foreach ($motifContacts as $motifContact)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$motifContact->motif}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$motifContact->email}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$motifContact->visibilite}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$motifContact->ordre}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$motifContact->created_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$motifContact->updated_at}}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- modifier -->
                    @include('components.bouton.buttonModifier', ['routeName' => 'GestionMotifContact', 'itemId' => $motifContact->id])

                </td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                    <!-- supprimer -->

                    <x-bouton.buttonSupprimer routeName="GestionMotifContact" itemId="{{ $motifContact->id }}" />

                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>