<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Recipe;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $recipe = Recipe::find($request->recipe_id);

        $recipe->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->parent_id = $request->get('comment_id');

        $recipe = Recipe::find($request->get('recipe_id'));

        $recipe->comments()->save($reply);

        return back();
    }

}
