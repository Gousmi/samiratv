@extends('layouts.admin.main')
@section('title', 'Update Recipe Images')
    
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form role="form" action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h4 class="card-title">Add new photos</h4>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="recipe-image" multiple type="file" class="custom-file-input"  name="images[]">
                                    <label class="custom-file-label" for="recipe-image">Choose file</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>  
                        </div>
                        <!-- hidden input to pass the recipe_id to imageController@store -->
                        <input id="recipe_id" name="recipe_id" type="hidden" value="{{$recipe->id;}}">
                        <input id="recipe_name" name="recipe_name" type="hidden" value="{{$recipe->name;}}">
                        
                    </form>
                    <h4 class="card-title">Images gallery</h4>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        @foreach ($recipe->images as $image)
                            @if ($image->is_thumb == 0) 
                                <div class="ekko-lightbox col-sm-2" style="flex-direction: column;">
                                    <a href="{{asset($image->path)}}" data-toggle="lightbox" data-title="{{$recipe->name}}" data-gallery="gallery">
                                    <img src="{{asset($image->path)}}" class="img-fluid mb-2" alt="{{$recipe->name}} image" >
                                    </a>
                                    <button data-id="{{$image->id}}" type="button" class="delete-button" style="background:none; border:none;" data-toggle="modal" data-target="#delete-confirmation-dialog">
                                        <i class="far fa-trash-alt text-red"> Delete</i>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="delete-confirmation-dialog" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-dialog" aria-hidden="true">
    <form id="delete-form" method="post" action="" style="display:inline;"> 
    @csrf    @method('delete')    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delete Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want the delete the selected Image?
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
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
     
 });
 $(document).ready ( function () {
    $('body').on('click', '.delete-button', function () {

      // the form action link
      $('#delete-form').attr('action', 'admin/images/' + $(this).data('id'));
      

    });
  });
  $(document).ready(function () {
            bsCustomFileInput.init()
        })
</script>
@endsection