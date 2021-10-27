@extends('layouts.admin.main')
@section('title', 'Create new recipe')
    
@section('content')
    <div class="card m-3">
        <div class="card-header">
        <h1 class="card-title">Fill the form to create a new recipe:</h1>
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

        <!-- form start -->
        <form role="form" action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Recipe name:</label>
                <input type="text" name ="name" class="form-control" id="name" placeholder="Ex: Mac&cheese, risotto ..etc">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2bs4" style="width: 100%;" name="category" id="category">
                    <option selected="selected">Starter</option>
                    <option>Main course</option>
                    <option>Dessert</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter the description here"></textarea>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select class="select2" multiple="multiple" data-placeholder="Select a tag" name="tag[]" style="width: 100%;">
                  @foreach ($tags as $tag)
                
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                
                  @endforeach
                </select>
              </div>
            <div class="form-group">
                <label>Photo</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input id="recipe-image" multiple type="file" class="custom-file-input"  name="images[]">
                    <label class="custom-file-label" for="recipe-image">Choose file</label>
                    </div>
                </div>  
            </div> 
                                        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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

            bsCustomFileInput.init()
        })

    </script>  
@endsection