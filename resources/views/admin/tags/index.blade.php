@extends('layouts.admin.main')
@section('title', 'Tags info')
    
@section('content')

<!-- ***** DATA TABLE ****-->
<div class="card m-3">
    <div class="card-header">
    <a class="btn btn-primary float-right" href="{{route('admin.tags.create')}}">Add a new tag</a>
    </div>
    <div class="card-body">
        <table id="table-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}" class="ml-1 mr-3 edit-button" style="background:none; border:none;"> 
                            <i class="far fa-edit text-blue "></i>
                        </a>
                        <button data-id="{{$tag->id}}" type="button" class="delete-button" style="background:none; border:none;" data-toggle="modal" data-target="#delete-confirmation-dialog">
                            <i class="far fa-trash-alt text-red"></i>


                    </td>
                </tr>   
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="modal fade" id="delete-confirmation-dialog" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-dialog" aria-hidden="true">
    <form id="delete-form" method="post" action="" style="display:inline;"> 
    @csrf    @method('delete')    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delete Recipe</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want the delete the selected tag?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </div>
    </form>
  </div> 


@endsection

@section('scripts')
<script>
$(document).ready ( function () {
    $('body').on('click', '.delete-button', function () {

      // the form action link
      $('#delete-form').attr('action', 'tags/' + $(this).data('id'));

    });
  });
</script>

@endsection