<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_offer extends Model
{
    use HasFactory;
    protected $table = 'detail_offers';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'offer_id',
        'facility',
        'quantity',
        'total',
    ];
    
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}