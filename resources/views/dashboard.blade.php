<x-app-layout>
    <x-slot name="header">
        <h1 class='text-center text-4xl m-4'>Page d'Accueil</h1>
        <p class="text-center">Bienvenue dans votre espace Opus Musiques</p>
    </x-slot>
    <x-slot name="slot">
        <div class="flex flex-wrap justify-evenly items-stretch m-8 mx-auto">
            <div class="bg-yellow-300 p-4 rounded-lg shadow-lg m-4">
                <h1 class="text-xl m-4 text-center">Votre Profil</h1>
                <p>Nom : {{ Auth::user()->nom }}</p>
                <p>Prénom : {{ Auth::user()->prenom }}</p>
                <p>Email : {{ Auth::user()->email }}</p>
                <p>Fonction {{ Auth::user()->fonction }}</p>
                <p>Notes : {{ Auth::user()->descriptif }}</p>
            </div>
            <div class="bg-yellow-300 p-4 rounded-lg shadow-lg m-4">
                <h1 class="text-xl m-4 text-center">Vos dernières créations</h1>
                @foreach($publications as $publication)
                    @if($publication->user_id == Auth::user()->id)
                        <p class="mb-2">● {{ $publication->titre }} - {{ $publication->typePublication->type_pub }}</p>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="flex flex-wrap justify-evenly items-baseline m-8 mx-auto">
            <div class="bg-yellow-300 p-4 rounded-lg shadow-lg m-4">
                <h1 class="text-xl m-4 text-center">Les Dernières Publications</h1>
                @foreach($publications->take(5) as $publication)
                    <p class="mb-2">● {{ $publication->titre }}</p>
                @endforeach
            </div>
            <div class="bg-yellow-300 p-4 rounded-lg shadow-lg m-4">
                <h1 class="text-xl m-4 text-center">Les Prochains Événements</h1>
                @foreach($evenements->take(5) as $evenement)
                    <div>
                        <p>● {{ $evenement->titre }}</p>
                        <p class="mb-2">{{ $evenement->lieux->nom }} - {{ date('d/m/Y', strtotime($evenement->date_event)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
