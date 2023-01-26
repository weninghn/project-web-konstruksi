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
        'note',
    ];
    public function project(){
        return $this->belongsTo(Project::class);
    }
}