<x-app-layout>
    <x-slot name="header">
            <h1 class='text-center text-4xl m-4'>Utilisateur</h1>
            <p class="text-center">Liste des Utilisateurs</p>
    </x-slot>
    <x-slot name="slot">

        <!-- bouton nouvelle entrée -->
        <div class="m-8 text-center">
            <x-bouton.buttonNew routeName="GestionUser" sectionName="Utilisateur" />
        </div>

        <table class="table-auto w-full mx-auto">
            <thead>
                <tr class='text-center'>
                    <th class="w-auto">Login de connexion</th>
                    <th class="w-auto">Role</th>
                    <th class="w-auto">Email</th>
                    <th class="w-auto">Nom</th>
                    <th class="w-auto">Prénom</th>
                    <th class="w-auto">Fonction</th>
                    <th class="w-auto">Descriptif</th>
                    <th class="w-auto">Modifier</th>
                    <th class="w-auto">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users->reverse() as $user)
                <tr class='border-collapse text-center'>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->name }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->role }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->email }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->nom }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->prenom }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->fonction }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{ $user->descriptif }}</td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- modifier -->
                        @include('components.bouton.buttonModifier', ['routeName' => 'GestionUser', 'itemId' => $user->id])
                    </td>
                    <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                        <!-- supprimer -->
                        <x-bouton.buttonSupprimer routeName="GestionUser" itemId="{{ $user->id }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>