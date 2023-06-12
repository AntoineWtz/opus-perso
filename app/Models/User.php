<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'nom',
        'prenom',
        'fonction',
        'descriptif',
        'derniere_connexion',
        'activite',
        'notification_csb',
        'notification_rs',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'derniere_connexion' => 'date',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function pageStatiques()
    {
        return $this->hasMany(PageStatique::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
