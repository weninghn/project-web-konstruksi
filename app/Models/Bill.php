<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable=[
        'offer_id',
        'total',
        'status',
    ];
    public function offer()
    {
        return $this->belongsTo(Offer::class,'offer_id','id');
    }

    public function payments()
    {
        return $this->hasMany(payment::class);
    }

    public function remainingAmount()
    {
        $total = $this->total;
        $total_paid = $this->payments()->sum('amount_payment');

        return $total - $total_paid;
    }

    public function  getStatusTextAttribute() {
        $status = $this->status ?? 0;

        $array_status = [
            0 => 'belum Lunas',
            1 => 'Lunas',
            
        ];

        return $array_status[$status];
    }
}