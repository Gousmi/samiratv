@foreach($comments as $comment)
<div class="display-comment">
    {{-- <strong>{{ $comment->user->name }}</strong> --}}
    <div class="card">
        <div class="card-body border-right-0">
            <div class="card-title">
                <i class="fas fa-user d-inline mr-2"></i><h3 class="d-inline">{{ $comment->user_name}} says:</h3>
            </div>
            <div class="card-text">
                <p>{{ $comment->comment }}</p>
            </div>
            <a class="btn text-warning" role="button" data-toggle="collapse" href="#collapseComment{{ $comment->id }}" aria-expanded="false" aria-controls="collapseComment{{ $comment->id }}">reply</a>
        </div>    
        <div class="collapse ml-4 mr-4" id="collapseComment{{ $comment->id }}">
            <form method="post" action="{{ route('visitor.reply.store') }}">
                @csrf
                <div class="form-group form-inline">
                    <label for="user_name">Name: </label><input type="text" id="user_name" name="user_name" class="form-control ml-2 mr-2 form-control-sm"/>
                    <label for="user_email">Email: </label><input type="text" id="user_email" name="user_email" class="form-control ml-2 mr-2 form-control-sm"/>
                </div>
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" />
                    <input type="hidden" name="recipe_id" value="{{ $recipe_id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-outline-warning py-0" style="font-size: 0.8em;" value="Send" />
                </div>
            </form>
        </div>
    </div>
    
    @include('visitor.recipes.replies', ['replies' => $comment->replies,'parent_id'=> $comment->id])
    <hr/>
</div>
@endforeach