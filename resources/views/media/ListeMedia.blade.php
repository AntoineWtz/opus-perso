<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-3xl'>Liste des media</h1>
    </x-slot>
    <x-slot name="slot">

    {{-- Boutton New Media --}}
        <button class=" hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 ml-3  border border-red-600 hover:border-transparent rounded " type="submit"><a href="{{ route('GestionMedia.index') }}">New Media </a> </button>

        <table class="table-auto w-full mx-auto">
        <thead>
            <tr class='text-center'>
                <th class="w-auto">Titre</th>
                <th class="w-auto">Chemin</th>
                <th class="w-auto">Balise</th>
                <th class="w-auto">Photographe</th>
                <th class="w-auto">Modificateur</th>
                <th class="w-auto">Type media</th>
                <th class="w-auto">Utilisateur</th>
                <th class="w-auto">Lieux</th>
                <th class="w-auto">Date de création</th>
                <th class="w-auto">Date de modification</th>
                <th class="w-auto">Action</th>
            </tr>
            <thead>

            <tbody>
                @foreach ($medias as $media)
                <tr class='border-collapse text-left'>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->titre}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->chemin}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->balise_alt}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->photographe}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->modificateur}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->type_media->type_med}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->user->nom}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->lieux->nom}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$media->updated_at}}</td>

                    <!-- modifier -->
                    <td class=' border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                        <a href="" class="btn btn-primary">Modifier</a>

                        <!-- supprimer -->
                        <form action="{{ route('media.destroy', $media->id) }}" method="POST" id="delete-form-{{ $media->id }}">
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