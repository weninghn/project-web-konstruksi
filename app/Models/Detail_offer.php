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
        'category',
        'quantity',
        'total',
    ];
    
    public function offer()
    {
        return $this->belongsTo(Offers::class);
    }
    public function Facility(): HasMany
    {
        return $this->hasMany(Facility::class);
    }
}
