<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'content', 
        'trending', 
        'published', 
        'category_id',
        'image'];
        
        public function category()
        {
            return $this->belongsTo(Category::class);
            
        }
        // public static function boot()
// {
    // parent::boot();

    // // Automatically generate slug from title before saving
    // static::saving(function ($topic) {
    //     $topic->slug = Str::slug($topic->title);
    // });

}
