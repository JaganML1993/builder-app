@extends('layouts.master')
<style>

.image-preview, #callback-preview{
  height: 200px !important;
}
</style>

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.service.servicesolution.index',$id)}}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="
            fas fa-arrow-left"></i>
          Back</a>
          {{-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif --}}
        <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('admin.service.servicesolution.store',$id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-header">
                <h4>Create Service Solution</h4>
              </div>
              <!-- @include('inc.messages') -->
              <div class="card-body">

                <div class="form-group row mb-4">
                  <div class="col-12 mb-4">
                    <label class="">Title<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control col" value="{{ old('title',$search->title??'')}}">
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="" name="description">{{ old('description',$search->description??'')}} </textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="c">Image<span class="text-danger">*</span></label>

                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="image" id="image-upload" />
                      @if ($errors->has('image'))
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                      @endif
                    </div>
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg formats)</p>
                  </div>

                <div class="form-group row mb-4">

                  <div class="col-sm-12 col-md-7 text-left">
                    <button class="btn btn-primary" type="submit">Create</button>
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



@endsection