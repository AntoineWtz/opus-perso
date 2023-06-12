<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoAffichage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'media_id',
        'titre',
        'descriptif',
        'zone',
        'visibilite',
        'ordre',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'media_id' => 'integer',
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
