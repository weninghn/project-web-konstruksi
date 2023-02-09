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
        // 'offer_id',
        // 'payment_id',
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
    
    public function payment()
    {
        return $this->belongsTo(Payment::class,'payment_id','id');
    }
    
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }
    
    public function pictures()
    { 
        return $this->hasMany(Picture::class);
    }
}