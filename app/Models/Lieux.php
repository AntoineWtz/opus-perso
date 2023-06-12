<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieux extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'adresse',
        'visibilite',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
