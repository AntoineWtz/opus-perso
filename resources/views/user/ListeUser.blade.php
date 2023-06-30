<x-app-layout>
    <x-slot name="header">
        <div class="m-4">
            <h1 class='text-center text-4xl'>Utilisateur</h1>
            <p class="text-center">Liste des Utilisateurs</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <x-bouton.buttonNew routeName="GestionUser" sectionName="Utilisateur" />

        <table class="table-auto">
            <thead>
                <tr class='text-left'>
                    <th class='ml-4 mt-3 text-l'>Login de connexion</th>
                    <th class='ml-4 mt-3 text-l'>Role</th>
                    <th class='ml-4 mt-3 text-l'>Email</th>
                    <th class='ml-4 mt-3 text-l'>Nom</th>
                    <th class='ml-4 mt-3 text-l'>Prénom</th>
                    <th class='ml-4 mt-3 text-l'>Fonction</th>
                    <th class='ml-4 mt-3 text-l'>Descriptif</th>
                    <th class='ml-4 mt-3 text-l'>Modifier</th>
                    <th class='ml-4 mt-3 text-l'>Supprimer</th>
                </tr>
            </thead>
            @foreach ($users->reverse() as $user)
            <tr class='border-collapse text-left'>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->name }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->role_id->nom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->email }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->nom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->prenom }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->fonction }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{ $user->descriptif }}</td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>
                    <!-- modifier -->
                    @include('components.bouton.buttonModifier', ['routeName' => 'GestionUser', 'itemId' => $user->id])
                </td>
                <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid bg-gray-50'>
                    <!-- supprimer -->
                    <x-bouton.buttonSupprimer routeName="GestionUser" itemId="{{ $user->id }}" />
                </td>

            </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>