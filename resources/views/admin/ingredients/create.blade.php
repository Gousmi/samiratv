@extends('layouts.admin.main')
@section('title', 'Create new ingredient')
    
@section('content')
    <div class="card m-3">
        <div class="card-header">
        <h1 class="card-title">Fill the form to create a new Ingredient:</h1>
        </div>
               {{-- error handling from creating ingredients --}}
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
        <form role="form" action="{{ route('admin.ingredients.store') }}" method="POST">
            @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name ="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Type:</label>
                <select class="form-control select2bs4" style="width: 100%;" name="type" id="type">
                    <option selected="selected">Dairy and Eggs</option>
                    <option>Fats and oils</option>
                    <option>Fruits</option>
                    <option>Grain, nuts and baking products</option>
                    <option>Herbs and spices</option>
                    <option>Meat, sausages and fish</option>
                    <option>Pasta, rice and pulses</option>
                    <option>Vegetables</option>
                    <option>Others</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->

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
        })
    </script>  
@endsection