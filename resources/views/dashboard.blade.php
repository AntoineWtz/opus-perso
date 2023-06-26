<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-4xl'>Page d'accueil</h1>
    </x-slot>
    <x-slot name="slot">
        <table class="table-auto">
            <thead>
                <tr class='text-left'>
                    <th class='ml-4 mt-3 text-l'>Nom</th>
                    <th class='ml-4 mt-3 text-l'>Prénom</th>
                    <th class='ml-4 mt-3 text-l'>Email</th>
                    <th class='ml-4 mt-3 text-l'>Fonction</th>
                    <th class='ml-4 mt-3 text-l'>Descriptif</th>
                </tr>
            </thead>
            @foreach ($users->reverse() as $user)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->nom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->prenom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->email }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->fonction }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->descriptif }}</td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
