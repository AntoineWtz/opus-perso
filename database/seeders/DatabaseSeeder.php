<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeEvenement;
use App\Models\TypePublication;
use App\Models\TypeMedia;
use App\Models\GenreMusicaux;


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
        $type_event = ['Concert' , 'Showcase' , 'Festival' , 'Rencontre' , 'Conférence musicale' , 'Opéra' , 'Concert d\'orcheste' , 'Scène ouverte'];
        foreach($type_event as $type_event){
            TypeEvenement::factory()->create([
                'type_event' => $type_event
            ]);
        }
        $type_pub = ['Interview' , 'Démo' , 'Brève' , 'Compte-rendu' , 'Reportage Photo' , 'Chronique' , 'Critique' , 'Story' , 'Portrait'];
        foreach($type_pub as $type_pub){
            TypePublication::factory()->create([
                'type_pub' => $type_pub          
            ]);
        }
        $type_med = ['Image' , 'Video'];
        foreach($type_med as $type_med){
            TypeMedia::factory()->create([
                'type_med' => $type_med
            ]);
        }
        $genre_musicaux = ['Pop' , 'Rock' , 'Rap' , 'Hip-Hop' , 'Electro' , 'Jazz' , 'Pop/rock' , 'Punk' , 'Metal' , 'Post-punk' , 'Post-Rock' , 'Variété française' , 'Reaggae' , 'World' , 'Dubstep' , 'R&B' , 'Funk', 'Melodic Techno' , 'Heavy metal' , 'Ska' , 'Indie pop', 'Alternative' , 'Country' , 'Classique' , 'Folk' , 'Soul' , 'Jungle' , 'Hard rock' , 'Musique Classique' , 'Gospel' ];
        foreach($genre_musicaux as $genre_musicaux){
            GenreMusicaux::factory()->create([
                'nom' => $genre_musicaux
            ]);

        }
        
    } 
}