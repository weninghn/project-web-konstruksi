<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progres extends Model
{
    use HasFactory;
    protected $table = 'progres';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected  $fillable= [
        'project_id',
        'presentase',
        'job_details',
        // 'photos',
        'date',
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
    
    /**
     * The roles that belong to the Progres
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pictures()
    { 
        return $this->hasMany(Picture::class);
    }
}