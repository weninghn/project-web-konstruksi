<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected  $fillable= [
        'bill_id',
        'payment_method_id',
        'amount_payment',
        'payment_date',
        // 'payment_to',
        'status',
        'note',
        'image',
    ];

    protected $appends = [
        'status_text',
        'payment_to'
    ];


    public function bill(){
        return $this->belongsTo(Bill::class);
    }
    public function method(){
        return $this->hasMany(Payment_method::class);
    }
  
    public function price()
    {
        return $this->belongsTo(Facility::class);
    }
    public function payments()
    {
        return $this->hasMany(payments::class);
    }

    public function progres()
    {
        return $this->hasMany(Progres::class);
    }

    public function  getStatusTextAttribute() {
        $status = $this->status ?? 0;
        
        $array_status = [
            0 => 'Belum Lunas',
            1 => 'Lunas',
        ];
        return $array_status[$status];
    }
    public function  getPaymenToAttribute() {
        
        $payment_to = $this->payment_to ?? 0;
    
        $array_payment = [
            0 => '1',
            1 => '2',
        ];
    
        return $array_payment[$paymentto];
    }


}