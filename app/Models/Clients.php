<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'name',
        'phone',
        'address',
    ];
}
