@extends('layouts.admin.main')
@section('title', 'Create new recipe')
    
@section('content')
    <div class="card card">
        <div class="card-header">
        <h1 class="card-title">Fill the form to create a new recipe:</h1>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="email" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Starter</option>
                    <option>Main course</option>
                    <option>Dessert</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter the description here"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
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