<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clients extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'phone',
        'email',
        'address',
        'created_at',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
            ];
    }
    public function project()
    {
        return $this->hasMany(Project::class);
    }
}