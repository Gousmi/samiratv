<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {   
        $thumbnail = $image->thumbnail;
        
        $image_path = public_path("") .$image->path;
        $thumbnail_path = public_path("") .$thumbnail->path;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        if(File::exists($thumbnail_path)){
            File::delete($thumbnail_path);
        }
        
        $thumbnail->delete();
        $image->delete();
    
        return Redirect::back()->with('message', 'Image deleted successfully');
    }
}
