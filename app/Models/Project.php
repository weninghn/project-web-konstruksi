<?php

namespace App\Models;

use GuzzleHttp\Client;
// use App\Models\payment;
// use App\Models\status_payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'client_id',
        'work_date',
        'date_end',
        'name',
        'location',
        'date_offer',
        'price',
    ];

    public function client(){
        return $this->belongsTo(Clients::class,'client_id','id');
    }
    public function offer(){
        return $this->hasMany(Offer::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }   
   
    
}