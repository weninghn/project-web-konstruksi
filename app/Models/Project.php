<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'client_id',
        'work_date',
        'end_date',
        'location',
        'name',
        'status',
        'date_offer',
        'status',
        'status_payment',
    ];

    public function client(){
        return $this->belongsTo(Clients::class,'client_id','id');
    }
    public function offer(){
        return $this->hasMany(Offers::class);
    }

}