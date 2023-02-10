<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table = 'facilitys';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'detail_offer_id',
        'nama',
        'quantity',
        'price',
		'total',
    ];

    public function Detail_offer(): BelongsTo
    {
        return $this->belongsTo(Detail_offer::class,'detail_offer_id','id' );
    }
}