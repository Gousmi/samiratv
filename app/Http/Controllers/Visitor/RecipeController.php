<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function index()
    {   

        //$recipes= DB::table('recipes')->get();
        $recipes = Recipe::where('name','like','%'. request('search') .'%')
                        ->with('tags')
                        ->with('images')
                        ->paginate(9);
        /* 
        foreach($recipes as $recipe)
        {
            $recipe->tagsList = $recipe->tags;
        }
        */
        return view('visitor.index')->with('recipes', $recipes);
    }
}
