@extends('layouts.admin.main')
@section('title', 'Update Recipe Images')
    
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Images gallery</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($recipe->images as $image)
                            @if ($image->is_thumb == 0) 
                                <div class="col-sm-2">
                                    <a href="{{asset($image->path)}}" data-toggle="lightbox" data-title="{{$recipe->name}}" data-gallery="gallery">
                                    <img src="{{asset($image->path)}}" class="img-fluid mb-2" alt="{{$recipe->name}} image" >
                                    </a>
                                    {{-- <button  type="button" class="delete-button" style="background:none; border:none;"  data-target="#delete-confirmation-dialog">
                                        <i class="far fa-trash-alt text-red"></i> --}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    }); 
 })
</script>
@endsection