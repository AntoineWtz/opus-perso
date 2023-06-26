<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-3xl'>Liste des Galeries</h1>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionGalerie" sectionName="Galerie" />

        <table class="table-auto w-full">
            <thead>
                <tr class='text-left'>
                    <th class="w-8">Nom</th>
                    <th class="w-5">Date de création</th>
                    <th class="w-5">Date de modification</th>
                    <th class="w-2">Action</th>
                </tr>
            </thead>

            @foreach ($galeries as $galerie)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $galerie->nom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $galerie->created_at }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $galerie->updated_at }}</td>

                <!-- modifier -->
                <td class=' border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                    <a href="" class="btn btn-primary">Modifier</a>

                    <!-- supprimer -->
                    <form action="{{ route('galerie.destroy', $galerie->id) }}" method="POST" id="delete-form-{{ $galerie->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn" onclick="return confirmDelete(event)">Supprimer</button>
                    </form>
                    <script>
                        function confirmDelete(event) {
                            event.preventDefault();

                            if (confirm("Êtes-vous sûr de vouloir supprimer cet entrée ?")) {
                                document.getElementById('delete-form').submit();
                            }
                        }
                    </script>
                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>