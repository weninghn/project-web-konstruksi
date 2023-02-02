<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progres extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    
    protected  $fillable= [
        'project_id',
        'presentase',
        'job_details',
        // 'photos',
        'date',
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_details'
            ]
            ];
    }
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