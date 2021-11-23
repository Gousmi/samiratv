@foreach($replies as $reply)
<div class="display-comment ml-5">
    {{-- <strong>{{ $comment->user->name }}</strong> --}}
    <h3>{{ $reply->user_name }}
    <small class="text-muted">{{ $reply->user_email }}</small> </h3>
    <p>{{ $reply->comment }}</p>
    <form method="post" action="{{ route('visitor.reply.store') }}">
        @csrf
        <div class="form-group form-inline">
            <label for="user_name">Name: </label><input type="text" id="user_name" name="user_name" class="form-control form-control-sm"/>
            <label for="user_email">Email: </label><input type="text" id="user_email" name="user_email" class="form-control form-control-sm"/>
        </div>
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="recipe_id" value="{{ $recipe_id }}" />
            <input type="hidden" name="comment_id" value="{{ $parent_id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
</div>
@endforeach