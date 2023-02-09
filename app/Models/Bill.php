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
        return $this->belongsTo(Offer::class);
    }
}
