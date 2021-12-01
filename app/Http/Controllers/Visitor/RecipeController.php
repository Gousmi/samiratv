<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Recipe;
use App\Models\Comment;
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

    public function show(Recipe $recipe)
    {
        $recipeWithTag = Recipe::with('tags')->find($recipe->id);
        $nb = Comment::all()->where('commentable_id', $recipe->id)->count();

        if (count($recipe->ratings) != Null )
        {
            $nb_rating = count($recipe->ratings);
            $final_rating =0;

            foreach ($recipe->ratings as $rating )
            {
                $final_rating = $final_rating+$rating->rating; 
            }

            $final_rating =  number_format($final_rating/$nb_rating, 1);

            $rating_message = $nb_rating . ' total ratings';
        }
        else
        {
            $final_rating = 0;
            $rating_message = "not ratings yet";
        }
       
        return view('visitor.recipes.show')->with('recipe', $recipeWithTag)
                                           ->with('comments_number', $nb)
                                           ->with('final_rating', $final_rating)
                                           ->with('rating_message', $rating_message);
    }

}
