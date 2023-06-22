<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cast;

class Actors extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birth_date','nationality','image'];
    
    public function cast()
    {
        return $this->hasMany(Cast::class);
    }
}

