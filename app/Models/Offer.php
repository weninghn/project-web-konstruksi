<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'project_id',
        'category',
        'status',
        'date_offer',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
<<<<<<< HEAD:app/Models/Offer.php
    public function offer(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
=======

    public function detail_offers() {
        return $this->hasMany(Detail_offer::class, 'offer_id', 'id');
    }

}
>>>>>>> 3a1f516144153dbc82a7fa881854b52b2986c12d:app/Models/Offers.php
