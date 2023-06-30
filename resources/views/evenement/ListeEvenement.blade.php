<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class='text-center text-4xl'>Evénements</h1>
            <p class="text-center">Liste des événements</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionEvenement" sectionName="Evenement" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Titre</th>
                    <th class="w-8">lieux</th>
                    <th class="w-8">Type d'événement</th>
                    <th class="w-8">Artistes</th>
                    <th class="w-8">Billetterie</th>
                    <th class="w-8">Mise en avant</th>
                    <th class="w-5">Date de l'événement</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Modifier</th>
                    <th class="w-2">Supprimer</th>
                </tr>
            </thead>

            @foreach ($evenements->reverse() as $evenement)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->titre }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->lieux->nom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->typeEvenement->type_event }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                    @if ($evenement->artistes->count() > 0)
                    @foreach ($evenement->artistes as $artiste)
                    {{ $artiste->nom }}<br>
                    @endforeach
                    @else
                    Aucun artiste associé
                    @endif
                </td>



                <!-- <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->descriptif }}</td> -->
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->billeterie }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->mise_en_avant }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->date_event }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->created_at }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $evenement->updated_at }}</td>

                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>

                     <!-- modifier -->
                     @include('components.bouton.buttonModifier', ['routeName' => 'GestionEvenement', 'itemId' => $evenement->id])
                    </td>

                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                    <!-- supprimer -->
                    <x-bouton.buttonSupprimer routeName="GestionEvenement" itemId="{{ $evenement->id }}" />
                          
                    </td>

            </tr>
            @endforeach
        </table>
        <script>
            function confirmDelete(event, publicationId) {
            event.preventDefault();

            if (confirm("Êtes-vous sûr de vouloir supprimer cette publication ?")) {
                document.getElementById('form-delete-' + publicationId).submit();
                }
            }
                 </script>
    </x-slot>
</x-app-layout>