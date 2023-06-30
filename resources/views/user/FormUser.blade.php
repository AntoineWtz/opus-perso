<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-center mt-2">
            @isset($user)
                Modifier l'utilisateur : "{{ $user->name }}"
            @else
                Nouvel Utilisateur
            @endisset
        </h1>
    </x-slot>
    <x-slot name="slot">
        <form class="ml-4" action="{{ isset($user) ? route('GestionUser.update', ['GestionUser' => $user->id]) : route('GestionUser.store') }}" method="POST">
            @csrf
            @isset($user)
                @method('PUT')
            @endisset

            <!-- Affichage des erreurs de validation -->
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            <!-- Champ pour le name -->
            <h2 class="font-bold mt-2">Name</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="name" placeholder="Entrer votre name" value="{{ isset($user) ? $user->name : '' }}">

            <!-- Champ pour le rôle du back-office -->
            <div class="flex">
                <h2 class="font-bold m-2" for="role_id">Rôle</h2>
                <select class="mr-4 rounded border-gray-200" name="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ (isset($user) && $user->role_id == $role->id) ? 'selected' : '' }}>
                        {{ $role->nom }}
                    </option>
                @endforeach
                </select>
            </div>

            <!-- Champ pour l'email -->
            <h2 class="font-bold mt-2">Email</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="email" placeholder="Entrer votre email" value="{{ isset($user) ? $user->email : '' }}">
            
            <!-- Champ pour le mot de passe -->
            <h2 class="font-bold mt-2">Mot de passe</h2>
            <input class="w-10/12 rounded border-gray-200" type="password" name="password" placeholder="Entrer votre mot de passe" value="{{ isset($user) ? $user->password : '' }}">
           
            <!-- Champ pour le nom -->
            <h2 class="font-bold mt-2">Nom</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="nom" placeholder="Entrer votre nom" value="{{ isset($user) ? $user->nom : '' }}">


            <!-- Champ pour le prénom -->
            <h2 class="font-bold mt-2">Prénom</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="prenom" placeholder="Entrer votre prénom" value="{{ isset($user) ? $user->prenom : '' }}">

            <!-- Champ pour la fonction -->
            <h2 class="font-bold mt-2">Fonction</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="fonction" placeholder="Entrer votre fonction" value="{{ isset($user) ? $user->fonction : '' }}">

            <!-- Champ pour le descriptif -->
            <h2 class="font-bold mt-2">Descriptif</h2>
            <input class="w-10/12 rounded border-gray-200" type="text" name="descriptif" placeholder="Entrer votre descriptif" value="{{ isset($user) ? $user->descriptif : '' }}">
		
	    <br><br>
            <!-- Boutons de soumission et d'annulation du formulaire -->
            @include('components.bouton.buttonAnnuler', ['route' => 'GestionUser.index'])
            @component('components.bouton.buttonValider')
            @endcomponent
        </form>
    </x-slot>
</x-app-layout>
