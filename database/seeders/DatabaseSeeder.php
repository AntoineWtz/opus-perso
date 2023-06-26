<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeEvenement;
use App\Models\TypePublication;
use App\Models\TypeMedia;
use App\Models\GenreMusicaux;
use App\Models\MotifContact;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Seeder pour TypeEvenement
        $type_event = ['Concert', 'Showcase', 'Festival', 'Rencontre', 'Conférence musicale', 'Opéra', 'Concert d\'orchestre', 'Scène ouverte'];
        foreach ($type_event as $event) {
            TypeEvenement::factory()->create([
                'type_event' => $event
            ]);
        }

        // Seeder pour TypePublication
        $type_pub = ['Interview', 'Démo', 'Brève', 'Compte-rendu', 'Reportage Photo', 'Chronique', 'Critique', 'Story', 'Portrait'];
        foreach ($type_pub as $pub) {
            TypePublication::factory()->create([
                'type_pub' => $pub
            ]);
        }

        // Seeder pour TypeMedia
        $type_med = ['Image', 'Video'];
        foreach ($type_med as $med) {
            TypeMedia::factory()->create([
                'type_med' => $med
            ]);
        }

        // Seeder pour GenreMusicaux
        $genre_musicaux = ['Pop', 'Rock', 'Rap', 'Hip-Hop', 'Electro', 'Jazz', 'Drill', 'Punk', 'Metal', 'Post-punk', 'Post-Rock', 'Variété française', 'Reaggae', 'World', 'Dubstep', 'R&B', 'Funk', 'Melodic Techno', 'Heavy metal', 'Ska', 'Indie pop', 'Alternative', 'Country', 'Classique', 'Folk', 'Soul', 'Jungle', 'Hard rock', 'Musique Classique', 'Gospel'];
        foreach ($genre_musicaux as $genre) {
            GenreMusicaux::factory()->create([
                'nom' => $genre
            ]);
        }

// Seeder pour MotifContact
$motifs = ['artiste', 'découverte', 'autre'];
$emails = ['erwan@gmail.com', 'antoine@gmail.com', 'layla@gmail.com'];
foreach ($motifs as $motif) {
    MotifContact::factory()->create([
        'motif' => $motif,
        'email' => $emails[$index],
        'visibilite' => 'Actif',
        'ordre' => $index + 1,
    ]);
}

    }
}
