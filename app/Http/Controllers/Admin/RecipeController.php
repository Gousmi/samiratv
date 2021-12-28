<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as IntImage;

class RecipeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //$recipes= DB::table('recipes')->get();
        $recipes = Recipe::with('tags')->get();
        /* 
        foreach($recipes as $recipe)
        {
            $recipe->tagsList = $recipe->tags;
        }
        */
        return view('admin.recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $ingredients = Ingredient::all();

        return view('admin.recipes.create')->with('tags', $tags)->with('ingredients', $ingredients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        $validated = $request->validate([

            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
        ]);

        $recipe = new Recipe();

        $recipe->name = $request->input('name');
        $recipe->category = $request->input('category');
        $recipe->description = $request->input('description');
        $recipe->save();

        // Ingredients
            //check
            if($request->has('ingredient'))
            {   
                $ingredients = $request->input('ingredient');
                $quantities = $request->input('quantity');
                $arr = [];
                for($i=0; $i < count($ingredients); $i++)
                {
                    $arr[$ingredients[$i]] = ['quantity' => $quantities[$i]];
                }
                
                $recipe->ingredients()->sync($arr, false);
            }
        
        // tags
            if ($request->has('tag'))
        {
            $recipe->tags()->sync($request->input('tag'));
        }

        // Images        
/*         $i = 1;
        $finaldata = array();
        foreach ($request->images as $image)
        {  
            $data = array();
            $newImageName = time() . '-' . $i . '-' . $request->name . '.' . $image->extension();
            $newImagePath = '/images/recipes/'. $newImageName;
            $image->move(public_path('images/recipes/'), $newImagePath);
            $i = $i +1;
            //creating thumbnail with intervention
            dd($image->path());
            $thumbnail = IntImage::make($image->path())->resize(240, 160)->save('/images/recipes/thumbnails' . $newImageName, 50);
            $newThumbnailPath = '/images/recipes/thumbnails'. $newImageName;
             //saving the image info in an array
            $data = array('path' => $newImagePath ,'recipe_id' => $recipe->id);
            $finaldata[] = $data;
            //saving the thumbnail info in an array
            $data = array('path' => $newThumbnailPath ,'recipe_id' => $recipe->id);
            $finaldata[] = $data;
        }
        Image::upsert($finaldata,['path','recipe_id']); */

        if($request->hasFile('images')) {
            $files = $request->file('images');
            $i = 0;
            foreach($files as $image_to_upload) {
                //image
                $new_image = new Image();
                $new_image->recipe_id = $recipe->id;
                $image = $image_to_upload;
                $new_name = time() . '-' . $i . '-' . $request->name . '.' . $image->extension();
                $new_image->name = $new_name;
             
                $destinationPath = public_path('/images/recipes/');
                $img = IntImage::make($image->path())->resize(null, 700, function($constraint){
                    $constraint->aspectRatio();
                    })->crop(700,700)->save($destinationPath.'/'.$new_name);;
                $new_image->path = '/images/recipes/' . $new_name;
                $new_image->save();
                //thumbnail
                $new_thumbnail = new Image();
                $new_thumbnail->recipe_id = $recipe->id;
                $thumbnail = $image_to_upload;
                $new_thumbnail->name = $new_name;
            
                $destinationPath = public_path('/images/recipes/thumbnails/');
                $thumb = IntImage::make($thumbnail->path())->resize(null, 70, function ($constraint) {
                    $constraint->aspectRatio();})->crop(70,70)->save($destinationPath.'/'.$new_name);
                $new_thumbnail->path = '/images/recipes/thumbnails/' . $new_name;
                $new_thumbnail->is_thumb = '1' ; 
                $new_thumbnail->save();
                
                $i++;
            }
        }

        return redirect(route('admin.recipes.index'))->with('message', 'Recipe added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {   
     /*    $recipe = DB::table('recipes')->find($recipe); */
        $recipeWithAttributes = Recipe::with('tags', 'ingredients')->find($recipe->id);
        $tags = Tag::all();
        $ingredients = Ingredient::all();
            //dd($recipeWithTag);
        return view('admin.recipes.edit')->with('recipe', $recipeWithAttributes)->with('tags', $tags)->with('ingredients', $ingredients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Recipe $recipe)
    {
        $validated = $request->validate([

            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
        ]);
        
        $recipe->name = $request->input('name');
        $recipe->category = $request->input('category');
        $recipe->description = $request->input('description');

        if ($request->has('tag'))
        {
            $recipe->tags()->sync($request->input('tag'));
        }



        $recipe->update();

        return redirect(route('admin.recipes.index'))->with('message', 'Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
    
        return redirect(route('admin.recipes.index'))->with('message', 'Recipe deleted successfully');
    }

    public function editImage(Recipe $recipe)
    {
        return view('admin.recipes.editimage')->with('recipe', $recipe);

    }

    public function updateImage(Recipe $recipe)
    {
        

    }
}
