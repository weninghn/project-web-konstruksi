<?php

namespace App\Models;

use App\Models\Progres;
use App\Models\Status_offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'project_id',
        'status_id',
        'date_offer',
        'number',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
    public function status(){
        return $this->belongsTo(Status_offer::class,'status_id','id');
    }
    public function offer(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function detail_offers() {
        return $this->hasMany(Detail_offer::class);
    }
    public function facilitys()
    {
        return $this->belongsTo(Facility::class,'facility_id','id');
    }
    public function progres()
    {
        return $this->hasMany(Progres::class);
    }
}
    // public function allData()