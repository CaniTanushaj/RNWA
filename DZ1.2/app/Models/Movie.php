<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cast;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'release_date', 'director','genre'];

    protected $primaryKey = 'id';
    public function cast()
    {
        return $this->hasMany(Cast::class);
    }
}
