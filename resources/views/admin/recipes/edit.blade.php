@extends('layouts.admin.main')
@section('title', 'Update recipe info')
    
@section('content')

<div class="card m-3">
  <div class="card-header">
  <h1 class="card-title">Fill the form with updated info:</h1>
  </div>
  {{-- error handling from creating recipes --}}
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
    @endif
    
    <!-- /.card-header -->
  <div class="card-body">
    <!-- form start -->
    <form role="form" action="{{ route('recipes.update',['recipe'=>$recipe->id]) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="row">
            @foreach ($recipe->images as $image)
             @if ($image->is_thumb == 1)    
             <div class="col-md-6 col-lg-3 col-xl-2">
             <div class="card mb-2 bg-gradient-dark">
                 <img class="card-img-top" src="{{asset($image->thumbnail->path)}}" alt="Dist Photo 1">
                 <div class="card-img-overlay d-flex flex-column justify-content-end">
                 </div>
             </div>
             </div>
             @endif
            @endforeach

            <div class="form-group">
                <a class="btn btn-primary float-right" href="{{route('recipes.editimage', ['recipe' => $recipe])}}">Update images</a>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name ="name" class="form-control" id="name" placeholder="Enter name" value="{{$recipe->name}}">
        </div>
        <div class="form-group">
          <label>Category</label>
          <select class="form-control select2bs4" style="width: 100%;" name="category" id="category">
              <option @if ($recipe->category == "starter") {{'selected'}} @endif>Starter</option>
              <option @if ($recipe->category == "Main course") {{'selected'}} @endif>Main course</option>
              <option @if ($recipe->category == "Dessert") {{'selected'}} @endif>Dessert</option>
          </select>
          </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter the description here"
            >{{$recipe->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="select2" multiple="multiple" data-placeholder="Select a tag" name="tag[]" style="width: 100%;">
            @foreach ($tags as $tag)
            
                <option 
                        @foreach ($recipe->tags as $rtag)
                            @if ($rtag->name == $tag->name)
                                {{'selected'}}
                            @endif
                        @endforeach
                        

                    value="{{$tag->id}}"
                    >{{$tag->name}}
                </option>
            
            @endforeach
            </select>
        </div>
{{--             <div class="form-group">
          <label for="exampleInputFile">Upload a photo</label>
          <div class="input-group">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
          </div>
      </div> --}}
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update</button>
  </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
   
    $(document).ready(function () {

            //Initialize Select2 Elements
            $('.select2').select2()
        
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            }) 
            /* $('#select2').val('3').trigger('change'); */
        })
</script>
@endsection