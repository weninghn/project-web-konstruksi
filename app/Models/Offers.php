<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;
    protected $table = 'offers';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'project_id',
        'category',
        'status',
        'date_offer',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
