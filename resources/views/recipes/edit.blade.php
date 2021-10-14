@extends('layouts.admin.main')
@section('title', 'Update recipe info')
    
@section('content')

<div class="row">
    <div class="col-12">
      <!-- Custom Tabs -->
      <div class="card">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">{{$recipe->name}}</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
        <p>category: {{$recipe->category}}</p>
        <p>description: {{$recipe->description}}</p>
        </div>
      </div>
      <!-- ./card -->
    </div>
    <!-- /.col -->
</div>

@endsection

@section('scripts')
@endsection