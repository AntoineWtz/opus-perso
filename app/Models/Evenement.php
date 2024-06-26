<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'type_evenement_id',

        'lieux_id',

        'titre',

        'date_event',

        'billeterie',

        'mise_en_avant',

        'visibilite',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_evenement_id' => 'integer',
        'lieux_id' => 'integer',
        'artiste_id' => 'integer',
        'media_id' => 'integer',
        'date_event' => 'date',
    ];

    public function genreMusicauxes()
    {
        return $this->belongsToMany(GenreMusicaux::class);
    }

    public function artistes()
    {
        return $this->belongsToMany(Artiste::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function img()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
    public function typeEvenement()
    {
        return $this->belongsTo(TypeEvenement::class);
    }

    public function lieux()
    {
        return $this->belongsTo(Lieux::class);
    }
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
