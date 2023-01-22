<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected  $fillable= [
        'project_id',
        'presentase',
        'job_details',
        'date',
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
