<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
