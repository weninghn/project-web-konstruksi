<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;
    protected $table = 'status';
    public $timetamps = 'false';
    protected $primaryKey ='id';
    protected $fillable = [
        'id',
        'nama',
    ];
}
