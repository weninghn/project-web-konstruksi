<?php

namespace App\Models;

use GuzzleHttp\Client;
// use App\Models\payment;
// use App\Models\status;
// use App\Models\status_payment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'work_date',
        'date_end',
        'name',
        'location',
        // 'date_offer',
        'price',
        // 'status_id',
        // 'status_payment_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
            ];
    }

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
   
    // public function status()
    // {
    //     return $this->belongsTo(status::class,'status_id','id');
    // }
    // public function status_payment()
    // {
    //     return $this->belongsTo(status_payment::class,'status_payment_id','id');
    // }
}