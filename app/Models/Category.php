<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\CategorySaving;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    protected $dispatchesEvents = [
        'saving' => CategorySaving::class,
    ];

// fin --------------------------------    
}
