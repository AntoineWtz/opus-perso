<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Opus Musique - Le webzine musical toulousain - Contact</title>
</head>

<body class="font-poppins">
    <div class="bg-white min-h-screen">
        @include('partials.header')

        <div class="p-8 mt-8 mx-auto text-center">
            <!-- Premier bloc : Contact Artistes -->
            <h2 class="text-2xl font-bold mb-4 text-yellow-500">Contact Artistes</h2>
            <p class="mb-4">
                Musiciens, artistes, n’hésitez pas à nous contacter pour nous faire découvrir vos morceaux, par e-mail ou via Groover :
            </p>
            <div class="flex flex-col md:flex-row items-center justify-center mb-4">
                <!-- Ajout de la classe "justify-center" -->
                <a href="mailto:contact@opus-musique.fr" class="bg-yellow-500 text-white px-6 py-3 rounded-md mr-2 mb-2 md:mb-0 hover:bg-yellow-600">
                    Envoyer un email
                </a>
                <a href="https://groover.co/fr/influencer/profile/opus-musiques/" target="_blank" class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600">
                    Visiter Groover
                </a>
            </div>
        </div>
        <hr class="max-w-md mx-auto">
        <div class="p-8 mx-auto">
            <!-- Deuxième bloc : Contact Lecteurs -->
            <h2 class="text-2xl font-bold mb-4 text-center text-yellow-500">Contact Lecteurs</h2>
            <p class="mb-4 text-center">
                Un mot sympa, un groupe à faire découvrir ? Soyez pas timides ! Vous pouvez remplir le formulaire ci-dessous ou nous contacter par email : contact@opus-musique.fr
            </p>
            <!-- Formulaire -->
            <form class="max-w-md mx-auto" action="{{ route('contact.submitContactForm') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label class="block font-medium">Nom</label>
                            <input type="text" class="border border-gray-300 px-4 py-2 rounded-md w-full @error('nom') border-red-500 @enderror" name="nom" value="{{ old('nom') }}" />
                            @error('nom')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="block font-medium">Prénom</label>
                            <input type="text" class="border border-gray-300 px-4 py-2 rounded-md w-full @error('prenom') border-red-500 @enderror" name="prenom" value="{{ old('prenom') }}" />
                            @error('prenom')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block font-medium">Motif de contact</label>
                    <select class="border border-gray-300 px-4 py-2 rounded-md w-full" name="motif">
                        @foreach ($motifs as $id => $motif)
                        <option value="{{ $id }}">{{ $motif }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block font-medium">E-mail</label>
                    <input type="text" class="border border-gray-300 px-4 py-2 rounded-md w-full @error('mail') border-red-500 @enderror" name="mail" value="{{ old('mail') }}" />
                    @error('mail')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block font-medium">Message</label>
                    <textarea class="border border-gray-300 px-4 py-2 rounded-md w-full @error('message') border-red-500 @enderror" rows="4" name="message">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600" type="submit">Envoyer</button>
                </div>
                @if (session('success'))
                <div class="text-center mt-4 mb-2">
                    <div class="bg-green-500 text-white px-4 py-2 rounded-md inline-block">
                        {{ session('success') }}
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
        @include('partials.footer')
</body>

</html>