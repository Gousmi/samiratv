<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as IntImage;

class ImageController extends Controller
{
    public function store(Request $request)
    { 
        //getting recipe id and name from hidden input forms
        $recipe_id = $request->input('recipe_id');
        $recipe_name = $request->input('recipe_name');
        //

        if($request->hasFile('images')) {
            $files = $request->file('images');
            $i = 0;
            foreach($files as $image_to_upload) {
                //image
                $new_image = new Image();
                $new_image->recipe_id = $recipe_id;
                $image = $image_to_upload;
                $new_name = time() . '-' . $i . '-' . $recipe_name . '.' . $image->extension();
                $new_image->name = $new_name;
             
                $destinationPath = public_path('/images/recipes/');
                $img = IntImage::make($image->path())->save($destinationPath.'/'.$new_name);;
                $new_image->path = '/images/recipes/' . $new_name;
                $new_image->save();
                //thumbnail
                $new_thumbnail = new Image();
                $new_thumbnail->recipe_id = $recipe_id;
                $thumbnail = $image_to_upload;
                $new_thumbnail->name = $new_name;
             
                $destinationPath = public_path('/images/recipes/thumbnails/');
                $thumb = IntImage::make($thumbnail->path())->resize(75, 75, function ($constraint) {
                    $constraint->aspectRatio();})->save($destinationPath.'/'.$new_name);
                $new_thumbnail->path = '/images/recipes/thumbnails/' . $new_name;
                $new_thumbnail->is_thumb = '1' ; 
                $new_thumbnail->save();
                // the "i" is here to have a diffrent name for the images that have been added at the same timestamp
                $i++;
            }
            return Redirect::back()->with('message', 'Image(s) added successfully');
        }else{
            return Redirect::back()->with('warning', 'You must add at least one image first');
        }
    
    }

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
