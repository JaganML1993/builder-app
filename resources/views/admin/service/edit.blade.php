@extends('layouts.master')

<!-- CSS only -->
<style>
  .image-preview,
    #callback-preview {
      height: 100px !important;
  }
</style>

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.service.index') }}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="fas fa-arrow-left"></i> Back</a>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        
        <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('admin.service.update', $service->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-header">
                <h4>Edit Service Page</h4>
              </div>
              <div class="card-body">
                <div class="form-group row mb-4 color-one">
                  @php
                      $services = \App\Models\ServiceList::get();
                  @endphp
                  <div class="col-3 mb-4">
                      <label class="">Services<span class="text-danger">*</span></label>
                      <select id="service-dropdown" name="service_slug" class="form-control col">
                          <option value="">Select Service</option>
                          @foreach ($services as $item)
                              <option value="{{ $item->id }}" {{ $service->service_slug == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('service_slug'))
                          <span class="text-danger">{{ $errors->first('service_slug') }}</span>
                      @endif
                  </div>

                  <div class="col-3 mb-4">
                      <label class="">Sub Services<span class="text-danger">*</span></label>
                      <select id="sub-service-dropdown" name="sub_service_slug" class="form-control col">
                          <option value="">Select Sub Service</option>
                          <!-- Populate with existing sub services if any -->
                          @foreach ($sub_services as $sub_service)
                              <option value="{{ $sub_service->id }}" {{ $service->sub_service_slug == $sub_service->id ? 'selected' : '' }}>{{ $sub_service->name }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('sub_service_slug'))
                          <span class="text-danger">{{ $errors->first('sub_service_slug') }}</span>
                      @endif
                  </div>

                  <div class="col-3 mb-4">
                      <label class="">Sub Sub Services<span class="text-danger">*</span></label>
                      <select id="sub-sub-service-dropdown" name="sub_sub_service_slug" class="form-control col">
                          <option value="">Select Sub Sub Service</option>
                          <!-- Populate with existing sub sub services if any -->
                          @foreach ($sub_sub_services as $sub_sub_service)
                              <option value="{{ $sub_sub_service->id }}" {{ $service->sub_sub_service_slug == $sub_sub_service->id ? 'selected' : '' }}>{{ $sub_sub_service->name }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('sub_sub_service_slug'))
                          <span class="text-danger">{{ $errors->first('sub_sub_service_slug') }}</span>
                      @endif
                  </div>

                  <div class="col-3 mb-4">
                    <label class="">Page URL<span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control col" value="{{ old('slug', $service->slug) }}">
                    @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                  </div>
                  <div class="col-6 mb-4">
                    <label class="">Meta Title<span class="text-danger">*</span></label>
                    <input type="text" name="meta_title" class="form-control col" value="{{ old('meta_title', $service->meta_title) }}">
                    @if ($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                  </div>

                  <div class="col-6 mb-4">
                    <label class="">Meta Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="" name="meta_description">{{ old('meta_description', $service->meta_description) }}</textarea>
                    @if ($errors->has('meta_description'))
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="">Meta Keywords</label>
                    <textarea class="form-control" id="" name="meta_keywords">{{ old('meta_keywords', $service->meta_keywords) }}</textarea>
                    @if ($errors->has('meta_keywords'))
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    @endif
                  </div>

                  <div class="col-6 mb-4">
                    <label class="">Banner Title<span class="text-danger">*</span></label>
                    <input type="text" name="banner_title" class="form-control col" value="{{ old('banner_title', $service->banner_title) }}">
                    @if ($errors->has('banner_title'))
                    <span class="text-danger">{{ $errors->first('banner_title') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="">Banner Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="" name="banner_description">{{ old('banner_description', $service->banner_description) }}</textarea>
                    @if ($errors->has('banner_description'))
                    <span class="text-danger">{{ $errors->first('banner_description') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="">Banner Image<span class="text-danger">*</span></label>
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="banner_image" id="image-upload" />
                      @if ($errors->has('banner_image'))
                      <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                      @endif
                    </div>
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                  </div>

                  <div class="col-12">
                    <label class="">Body Content<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summernote_body_content" name="body_content">{{ old('body_content', $service->body_content) }}</textarea>
                    @if ($errors->has('body_content'))
                    <span class="text-danger">{{ $errors->first('body_content') }}</span>
                    @endif
                  </div>
                </div>

                <!-- service list section -->
                <hr>
                <div class="form-group row mb-4 color-two">

                  <div class="col-6">
                    <label class="">Service List Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="service_list_title" value="{{ old('service_list_title', $service->service_list_title) }}">
                    @error('service_list_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label class="">Service List Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summernote_service_list" name="service_list_description">{{ old('service_list_description', $service->service_list_description) }}</textarea>
                    @error('service_list_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                
                  <!-- additional fields -->
                  <div class="additional-fields ptb-50">
                    <!-- Existing Service List Items -->
                    @foreach(json_decode($service->service_list_contents) as $item)
                <div class="additional-field-template row mb-4 mx-auto">
                    <div class="col-3">
                        <label class="">Service List Item Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="service_list_item_image[]">
                        <!-- Existing Image -->
                        <img src="{{ asset('storage/' . $item->image) }}" height="50">
                    </div>
                    <div class="col-3">
                        <label class="">Service List Item Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="service_list_item_title[]" value="{{ $item->title }}">
                    </div>
                    <div class="col-3">
                        <label class="">Service List Item Description<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="service_list_item_description[]" value="{{ $item->description }}">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-danger remove-fields mt-4">Remove</button>
                    </div>
                </div>
            @endforeach
                    <!-- New Service List Items -->
                    <div class="additional-field-template row mb-4 mx-auto">
                      <div class="col-3">
                          <label class="">Service List Item Image<span class="text-danger">*</span></label>
                          <input type="file" class="form-control" name="service_list_item_image[]">
                      </div>
                      <div class="col-3">
                          <label class="">Service List Item Title<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="service_list_item_title[]">
                      </div>
                      <div class="col-3">
                          <label class="">Service List Item Description<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="service_list_item_description[]">
                      </div>
                      <div class="col-2">
                        <button type="button" class="btn btn-danger remove-fields mt-4">Remove</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <button type="button" class="btn btn-info add-fields mt-2">Add Service Item</button>
                  </div>
                </div>

                
                </div>

                
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('scripts')
<script>
  // Functionality for adding and removing service list items
  $(document).ready(function() {
    var serviceListItemTemplate = $('.additional-field-template').first().clone();
    var faqItemTemplate = $('.additional-field-template-faq').first().clone();

    $('.add-fields').on('click', function() {
      var newField = serviceListItemTemplate.clone();
      newField.find('input').val('');
      newField.find('textarea').val('');
      newField.appendTo('.additional-fields');
    });

    $('.add-fields-faq').on('click', function() {
      var newField = faqItemTemplate.clone();
      newField.find('input').val('');
      newField.find('textarea').val('');
      newField.appendTo('.additional-fields-faq');
    });

    $(document).on('click', '.remove-fields', function() {
      $(this).closest('.additional-field-template').remove();
    });

    $(document).on('click', '.remove-fields-faq', function() {
      $(this).closest('.additional-field-template-faq').remove();
    });
  });
</script>
@endsection
