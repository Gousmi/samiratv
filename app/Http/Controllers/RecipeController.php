<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.recipes.show')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.recipes.create')->with('tags', $tags);
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
            'image'=>'required',
        ]);

        $recipe = new Recipe();

        $recipe->name = $request->input('name');
        $recipe->category = $request->input('category');
        $recipe->description = $request->input('description');
        $recipe->save();
        
        // tags
            if ($request->has('tag'))
        {
            $recipe->tags()->sync($request->input('tag'));
        }

        // Images        
        $i = 1;
        $finaldata = array();
        foreach ($request->images as $image)
        {
             $data = array();
             $newImageName = '/images/recipes/'. time() . '-' . $i . '-' . $request->name . '.' . $image->extension();
             $image->move(public_path('images/recipes/'), $newImageName);
             $i = $i +1;
             
        /*   $finalImage = new Image();
             $finalImage->path = $newImageName;
             $finalImage->recipe_id = $recipe->id;
              */
            $data = array('path' => $newImageName ,'recipe_id' => $recipe->id);
            $finaldata[] = $data;

        }
        Image::upsert($finaldata,['path','recipe_id']);

        return redirect(route('recipes.index'))->with('message', 'Recipe added successfully');
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
        $recipeWithTag = Recipe::with('tags')->find($recipe->id);
        $tags = Tag::all();
            //dd($recipeWithTag);
        return view('admin.recipes.edit')->with('recipe', $recipeWithTag)->with('tags', $tags);
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


        $recipe->save();

        return redirect(route('recipes.index'))->with('message', 'Recipe updated successfully');
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
    
        return redirect(route('recipes.index'))->with('message', 'Recipe deleted successfully');
    }
}
