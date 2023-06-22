<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'actors_id','caracter_name','image'];
    protected $primaryKey = 'id';
    public function actors()
    {
        return $this->belongsTo(Actors::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }


}



