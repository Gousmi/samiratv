<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = DB::table('ingredients')->get();
        return view('admin.ingredients.index')->with('ingredients', $ingredients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ingredients.create');
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

        ]);

        $Ingredient = new Ingredient();

        $Ingredient->name = $request->input('name');

        $Ingredient->type = $request->input('type');

        $Ingredient->save();

        return redirect(route('admin.ingredients.index'))->with('message', 'Ingredient added successfully');

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
    public function edit(Ingredient $Ingredient)
    {   
     /*    $Ingredient = DB::table('ingredients')->find($Ingredient); */

        return view('admin.ingredients.edit')->with('Ingredient', $Ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ingredient $Ingredient)
    {
        $validated = $request->validate([

            'name'=>'required',

        ]);
        
        $Ingredient->name = $request->input('name');

        $Ingredient->save();

        return redirect(route('admin.ingredients.index'))->with('message', 'Ingredient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $Ingredient)
    {
        $Ingredient->delete();
    
        return redirect(route('admin.ingredients.index'))->with('message', 'Ingredient deleted successfully');
    }
}
