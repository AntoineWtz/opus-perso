<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreMusicaux extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
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
        return $this->belongsToMany(Publication::class);
    }

    public function artistes()
    {
        return $this->belongsToMany(Artiste::class);
    }

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class);
    }
}
