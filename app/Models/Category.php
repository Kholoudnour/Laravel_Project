<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'timestamp',
    ];
    public function topics()
    {
        return $this->hasMany(Topic::class, 'foreginKey', 'localKey');
    }
    public function latest_topic()
    {
        return $this->hasMany(topic::class)->latest()->take(3);
    }

}
