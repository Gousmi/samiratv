<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
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
        $recipes = DB::table('recipes')->get();
        return view('recipes.show')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return view('recipes.edit')->with('recipe', $recipe);
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
