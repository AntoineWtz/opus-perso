<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class='text-center text-4xl m-4'>Evénements</h1>
            <p class="text-center">Liste des événements</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionEvenement" sectionName="Evenement" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class="text-center">
                    <th class="w-auto">Image d'aperçu</th>
                    <th class="w-auto">Titre</th>
                    <th class="w-auto">Lieux</th>
                    <th class="w-auto">Type d'événement</th>
                    <th class="w-auto">Mise en avant</th>
                    <th class="w-auto">Date de l'événement</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($evenements as $evenement)
            <tr class='border-collapse text-center'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100'>
                    @if ($evenement->img)
                    <img src="{{ asset($evenement->img->chemin) }}" alt="{{ $evenement->img->balise_alt }}" class="w-16 h-16 mx-auto">
                    @endif
                    </td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>{{ $evenement->titre }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>{{ $evenement->lieux->nom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>{{ $evenement->typeEvenement->type_event }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>{{ $evenement->mise_en_avant }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>{{ $evenement->date_event }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>{{ $evenement->created_at }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-100'>
                     <!-- modifier -->
                     @include('components.bouton.buttonModifier', ['routeName' => 'GestionEvenement', 'itemId' => $evenement->id])
                </td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-100'>
                    <!-- supprimer -->
                    <x-bouton.buttonSupprimer routeName="GestionEvenement" itemId="{{ $evenement->id }}" />   
                </td>
            </tr>
            @endforeach
            </tbody>
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