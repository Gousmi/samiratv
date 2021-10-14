@extends('layouts.admin.main')
@section('title', 'Update recipe info')
    
@section('content')

<!-- ***** DATA TABLE ****-->
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <table id="table-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                <tr>
                    <td>{{$recipe->name}}</td>
                    <td>{{$recipe->category}}</td>
                    <td>{{$recipe->description}}</td>
                    <td></td>
                </tr>   
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>





@endsection

@section('scripts')

@endsection