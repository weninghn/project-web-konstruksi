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
        'project_id',
        'payment_method_id',
        'amount_payment',
        'payment_date',
        'payment_to',
        'status',
        'note',
    ];

    protected $appends = [
        'status_text'
    ];


    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function payments(): HasMany
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


}