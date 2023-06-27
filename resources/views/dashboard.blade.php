<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-4xl">Page d'accueil</h1>
    </x-slot>
    <x-slot name="slot">
        <div class='gap-2'>
            <div class="absolute left-200 top-20 text-center bg-yellow-300 w-30">
                <h1>Votre Profil</h1>
                <h2 class="ml-4 mt-3 text-l">Nom :</h2>
                <p class="ml-4 mt-1 text-l">{{ Auth::user()->nom }}</p>
                <h2 class="ml-4 mt-3 text-l">Prénom :</h2>
                <p class="ml-4 mt-1 text-l">{{ Auth::user()->prenom }}</p>
                <h2 class="ml-4 mt-3 text-l">Email :</h2>
                <p class="ml-4 mt-1 text-l">{{ Auth::user()->email }}</p>
                <h2 class="ml-4 mt-3 text-l">Fonction :</h2>
                <p class="ml-4 mt-1 text-l">{{ Auth::user()->fonction }}</p>
                <h2 class="ml-4 mt-3 text-l">Descriptif :</h2>
                <p class="ml-4 mt-1 text-l">{{ Auth::user()->descriptif }}</p>
            </div>
            <div class="absolute top-20 right-0 text-center bg-yellow-300 w-30 h-30">
                <h1>Les Dernières Publications</h1>
                @foreach($publications->take(5) as $publication)
                    <p>{{ $publication->titre }}</p>
                @endforeach
            </div>
            <div class="absolute bottom-0 right-0 text-center bg-yellow-300 w-30 h-30">
                <h1>Les Prochains Événements</h1>
                @foreach($evenements->take(5) as $evenement)
                    <p>{{ $evenement->titre }}</p>
                    <p>{{ $evenement->date_event }}</p>
                @endforeach
            </div>

        </div>
    </x-slot>
</x-app-layout>