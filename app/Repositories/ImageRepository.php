<?php

namespace App\Repositories;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageRepository
{
    public function store($request)
    {
        // Save image
        $path = Storage::disk('images')->put('', $request->file('image'));
        // Save thumb
        $image = InterventionImage::make($request->file('image'))->widen(500);
        Storage::disk('thumbs')->put($path, $image->encode());
        // Save in base
        $image = new Article;
        $image->description = $request->description;
        $image->category_id = $request->category_id;
        $image->name = $path;
        $image->user_id = auth()->id();
        $image->save();
    }

// fin -------------------------------    
}