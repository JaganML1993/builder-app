@extends('layouts.master')
<!-- CSS only -->
<style>
  .image-preview,
  #callback-preview {
    height: 100px !important;
  }

  textarea {
    min-height: 120px;
    /* Adjust the height as needed (approximately 5 rows) */
  }
</style>

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.service.index') }}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;">
          <i class="fas fa-arrow-left"></i> Back
      </a>
      
      
        @if ($errors->any())
        <div class="alert alert-danger">More Services
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
              <div class="card-header">
                <h4>Edit Service Page</h4>
              </div>
              <!-- @include('inc.messages') -->
              <div class="card-body">
                <div class="form-group row mb-4 d-flex justify-content-end">
                  <div class="col-sm-2 col-md-2 text-right">
                    <button class="btn btn-primary btn-pub" type="submit" name="action" value="publish" onclick="if (confirm('Are you sure you want to publish the page?')) { this.closest('form').submit(); } return false;">Publish</button>
                  </div>
                  <div class="col-sm-2 col-md-2 text-right">
                    <button class="btn btn-primary btn-pub" type="submit" name="action" value="save">Save</button>
                  </div>
                  <div class="col-sm-2 col-md-2 text-right">
                    <a href="{{ route('admin.service.index') }}"  class="btn btn-danger btn-pub" type="submit" name="action" value="close">Close</a>
                  </div>
                </div>
                <input type="hidden" name="id" value="{{ $service->id }}" />
                <div class="form-group row mb-4 color-one">
                  @php
                  $services = \App\Models\ServiceList::get();
                  @endphp
                  <div class="col-4 mb-4">
                    <label class="">Folders</label>
                    <select id="service-dropdown" name="service_slug" class="form-control col">
                      <option value="">Select Folder </option>
                      @foreach ($services as $item)
                      <option value="{{ $item->id }}" {{ $service->service_slug == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('service_slug'))
                    <span class="text-danger">{{ $errors->first('service_slug') }}</span>
                    @endif
                  </div>

                  <!-- Sub Services dropdown -->
                  <div class="col-4 mb-4">
                    <label class="">Sub Services<span class="text-danger">*</span></label>
                    <select id="sub-service-dropdown" name="sub_service_slug" class="form-control col">
                      <option value="">Select Sub Service</option>
                      @foreach ($subServices as $subService)
                      <option value="{{ $subService->slug }}" {{ $service->sub_service_slug == $subService->slug ? 'selected' : '' }}>
                        {{ $subService->name }}
                      </option>
                      @endforeach
                    </select>
                    @error('sub_service_slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <!-- Sub Sub Services dropdown -->
                  <div class="col-4 mb-4">
                    <label class="">Sub Sub Services<span class="text-danger">*</span></label>
                    <select id="sub-sub-service-dropdown" name="sub_sub_service_slug" class="form-control col">
                      <option value="">Select Sub Sub Service</option>
                      @foreach ($subSubServices as $subSubService)
                      <option value="{{ $subSubService->slug }}" {{ $service->sub_sub_service_slug == $subSubService->slug ? 'selected' : '' }}>
                        {{ $subSubService->name }}
                      </option>
                      @endforeach
                    </select>
                    @error('sub_sub_service_slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <input type="hidden" id="old-sub-service" value="{{ old('sub_service_slug', '') }}">
                  <input type="hidden" id="old-sub-sub-service" value="{{ old('sub_sub_service_slug', '') }}">


                  <div class="col-6 mb-4">
                    <label class="">Page Name<span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control col" value="{{ $service->slug }}">
                    @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                    <p><code><span id="generated-url"></span></code></p>
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

                  <div class="col-6 mt-3">
                    <label class="">Banner Image<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-between">
                      <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="banner_image" id="image-upload" />
                      </div>
                      <div>
                        <img src="{{ asset('storage/banner_images/' . $service->banner_image) }}" class="img-fluid object-fit-cover" style="width:100px;height:100px" />

                      </div>


                      @if ($errors->has('banner_image'))
                      <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                      @endif
                    </div>
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                  </div>
                  <div class="col-6 mt-3">
                    <label class="">Featured Image<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-between">
                      <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="feature_image" id="image-upload" />
                      </div>
                      <div>
                        <img src="{{ asset('storage/feature_images/' . $service->feature_image) }}" class="img-fluid object-fit-cover" style="width:100px;height:100px" />

                      </div>


                      @if ($errors->has('feature_image'))
                      <span class="text-danger">{{ $errors->first('feature_image') }}</span>
                      @endif
                    </div>
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                  </div>

                  <div class="col-12">
                    <label class="">Body Content<span class="text-danger">*</span></label>
                    <textarea class="summernote-simple" id="summernote_body_content" name="body_content">{{ old('body_content', $service->body_content) }}</textarea>
                    @if ($errors->has('body_content'))
                    <span class="text-danger">{{ $errors->first('body_content') }}</span>
                    @endif
                  </div>

                </div>

                {{-- Our Answering Service --}}

                <hr>

                <div class="form-group row mb-4 color-two">

                  <div class="col-6">
                    <label class="">Service List Title</label>
                    <input type="text" class="form-control" name="service_list_title" value="{{ old('service_list_title', $service->service_list_title) }}">
                    @error('service_list_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label class="">Service List Description</label>
                    <textarea class="form-control" id="summernote_service_list" name="service_list_description">{{ old('service_list_description', $service->service_list_description) }}</textarea>
                    @error('service_list_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- additional fields -->

                  <div class="additional-fields ptb-50">
                    @foreach(json_decode($service->service_list_contents) as $index => $item)
                    @if($index == 0)
                    <div class="additional-field row mb-4 mx-auto">
                      <div class="col-3">
                        <label class="">Service List Item Image</label>
                        <input type="file" class="form-control" name="service_list_item_image[]" value="{{ $item->image }}" >
                        @isset($item->image)
                        <img src="{{ asset($item->image) }}" height="50">
                        @endisset
                        <input type="hidden" name="service_list_item_image_old[]" value="{{ $item->image }}">
                      </div>
                      <div class="col-3">
                        <label class="">Service List Item Title</label>
                        <input type="text" class="form-control" name="service_list_item_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-3">
                        <label class="">Service List Item Description</label>
                        <textarea class="form-control" name="service_list_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Service List Item Link</label>
                        <input type="text" class="form-control" name="service_list_item_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2 mt-3" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="add-more-container" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary copy-and-clear">Add More</button>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="additional-field row mb-4 mx-auto">
                      <div class="col-3">
                        <label class="">Service List Item Image</label>
                        <input type="file" class="form-control" name="service_list_item_image[]">
                        @isset($item->image)
                        <img src="{{ asset($item->image) }}" height="50">
                        @endisset
                        <input type="hidden" name="service_list_item_image_old[]" value="{{ $item->image }}">
                      </div>
                      <div class="col-3">
                        <label class="">Service List Item Title</label>
                        <input type="text" class="form-control" name="service_list_item_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-3">
                        <label class="">Service List Item Description</label>
                        <textarea class="form-control" name="service_list_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Service List Item Link</label>
                        <input type="text" class="form-control" name="service_list_item_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2">
                        <button type="button" class="btn btn-danger remove-field mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>




                  <!-- additional fields ends -->
                </div>

                <hr>

                {{-- More Services --}}

                <div class="form-group row mb-4 color-three">
                  <div class="col-12 mx-auto">
                    <h3>More Services</h3>
                  </div>
                  <div class="col-12">
                    <label class="">More Services</label>
                    <input type="text" class="form-control" name="more_service_main_title" value="{{ old('more_service_main_title', $service->more_service_main_title) }}">
                    @error('more_service_main_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="more-service-fields ptb-50 col-12">
                    @if(!empty($service->more_service_items)) 
                    @foreach(json_decode($service->more_service_items) as $index => $item)

                    @if($index == 0)
                    <div class="more-service-field row mb-4 mx-auto">
                      <div class="col-5">
                        <label class="">More Service Item</label>
                        <input type="text" class="form-control" name="more_service_items[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-5">
                        <label class="">More Service Item Link</label>
                        <input type="text" class="form-control" name="more_service_items_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="add-more-container" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary add-more-service">Add More</button>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="more-service-field row mb-4 mx-auto">
                      <div class="col-5">
                        <label class="">More Service Item</label>
                        <input type="text" class="form-control" name="more_service_items[]" value="{{ $item->title }}">
                      </div>
                       <div class="col-5">
                        <label class="">More Service Item Link</label>
                        <input type="text" class="form-control" name="more_service_items_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                        <button type="button" class="btn btn-danger remove-more-service mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <div class="more-service-field row mb-4 mx-auto">
                      <div class="col-5">
                        <label class="">More Service Item</label>
                        <input type="text" class="form-control" name="more_service_items[]">
                      </div>
                      <div class="col-5">
                        <label class="">More Service Item Link</label>
                        <input type="text" class="form-control" name="more_service_items_link[]">
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="add-more-container" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary add-more-service">Add More</button>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>

                {{-- Process Flow --}}

                <hr>
                <div class="form-group row mb-4 ptb-50 color-four">
                  <div class="col-6">
                    <label class="">Process Flow Title</label>
                    <input type="text" class="form-control" name="process_flow_title" value="{{ old('process_flow_title', $service->process_flow_title ?? '') }}">
                    @if ($errors->has('process_flow_title'))
                    <span class="text-danger">{{ $errors->first('process_flow_title') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="">Process Flow Description</label>
                    <textarea class="form-control" name="process_flow_description">{{ old('process_flow_description', $service->process_flow_description ?? '') }}</textarea>
                    @error('process_flow_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- additional fields for process flow-->
                  <div class="additional-process-fields ptb-50">
                    @foreach(json_decode($service->process_flow_contents) as $index => $item)
                    @if($index == 0)
                    <div class="additional-field-process row mb-4 mx-auto">
                      <div class="col-3">
                        <label class="">Process Flow Item Logo</label>
                        <input type="text" class="form-control" name="process_flow_item_logo[]" value="{{$item->logo}}">
                      </div>
                      <div class="col-3">
                        <label class="">Process Flow Item Title</label>
                        <input type="text" class="form-control" name="process_flow_item_title[]" value="{{$item->title}}">
                      </div>
                      <div class="col-4">
                        <label class="">Process Flow Item Description</label>
                        <textarea class="form-control" name="process_flow_item_description[]">{{$item->description}}</textarea>
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                        <div class="add-more-container-process" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary copy-and-clear-process">Add More</button>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="additional-field-process row mb-4 mx-auto">
                      <div class="col-3">
                        <label class="">Process Flow Item Logo</label>
                        <input type="text" class="form-control" name="process_flow_item_logo[]" value="{{$item->logo}}">
                      </div>
                      <div class="col-3">
                        <label class="">Process Flow Item Title</label>
                        <input type="text" class="form-control" name="process_flow_item_title[]" value="{{$item->title}}">
                      </div>
                      <div class="col-4">
                        <label class="">Process Flow Item Description</label>
                        <textarea class="form-control" name="process_flow_item_description[]">{{$item->description}}</textarea>
                      </div>
                      <div class="col-2">
                        <button type="button" class="btn btn-danger remove-field-process mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>



                  <!-- additional fields for process flow ends -->

                </div>

                {{-- Industries we serve --}}

                <hr>
                <div class="form-group row mb-4 color-three">
                  <div class="col-12 mx-auto">
                    <h3>Industries We Serve</h3>
                  </div>
                  <div class="col-12">
                    <label class="">Industries We Serve</label>
                    <input type="text" class="form-control" name="industry_main_title" value="{{ old('industry_main_title', $service->industry_main_title) }}">
                    @error('industry_main_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="industry-fields ptb-50 col-12">
                    @if(!empty($service->industry_items))
                    @foreach(json_decode($service->industry_items) as $index => $item)
                    @if($index == 0)
                    <div class="industry-field row mb-4 mx-auto">
                      <div class="col-10">
                        <label class="">Service Item</label>
                        <input type="text" class="form-control" name="industry_items[]" value="{{ $item }}">
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="add-more-container" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary add-more-industry">Add More</button>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="industry-field row mb-4 mx-auto">
                      <div class="col-10">
                        <label class="">Service Item</label>
                        <input type="text" class="form-control" name="industry_items[]" value="{{ $item }}">
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                        <button type="button" class="btn btn-danger remove-industry mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <div class="industry-field row mb-4 mx-auto">
                      <div class="col-10">
                        <label class="">Service Item</label>
                        <input type="text" class="form-control" name="industry_items[]">
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="add-more-container" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary add-more-industry">Add More</button>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
                <hr>


                {{-- Why Choose Us --}}

                <div class="form-group row mb-4 ptb-50 color-six">
                     <div class="col-12 mx-auto">
                  <h3>Wy Choose Us</h3>
                </div>
                  <div class="col-6">
                    <label class="">Why Choose Title</label>
                    <input type="text" class="form-control" name="why_choose_title" value="{{ old('why_choose_title', $service->why_choose_title ?? '') }}">
                    @if ($errors->has('why_choose_title'))
                    <span class="text-danger">{{ $errors->first('why_choose_title') }}</span>
                    @endif
                  </div>

                  <div class="col-6">
                    <label class="">Why Choose Description</label>
                    <textarea class="form-control" name="why_choose_description">{{ old('why_choose_description', $service->why_choose_description ?? '') }}</textarea>
                    @error('why_choose_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- additional fields for why choose us-->
                  <div class="additional-why-choose-fields ptb-50 col-12">
                    @foreach(json_decode($service->why_choose_contents) as $index => $item)
                    @if($index == 0)
                    <div class="additional-field-why-choose row mb-4">
                      <div class="col-3">
                        <label class="">Why Choose Item Title</label>
                        <input type="text" class="form-control" name="why_choose_item_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-4">
                        <label class="">Why Choose Item Description</label>
                        <textarea class="form-control" name="why_choose_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Why Choose Item LInk</label>
                        <input type="text" class="form-control" name="why_choose_item_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2 pt-5" style="">
                        <button type="button" class="btn btn-primary copy-and-clear-why-choose">Add More</button>
                      </div>
                    </div>
                    @else
                    <div class="additional-field-why-choose row mb-4">
                      <div class="col-3">
                        <label class="">Why Choose Item Title</label>
                        <input type="text" class="form-control" name="why_choose_item_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-4">
                        <label class="">Why Choose Item Description</label>
                        <textarea class="form-control" name="why_choose_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Why Choose Item Link</label>
                        <input type="text" class="form-control" name="why_choose_item_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2">
                        <button type="button" class="btn btn-danger remove-field-why-choose mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>




                  <!-- additional fields ends -->

                </div>

                <hr>

                {{-- Articles --}}

                <div class="form-group row mb-4 color-seven">

                  <div class="col-12 mx-auto">
                    <h3>Articles</h3>
                  </div>
                  <div class="col-12">
                    <label class="">Article Main Title</label>
                    <input type="text" class="form-control" name="article_main_title" value="{{ old('article_main_title', $service->article_main_title) }}">
                  </div>

                  <!-- additional fields for article-->

                  <div class="additional-article-fields ptb-50 col-12">
                    <!-- Template for additional-article fields -->

                    @foreach(json_decode($service->article_contents) as $index => $item)
                    @if($index == 0)
                    <div class="additional-article-field-template row mb-4">
                      <div class="col-3">
                        <label class="">Article Item Image</label>
                        <input type="file" class="form-control art-img" name="article_item_image[]"   >
                        @isset($item->image)
                        <img src="{{ asset($item->image) }}" height="50">
                        @endisset
                        <input type="hidden" name="article_item_image_old[]" value="{{ $item->image }}">
                      </div>
                      <div class="col-4">
                        <label class="">Article Item Description</label>
                        <textarea class="form-control" name="article_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Article Item Link</label>
                        <input type="link" class="form-control art-img" name="article_item_link[]" value="{{ $item->link }}">
                      </div>
                      <!-- This div will only contain the Add More button initially -->
                      <div class="col-2 pt-5" style="">
                        <button type="button" class="btn btn-primary copy-and-clear-article">Add More</button>
                      </div>
                    </div>
                    @else
                    <div class="additional-field-article row mb-4">
                      <div class="col-3">
                        <label class="">Article Item Image</label>
                        <input type="file" class="form-control art-img" name="article_item_image[]">
                        @isset($item->image)
                        <img src="{{ asset($item->image) }}" height="50">
                        @endisset
                        <input type="hidden" name="article_item_image_old[]" value="{{ $item->image }}">
                      </div>
                      <div class="col-4">
                        <label class="">Article Item Description</label>
                        <textarea class="form-control" name="article_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Article Item Link</label>
                        <input type="link" class="form-control art-img" name="article_item_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-3">
                        <button type="button" class="btn btn-danger remove-field-article mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>


                  <!-- additional fields ends -->

                </div>

                <hr>

                {{-- Additional Serices --}}

                <div class="form-group row mb-4 color-eight">

                  <div class="col-12 mx-auto">
                    <h3>Additional Services</h3>
                  </div>
                  <div class="col-12">
                    <label class="">Additional Main Title</label>
                    <input type="text" class="form-control" name="additional_title" value="{{ old('additional_title', $service->additional_title) }}">
                  </div>

                  <!-- additional fields -->
                  <div class="additional-additional-fields ptb-50 col-12">
                    <!-- Template for additional-additional fields -->

                    @foreach(json_decode($service->additional_services_contents) as $index => $item)
                    @if($index == 0)
                    <div class="additional-additional-field-template row mb-4">
                      <div class="col-3">
                        <label class="">Additional Services Item Title</label>
                        <input type="text" class="form-control" name="additional_services_item_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-4">
                        <label class="">Additional Services Item Description</label>
                        <textarea class="form-control" name="additional_services_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Additional Services Item Link</label>
                        <input type="text" class="form-control" name="additional_services_item_link[]" value="{{ $item->link }}">
                      </div>
                      <!-- This div will only contain the Add More button initially -->
                      <div class="col-2 pt-5" style="">
                        <button type="button" class="btn btn-primary copy-and-clear-additional">Add More</button>
                      </div>
                    </div>
                    @else
                    <div class="additional-field-additional row mb-4">
                      <div class="col-3">
                        <label class="">Additional Services Item Title</label>
                        <input type="text" class="form-control" name="additional_services_item_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-4">
                        <label class="">Additional Services Item Description</label>
                        <textarea class="form-control" name="additional_services_item_description[]">{{ $item->description }}</textarea>
                      </div>
                      <div class="col-3">
                        <label class="">Additional Services Item Link</label>
                        <input type="text" class="form-control" name="additional_services_item_link[]" value="{{ $item->link }}">
                      </div>
                      <div class="col-2">
                        <button type="button" class="btn btn-danger remove-field-additional mt-4">Remove</button>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>


                  <!-- additional fields ends -->



                </div>

                <hr>

                {{-- Technologies we Use --}}

                <div class="form-group row mb-4 color-five">
                  <div class="col-12 mx-auto">
                    <h3>Technologies We Use</h3>
                  </div>
                  <div class="col-12">
                    <label class="">Technologies Main Title</label>
                    <input type="text" class="form-control" name="tech_title" value="{{ old('tech_title', $service->tech_title) }}">
                  </div>
                  <div class="col-12">
                    <label class="c">Technologies We Use</label>
                    <div class="form-group">
                      <input type="file" class="form-control" name="tech_images[]" id="tech-images-input" multiple>
                      @if ($errors->has('tech_images'))
                      <span class="text-danger">{{ $errors->first('tech_images') }}</span>
                      @endif

                      @if(!empty($service->tech_images))
                      <div class="pt-2" id="existing-tech-images">
                        @foreach (json_decode($service->tech_images) as $item)
                        <div class="tech-image-item" style="display:inline-block; position:relative; margin-right:10px;" data-image="{{ $item }}">
                          <img src="{{ asset('storage/tech_images/' . $item) }}" style="width:100px;height:100px">
                          <button type="button" class="delete-tech-image" style="background:none; border:none; color:red; cursor:pointer; position:absolute; top:0; right:0;">
                            <i class="fa fa-times-circle"></i>
                          </button>
                        </div>
                        @endforeach
                      </div>
                      @endif
                      <p class="mt-2 text-danger">(Note:Select the Multiple Images)</p>
                      <p class="mt-1 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                    </div>
                    <div id="selected-files-container" class="mt-2"></div>
                  </div>
                </div>

                {{-- Client Success Stories --}}
                <hr>

                <div class="form-group row mb-4 color-five">
                  <div class="col-12 mx-auto">
                    <h3>Client Success Stories</h3>
                  </div>
                  <div class="col-6">
                    <label class="">Client Main Title</label>
                    <input type="text" class="form-control" name="client_main_title" value="{{ old('client_main_title', $service->client_main_title) }}">
                  </div>
                  <div class="col-6">
                    <label class="">Client Main Title Link</label>
                    <input type="text" class="form-control" name="client_title_link" value="{{ old('client_title_link', $service->client_title_link) }}">
                  </div>
                  <div class="additional-client-fields ptb-50">

                    @foreach(json_decode($service->client_success_stories) as $index=>$item)
                    @if($index == 0)
                    <div class="additional-client-field-template row mb-4 mx-auto">
                      <div class="col-3">
                        <label class="">Client Title</label>
                        <input type="text" class="form-control" name="client_success_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-3">
                        <label class="">Client Description</label>
                        <input type="text" class="form-control" name="client_success_description[]" value="{{ $item->description }}">
                      </div>
                      <div class="col-4">
                        <label class="">Client Link</label>
                        <textarea class="form-control" name="client_success_link[]">{{ $item->link }}</textarea>
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                        <!-- This div will only contain the Add More button initially -->
                        <div class="add-more-container-client" style="padding-left: 10px;">
                          <button type="button" class="btn btn-primary copy-and-clear-client">Add More</button>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="additional-client-field-template row mb-4 mx-auto">
                      <div class="col-3">
                        <label class="">Client Title</label>
                        <input type="text" class="form-control" name="client_success_title[]" value="{{ $item->title }}">
                      </div>
                      <div class="col-3">
                        <label class="">Client Description</label>
                        <input type="text" class="form-control" name="client_success_description[]" value="{{ $item->description }}">
                      </div>
                      <div class="col-4">
                        <label class="">Client Link</label>
                        <textarea class="form-control" name="client_success_link[]">{{ $item->link }}</textarea>
                      </div>
                      <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                        <div class="col-2">
                          <button type="button" class="btn btn-danger remove-field-client">Remove</button>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>

                <hr>

                {{-- Client Testimonials --}}

                <div class="form-group row mb-4 color-five">
                  <div class="col-12 mx-auto">
                    <h3>Client Testimonials</h3>
                  </div>
                  <div class="col-6">
                    <label class="">Testimonials Main Title</label>
                    <input type="text" class="form-control" name="testimonial_main_title" value="{{ old('testimonial_main_title', $service->testimonial_main_title) }}">
                    @error('testimonial_main_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-6">
                    <label class="">Testimonials Main Title Link</label>
                    <input type="text" class="form-control" name="testimonial_title_link" value="{{ old('testimonial_title_link', $service->testimonial_title_link) }}">
                    @error('testimonial_title_link')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  {{-- <div class="col-6">
                    <label class="">Testimonial Title</label>
                    <textarea class="form-control" name="testimonial_title">{{ old('testimonial_title', $service->testimonial_title) }}</textarea>
                  @if ($errors->has('testimonial_title'))
                  <span class="text-danger">{{ $errors->first('testimonial_title') }}</span>
                  @endif
                </div> --}}
                <div class="col-6 mt-3">
                  <label class="">Testimonial Description</label>
                  <textarea class="form-control" name="testimonial_description">{{ old('testimonial_description', $service->testimonial_description) }}</textarea>
                  @error('testimonial_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label class="">Author Name</label>
                  <input type="text" class="form-control" name="testimonial_author" value="{{ old('testimonial_author', $service->testimonial_author) }}">
                  @if ($errors->has('testimonial_author'))
                  <span class="text-danger">{{ $errors->first('testimonial_author') }}</span>
                  @endif
                </div>
                <div class="col-6 mt-3">
                  <label class="">Testimonial Link</label>
                  <input type="text" class="form-control" name="testimonial_link" value="{{ old('testimonial_link', $service->testimonial_link) }}">
                  @if ($errors->has('testimonial_link'))
                  <span class="text-danger">{{ $errors->first('testimonial_link') }}</span>
                  @endif
                </div>
              </div>
              <hr>

              {{-- Outsource --}}

              <div class="form-group row mb-4 ptb-50 color-four">
                <div class="col-12 mx-auto">
                  <h3>Outsource</h3>
                </div>
                <div class="col-6">
                  <label class="">Outsource Main Title</label>
                  <input type="text" class="form-control" name="outsource_title" value="{{ old('outsource_title', $service->outsource_title) }}">
                  @error('outsource_title')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="">Outsource Description</label>
                  <textarea class="form-control" name="outsource_description">{{ old('outsource_description', $service->outsource_description) }}</textarea>
                  @error('outsource_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-12 mt-3">
                  <label class="">Outsource Description Para</label>
                  <textarea class="form-control" name="outsource_para">{{ old('outsource_para', $service->outsource_para) }}</textarea>
                  @error('outsource_para')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="outsource-fields ptb-50 col-12">
                  @foreach(json_decode($service->outsource_dynamic) as $index => $item)
                  @if($index == 0)
                  <div class="outsource-field row mb-4 mx-auto">
                    <div class="col-10">
                      <label class="">Outsource Items</label>
                      <input type="text" class="form-control" name="outsource_dynamic[]" value="{{ $item }}">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                      <div class="add-more-container" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary outsource-add">Add More</button>
                      </div>
                    </div>
                  </div>
                  @else
                  <div class="outsource-field row mb-4 mx-auto">
                    <div class="col-10">
                      <label class="">Outsource Items</label>
                      <input type="text" class="form-control" name="outsource_dynamic[]" value="{{ $item }}">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: center;">
                      <button type="button" class="btn btn-danger remove-outsource mt-4">Remove</button>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
              <hr>




              <div class="form-group row mb-4 ptb-50 color-four">
                <div class="col-12 mx-auto">
                  <h3>Faq</h3>
                </div>
                <div class="col-12">
                  <label class="">Faq Main Title</label>
                  <input type="text" class="form-control" name="faq_main_title" value="{{ old('faq_main_title', $service->faq_main_title) }}">

                </div>


                <!-- additional fields for faq -->
                <div class="additional-faq-fields ptb-50 col-12">
                  <!-- Template for additional-faq fields -->

                  @foreach(json_decode($service->faqs) as $index => $item)
                  @if($index == 0)
                  <div class="additional-faq-field-template row mb-4">
                    <div class="col-5">
                      <label class="">FAQ Title</label>
                      <input type="text" class="form-control" name="faq_title[]" value="{{ $item->title }}">
                    </div>
                    <div class="col-5">
                      <label class="">FAQ Description</label>
                      <textarea class="form-control" name="faq_description[]">{{ $item->description }}</textarea>
                    </div>
                    <!-- This div will only contain the Add More button initially -->
                    <div class="col-2 pt-5" style="">
                      <button type="button" class="btn btn-primary copy-and-clear-faq">Add More</button>
                    </div>
                  </div>
                  @else
                  <div class="additional-faq-field-template row mb-4">
                    <div class="col-5">
                      <label class="">FAQ Title</label>
                      <input type="text" class="form-control" name="faq_title[]" value="{{ $item->title }}">
                    </div>
                    <div class="col-5">
                      <label class="">FAQ Description</label>
                      <textarea class="form-control" name="faq_description[]">{{ $item->description }}</textarea>
                    </div>
                    <div class="col-2">
                      <button type="button" class="btn btn-danger remove-field-faq">Remove</button>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>




                <!-- additional fields ends -->

              </div>


              {{-- Code Snippet --}}

              <div class="form-group row mb-4 color-five">
                <div class="col-12 mx-auto">
                  <h3>Schema Code Snippet</h3>
                </div>
                <div class="col-12">
                  <label class="">Schema Code Snippet</label>
                  <textarea class="summernote-simple" id="" name="code_snippet">{{ old('code_snippet', $service->code_snippet) }}</textarea>
                </div>
              </div>

              <div class="form-group row mb-4 justify-content-end">
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="publish" onclick="if (confirm('Are you sure you want to publish the page?')) { this.closest('form').submit(); } return false;">Publish</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" name="action" value="publish">Cancel</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="save">Save</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <a class="btn btn-danger btn-pub" href="{{ url('admin/service/index') }}" style="color:white;">Close</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  // Add More Service 
  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field", function() {
      $(this).closest(".row").remove();
    });

    // Add new field
    $(document).on("click", ".copy-and-clear", function() {
      var $template = $(".additional-field").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-field-template").addClass("additional-field");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");
      $newField.find("img").remove();

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container").remove();
      $newField.find(".col-2").append('<div><button type="button" class="btn btn-danger remove-field">Remove</button></div>');

      // Append the new field
      $(".additional-fields").append($newField);
    });
  });




  // Add More Process Flow 

  $(document).ready(function() {
    // Remove process field
    $(document).on("click", ".remove-field-process", function() {
      $(this).closest(".row").remove();
    });

    // Copy and clear data for process fields
    $(document).on("click", ".copy-and-clear-process", function() {
      var $template = $(".additional-field-process").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-process-field-template").addClass("additional-field-process");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container-process").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-process">Remove</button>');

      // Append the new field
      $(".additional-process-fields").append($newField);
    });
  });





  $(document).ready(function() {
    // Remove why choose field
    $(document).on("click", ".remove-field-why-choose", function() {
      $(this).closest(".row").remove();
    });

    // Copy and clear data for why choose fields
    $(document).on("click", ".copy-and-clear-why-choose", function() {
      var $template = $(".additional-field-why-choose").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-why-choose-field-template").addClass("additional-field-why-choose");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".copy-and-clear-why-choose").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-why-choose">Remove</button>');

      // Append the new field
      $(".additional-why-choose-fields").append($newField);
    });
  });





  $(document).ready(function() {
    // Remove article field
    $(document).on("click", ".remove-field-article", function() {
      $(this).closest(".row").remove(); // Updated selector
    });

    // Copy and clear data for article fields
    $(document).on("click", ".copy-and-clear-article", function() {
      var $template = $(".additional-article-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-article-field-template").addClass("additional-field-article");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".copy-and-clear-article").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-article">Remove</button>');

      // Append the new field
      $(".additional-article-fields").append($newField);
    });
  });




  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field-additional", function() {
      $(this).closest(".row").remove(); // Updated selector
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-additional", function() {
      var $template = $(".additional-additional-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-additional-field-template").addClass("additional-field-additional");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".copy-and-clear-additional").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-additional">Remove</button>');

      // Append the new field
      $(".additional-additional-fields").append($newField);
    });
  });

  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field-client", function() {
      $(this).closest(".additional-client-field-template").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-client", function() {
      var $template = $(".additional-client-field-template").first();
      var $newField = $template.clone();

      $newField.find("input, textarea").val("");

      // Remove the Add More button container from the new field and add the Remove button
      $newField.find(".add-more-container-client").remove();
      $newField.find(".col-2").html('<button type="button" class="btn btn-danger remove-field-client">Remove</button>');

      // Append the new field
      $(".additional-client-fields").append($newField);
    });
  });

  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field-faq", function() {
      $(this).closest(".additional-faq-field-template").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-faq", function() {
      var $template = $(".additional-faq-field-template").first();
      var $newField = $template.clone();

      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".copy-and-clear-faq").remove();
      $newField.find(".col-2").html('<button type="button" class="btn btn-danger remove-field-faq">Remove</button>');

      // Append the new field
      $(".additional-faq-fields").append($newField);
    });
  });


  $(document).ready(function() {
    $('#service-dropdown').on('change', function() {
      var serviceId = this.value;
      $("#sub-service-dropdown").html('');
      $("#sub-sub-service-dropdown").html('<option value="">Select Sub Sub Service</option>');
      $.ajax({
        url: '/admin/public/get-subservices/' + serviceId,
        type: 'GET',
        success: function(result) {
          $('#sub-service-dropdown').html('<option value="">Select Sub Service</option>');
          $.each(result, function(key, value) {
            $("#sub-service-dropdown").append('<option value="' + value.slug + '">' + value.name + '</option>');
          });
        }
      });
    });

    $('#sub-service-dropdown').on('change', function() {
      var subServiceId = this.value;
      $("#sub-sub-service-dropdown").html('');
      $.ajax({
        url: '/admin/public/get-subsubservices/' + subServiceId,
        type: 'GET',
        success: function(result) {
          $('#sub-sub-service-dropdown').html('<option value="">Select Sub Sub Service</option>');
          $.each(result, function(key, value) {
            $("#sub-sub-service-dropdown").append('<option value="' + value.slug + '">' + value.name + '</option>');
          });
        }
      });
    });
  });
  // $(document).ready(function() {
  //   var oldSubService = $('#old-sub-service').val();
  //   var oldSubSubService = $('#old-sub-sub-service').val();

  //   $('#service-dropdown').on('change', function() {
  //     var serviceId = this.value;
  //     $("#sub-service-dropdown").html('');
  //     $("#sub-sub-service-dropdown").html('<option value="">Select Sub Sub Service</option>');
  //     $.ajax({
  //       url: '/get-subservices/' + serviceId,
  //       type: 'GET',
  //       success: function(result) {
  //         $('#sub-service-dropdown').html('<option value="">Select Sub Service</option>');
  //         $.each(result, function(key, value) {
  //           $('#sub-service-dropdown').append('<option value="' + value.slug + '">' + value.name + '</option>');
  //         });
  //         // Set the old sub-service value if it exists
  //         if (oldSubService) {
  //           $('#sub-service-dropdown').val(oldSubService).trigger('change');
  //           oldSubService = ''; // Clear the old value after setting
  //         }
  //       }
  //     });
  //   });

  //   $('#sub-service-dropdown').on('change', function() {
  //     var subServiceId = this.value;
  //     $("#sub-sub-service-dropdown").html('');
  //     $.ajax({
  //       url: '/get-subsubservices/' + subServiceId,
  //       type: 'GET',
  //       success: function(result) {
  //         $('#sub-sub-service-dropdown').html('<option value="">Select Sub Sub Service</option>');
  //         $.each(result, function(key, value) {
  //           $('#sub-sub-service-dropdown').append('<option value="' + value.slug + '">' + value.name + '</option>');
  //         });
  //         // Set the old sub-sub-service value if it exists
  //         if (oldSubSubService) {
  //           $('#sub-sub-service-dropdown').val(oldSubSubService);
  //           oldSubSubService = ''; // Clear the old value after setting
  //         }
  //       }
  //     });
  //   });

  //   // Trigger change event on page load if there are old values
  //   if ($('#service-dropdown').val()) {
  //     $('#service-dropdown').trigger('change');
  //   }
  // });

  $(document).ready(function() {
    $('#tech-images-input').on('change', function(event) {
      var input = event.target;

      if (input.files && input.files.length > 0) {
        var filesList = '';

        // Iterate through the selected files and get their names
        for (var i = 0; i < input.files.length; i++) {
          filesList += input.files[i].name + '<br>';
        }

        // Display the list of selected files in the container
        $('#selected-files-container').html('<p>Selected Files:</p>' + filesList);
      } else {
        // If no files selected, clear the container
        $('#selected-files-container').html('');
      }
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.add-more-service').addEventListener('click', function() {
      let template = document.querySelector('.more-service-field.row').cloneNode(true);
      template.querySelector('input').value = '';
      template.querySelector('.add-more-container').innerHTML = '<button type="button" class="btn btn-danger remove-more-service mt-4">Remove</button>';
      document.querySelector('.more-service-fields').appendChild(template);

      document.querySelectorAll('.remove-more-service').forEach(button => {
        button.addEventListener('click', function() {
          this.closest('.more-service-field').remove();
        });
      });
    });

    document.querySelectorAll('.remove-more-service').forEach(button => {
      button.addEventListener('click', function() {
        this.closest('.more-service-field').remove();
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.add-more-industry').addEventListener('click', function() {
      let template = document.querySelector('.industry-field.row').cloneNode(true);
      template.querySelector('input').value = '';
      template.querySelector('.add-more-container').innerHTML = '<button type="button" class="btn btn-danger remove-industry mt-4">Remove</button>';
      document.querySelector('.industry-fields').appendChild(template);

      document.querySelectorAll('.remove-industry').forEach(button => {
        button.addEventListener('click', function() {
          this.closest('.industry-field').remove();
        });
      });
    });

    document.querySelectorAll('.remove-industry').forEach(button => {
      button.addEventListener('click', function() {
        this.closest('.industry-field').remove();
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.outsource-add').addEventListener('click', function() {
      let template = document.querySelector('.outsource-field.row').cloneNode(true);
      template.querySelector('input').value = '';
      template.querySelector('.add-more-container').innerHTML = '<button type="button" class="btn btn-danger remove-outsource mt-4">Remove</button>';
      document.querySelector('.outsource-fields').appendChild(template);

      document.querySelectorAll('.remove-outsource').forEach(button => {
        button.addEventListener('click', function() {
          this.closest('.outsource-field').remove();
        });
      });
    });

    document.querySelectorAll('.remove-outsource').forEach(button => {
      button.addEventListener('click', function() {
        this.closest('.outsource-field').remove();
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get references to the elements
    const serviceDropdown = document.getElementById('service-dropdown');
    const subServiceDropdown = document.getElementById('sub-service-dropdown');
    const subSubServiceDropdown = document.getElementById('sub-sub-service-dropdown');
    const pageNameInput = document.querySelector('input[name="slug"]');
    const generatedUrlSpan = document.getElementById('generated-url'); // Uncommented this line

    // Create a function to generate the slug
    function generateSlug() {
      const service = serviceDropdown.options[serviceDropdown.selectedIndex].text;
      const subService = subServiceDropdown.options[subServiceDropdown.selectedIndex].text;
      const subSubService = subSubServiceDropdown.options[subSubServiceDropdown.selectedIndex].text;
      const pageName = pageNameInput.value.trim();

      generatedUrlSpan.textContent = '';

      let slugComponents = [];

      // Exclude placeholder values when building the slug
      if (service !== 'Select Folder') {
        slugComponents.push(service);

        if (subService !== 'Select Sub Folder') {
          slugComponents.push(subService);

          if (subSubService !== 'Select Sub Sub Folder') {
            slugComponents.push(subSubService);
          }
        }
      }

      // Always push the page name if it's not empty
      if (pageName) {
        slugComponents.push(pageName);
      }

      const slug = slugComponents
        .map(s => s.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, ''))
        .filter(Boolean)
        .join('/');

      return slug + '.php';
    }

    // Function to update the generated URL span
    function updateGeneratedUrl() {
      const slug = generateSlug();
      generatedUrlSpan.textContent = slug; // Use pure JavaScript
      // $('#generated-url').text(slug); // Alternatively, use jQuery
    }

    // Add event listeners to update the slug and generated URL whenever an input changes
    serviceDropdown.addEventListener('change', updateGeneratedUrl);
    subServiceDropdown.addEventListener('change', updateGeneratedUrl);
    subSubServiceDropdown.addEventListener('change', updateGeneratedUrl);
    pageNameInput.addEventListener('input', updateGeneratedUrl);

    // Set initial slug value if needed
    updateGeneratedUrl();
  });
</script>
<script>
$(document).ready(function() {
  $('.delete-tech-image').click(function() {
    var button = $(this);
    var image = button.closest('.tech-image-item').data('image');
    var serviceId = "{{ $service->id }}";
    var token = '{{ csrf_token() }}';

    console.log('Image:', image);
    console.log('Service ID:', serviceId);
    console.log('Token:', token);

    $.ajax({
      url: '/services/' + serviceId + '/tech-image/' + image,
      type: 'DELETE',
      data: {
        _token: token
      },
      success: function(response) {
        if (response.success) {
          console.log('Image deleted successfully');
          button.closest('.tech-image-item').remove();
        } else {
          alert('Failed to delete the image.');
        }
      },
      error: function(xhr, status, error) {
        console.log('AJAX error:', error);
        alert('An error occurred while deleting the image.');
      }
    });
  });
});

</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('textarea').forEach(function(textarea) {
      textarea.setAttribute('rows', '5');
    });
  });
</script>

@endsection