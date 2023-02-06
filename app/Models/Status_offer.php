<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_offer extends Model
{
    use HasFactory;
    protected $table = 'status_offers';
    public $timetamps = 'false';
    protected $primaryKey ='id';
    protected $fillable = [
        
        'name',
    ];
    
}