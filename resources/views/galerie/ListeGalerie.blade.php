<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-3xl m-4'>Galeries</h1>
        <p class="text-center">Liste des Galeries</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionGalerie" sectionName="Galerie" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Nom</th>
                    <th class="w-auto">Date de création</th>
                    <th class="w-auto">Date de modification</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($galeries as $galerie)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $galerie->nom }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $galerie->created_at }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $galerie->updated_at }}</td>

                    <!-- modifier -->
                    <td class=' border-l-2 border-y-2 border-solid  bg-gray-100'>
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
            </tbody>
        </table>
    </x-slot>
</x-app-layout>