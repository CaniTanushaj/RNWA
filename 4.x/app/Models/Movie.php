<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cast;
use App\Models\Category;
use App\Models\Comment;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'release_date', 'director','is_series','category_id','image'];

    protected $primaryKey = 'id';
    public function cast()
    {
        return $this->hasMany(Cast::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
