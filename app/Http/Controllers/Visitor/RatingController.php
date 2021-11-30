<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Recipe;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->recipe_id = $request->recipe_id;
        $recipe = Recipe::find($request->recipe_id);
        $recipe->ratings()->save($rating);
        return back();
    }

    public function show(Recipe $recipe)
    {
        $ratings = $recipe->ratings->get();
        
        dd($ratings);
    }
}
