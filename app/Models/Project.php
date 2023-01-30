<?php

namespace App\Models;

use GuzzleHttp\Client;
// use App\Models\status;
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
        // 'status_id',
        // 'status_payment_id',
    ];

    public function client(){
        return $this->belongsTo(Clients::class,'client_id','id');
    }
    public function offer(){
        return $this->hasMany(Offers::class);
    }
    
    // public function status()
    // {
    //     return $this->belongsTo(status::class,'status_id','id');
    // }
    // public function status_payment()
    // {
    //     return $this->belongsTo(status_payment::class,'status_payment_id','id');
    // }

}