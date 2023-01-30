<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_payment extends Model
{
    use HasFactory;
    protected $table = 'status_payment';
    public $timetamps = 'false';
    protected $primaryKey ='id';
    protected $fillable = [
        'id',
        'nama',
    ];
}
