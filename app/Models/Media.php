<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_media_id',
        'user_id',
        'lieux_id',
        'chemin',
        'titre',
        'balise_alt',
        'modifieur',
        'photographe',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_media_id' => 'integer',
        'user_id' => 'integer',
        'lieux_id' => 'integer',
    ];

    public function galeries()
    {
        return $this->belongsToMany(Galerie::class);
    }

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class);
    }

    public function publications()
    {
        return $this->belongsToMany(Publication::class);
    }

    public function typeMedia()
    {
        return $this->belongsTo(TypeMedia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lieux()
    {
        return $this->belongsTo(Lieux::class);
    }
}
