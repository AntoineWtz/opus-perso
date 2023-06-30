<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    
    protected $table = 'publications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_publication_id',
        'user_id',
        'lieux_id',
        'titre',
        'descriptif',
        'toulousain',
        'resume_rs',
        'statut',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_publication_id' => 'integer',
        'user_id' => 'integer',
        'lieux_id' => 'integer',
        'evenement_id' => 'integer',
        'image_aperçu' => 'integer',
        'video_aperçu' => 'integer'
    ];
    public function SelectAllPublication(){
           $publication = Publication::select('*')->get();

           return $publication;
    }
    

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
    public function Img()
    {
        return $this->belongsTo(Media::class, 'image_demo');
    }
    public function video()
    {
        return $this->belongsTo(Media::class, 'video_demo');
    }

    public function galeries()
    {
        return $this->belongsToMany(Galerie::class);
    }
    public function evenements()
    {
        return $this->belongsTo(Evenement::class);
    }
    public function typePublication()
    {
        return $this->belongsTo(TypePublication::class);
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
