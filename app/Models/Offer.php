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
        'status',
        'date_offer',
        'number',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
    public function offer(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function detail_offers() {
        return $this->hasMany(Detail_offer::class);
    }

}
