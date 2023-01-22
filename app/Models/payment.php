<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'clients';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected  $fillable= [
        'project_id',
        'payment_method_id',
        'amount_payment',
        'payment_date',
        'payment_to',
        'note',
    ];
    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
