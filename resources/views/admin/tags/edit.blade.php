@extends('layouts.admin.main')
@section('title', 'Update tag info')
    
@section('content')

<div class="card m-3">
  <div class="card-header">
  <h1 class="card-title">Fill the form with updated info:</h1>
  </div>
         {{-- error handling from creating tags --}}
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
  <!-- form start -->
  <form role="form" action="{{ route('admin.tags.update',['tag'=>$tag->id]) }}" method="POST">
      @csrf 
      @method('PUT')
  <div class="card-body">
      <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name ="name" class="form-control" id="name" placeholder="Enter name" value="{{$tag->name}}">
        </div>
        {{--
    <div class="form-group">
      <div class="form-group">
          <label>Category</label>
          <select class="form-control select2bs4" style="width: 100%;" name="category" id="category">
              <option @if ($tag->category == "starter") {{'selected'}} @endif>Starter</option>
              <option @if ($tag->category == "Main course") {{'selected'}} @endif>Main course</option>
              <option @if ($tag->category == "Dessert") {{'selected'}} @endif>Dessert</option>
          </select>
      </div>
      <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter the description here"
          >{{$tag->description}}</textarea>
      </div>
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
@endsection