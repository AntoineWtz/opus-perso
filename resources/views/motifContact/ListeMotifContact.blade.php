<x-app-layout>
    <x-slot name="header">
            <h1 class="text-center text-4xl m-4">Information Motif Contact</h1>
            <p class="text-center">Listes motif de contact</p>
    </x-slot>

    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionMotifContact" sectionName="Motif Contact" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Motif de contact</th>
                    <th class="w-auto">E-mail</th>
                    <th class="w-auto">Visibilité</th>
                    <th class="w-auto">Ordre dans le formulaire</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($motifContacts as $motifContact)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$motifContact->motif}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$motifContact->email}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$motifContact->visibilite}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$motifContact->ordre}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$motifContact->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$motifContact->updated_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>

                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionMotifContact', 'itemId' => $motifContact->id])

                    </td>

                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>

                        <!-- supprimer -->

                        <x-bouton.buttonSupprimer routeName="GestionMotifContact" itemId="{{ $motifContact->id }}" />

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('success'))
        <div class="text-center mt-4 mb-2">
            <div class="bg-green-500 text-white px-4 py-2 rounded-md inline-block">
                {{ session('success') }}
            </div>
        </div>
        @endif
    </x-slot>
</x-app-layout>