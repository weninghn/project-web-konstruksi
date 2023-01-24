<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';
    public $timetamps = 'false';
    protected $primaryKey ='id';
    
    protected  $fillable= [
        'method',
    ];
}
