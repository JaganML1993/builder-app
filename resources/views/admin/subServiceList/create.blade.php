@extends('layouts.master')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="fas fa-arrow-left"></i>
          Back</a>
        <!-- @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif -->
        <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('admin.sub-service-list.store') }}">
              @csrf
              <div class="card-header">
                <h4>Create Sub Folder</h4>
              </div>

              <div class="card-body">

                <div class="form-group row mb-4 color-one">

                  <div class="col-6 mb-4">
                    <label class="">Folders<span class="text-danger">*</span></label>
                    <select name="services_list_id" class="form-control col">
                      @foreach($services as $service)
                      <option value="{{$service->id}}">{{$service->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-6 mb-4">
                    <label class="">Sub Folder Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control col">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>

                  <div class="col-6 mb-4">
                    <label class="">Status<span class="text-danger">*</span></label>
                    <select name="status" class="form-control col">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                    @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                  </div>

                </div>

                <div class="form-group row mb-4">
                  <div class="col-sm-12 col-md-12 text-right">
                    <button class="btn btn-primary btn-pub" type="submit">Save</button>
                  </div>
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