<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'descriptif',
        'lien_facebook',
        'lien_youtube',
        'lien_twiiter',
        'lien_instagram',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'media_id' => 'integer'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function publications()
    {
        return $this->belongsToMany(Publication::class);
    }

    public function genreMusicauxes()
    {
        return $this->belongsToMany(GenreMusicaux::class);
    }

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class);
    }
}
