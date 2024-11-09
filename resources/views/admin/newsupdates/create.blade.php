@extends('layouts.master')
<!-- CSS only -->

@section('content')
<div class="main-content">
<section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ url('admin/newsupdates') }}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="
            fas fa-arrow-left"></i>
            Back</a>
        <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('admin.newsupdates.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-header">
              <h4>Create Your News & Updates</h4>
            </div>
            <div class="card-body">
             
              <div class="form-group row mb-4">
                  <div class="col-12">
                    <label class="">Title<span class="text-danger">*</span></label>
               
                    <input type="text" name="title" class="form-control col" value="{{ old('title',$post->title??'')}}" required>
                    <input type="hidden" name="id" value="{{ $post->id??'' }}">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                  </div>
                 
                
              
              </div>
             
             
              <div class="form-group row mb-4">
                
                <div class="col-6">
                    <label class="">Meta Description</label>
               
                    <input type="text" name="meta_description" value="{{ old('meta_description',$post->meta_description??'')}}"  class="form-control col">
                    
                  </div>
                  <div class="col-6">
                    <label class="">Meta Title</label>
               
                    <input type="text" name="meta_title" value="{{ old('meta_title',$post->meta_title??'')}}"  class="form-control col">
                  </div>
              </div>
             
              <div class="form-group row mb-4">
               
                <div class="col-12">
                    <label class="">Content<span class="text-danger">*</span></label>
               
                    <textarea class="summernote-simple" id="summernote" name="content" required>{{ old('content',$post->content??'')}} </textarea>
                    @if ($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                  </div>
                  <div class="col-4">
                    <label class="c">Image<span class="text-danger">*</span></label>
                   
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="image" id="image-upload"  required/>
                      @if ($errors->has('image'))
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                  @endif
                    </div>
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg formats)</p>
                  </div>
              </div>
              <div class="col-4">
               @isset($post)
               <img src="{{ asset('images/'.$post->image)}}" class="mt-5" style="height: 150px;width:150px">
               @endisset
               
                 
                  </div>
             
              <div class="form-group row mb-4">
              
                <div class="col-sm-12 col-md-7 text-left">
                  <button class="btn btn-primary">Create Post</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});

</script>
@endsection
