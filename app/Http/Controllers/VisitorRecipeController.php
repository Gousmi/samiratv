<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorRecipeController extends Controller
{
    public function index()
    {   

        //$recipes= DB::table('recipes')->get();
        $recipes = Recipe::with('tags')->with('images')->get();
        /* 
        foreach($recipes as $recipe)
        {
            $recipe->tagsList = $recipe->tags;
        }
        */
        return view('layouts.visitor.main')->with('recipes', $recipes);
    }
}
