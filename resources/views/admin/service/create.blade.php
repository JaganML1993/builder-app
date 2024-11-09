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
  
  @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

@section('content')
<!-- Loader -->
<div class="loader" id="loader"></div>
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="fas fa-arrow-left"></i>
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
          <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data" onsubmit="showLoader();">
            @csrf
            <div class="card-header">
              <h4>Create Service Page</h4>
            </div>

            <!-- @include('inc.messages') --> 
            <div class="card-body">
              <div class="form-group row mb-4 d-flex justify-content-end">
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="publish" onclick="return confirm('Are you sure you want to Create Page?');">Create Page</button>
                </div>  
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="draft">Draft</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="save">Save</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-danger btn-pub" onclick="window.history.back();">Close</button>
                </div>
              </div>
              <div class="form-group row mb-4 color-one">
                @php
                $services = \App\Models\ServiceList::get();
                @endphp
                <div class="col-4 mb-4">
                  <label class="">Folders</label>
                  <select id="service-dropdown" name="service_slug" class="form-control col">
                    <option value="">Select Folder</option>
                    @foreach ($services as $item)
                    <option value="{{ $item->id }}" @selected(old('service_slug')==$item->id)>{{ $item->name }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('service_slug'))
                  <span class="text-danger">{{ $errors->first('service_slug') }}</span>
                  @endif
                </div>

                <div class="col-4 mb-4">
                  <label class="">Sub Folder</label>
                  <select id="sub-service-dropdown" name="sub_service_slug" class="form-control col">
                    <option value="">Select Sub Folder</option>
                  </select>
                  @if ($errors->has('sub_service_slug'))
                  <span class="text-danger">{{ $errors->first('sub_service_slug') }}</span>
                  @endif
                </div>

                <div class="col-4 mb-4">
                  <label class="">Sub Sub Folder</label>
                  <select id="sub-sub-service-dropdown" name="sub_sub_service_slug" class="form-control col">
                    <option value="">Select Sub Sub Folder</option>
                  </select>
                  @if ($errors->has('sub_sub_service_slug'))
                  <span class="text-danger">{{ $errors->first('sub_sub_service_slug') }}</span>
                  @endif
                </div>

                <input type="hidden" id="old-sub-service" value="{{ old('sub_service_slug', '') }}">
                <input type="hidden" id="old-sub-sub-service" value="{{ old('sub_sub_service_slug', '') }}">


                <div class="col-6 mb-4">
                  <label class="">Page Name<span class="text-danger">*</span></label>
                  <input type="text" name="slug" class="form-control col" value="{{ old('slug',$search->slug??'')}}" oninput="updateGeneratedURL()" id="url-input">
                  <p><code><span id="generated-url"></span></code></p>
                  @if ($errors->has('slug'))
                  <span class="text-danger">{{ $errors->first('slug') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Meta Title<span class="text-danger">*</span></label>
                  <input type="text" name="meta_title" class="form-control col" value="{{ old('meta_title',$search->meta_title??'')}}">
                  @if ($errors->has('meta_title'))
                  <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                  @endif
                </div>



                <div class="col-6 mb-4">
                  <label class="">Meta Description<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="" name="meta_description">{{ old('meta_description',$search->meta_description??'')}} </textarea>
                  @if ($errors->has('meta_description'))
                  <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                  @endif
                </div>

                <div class="col-6">
                  <label class="">Meta Keywords</label>
                  <textarea class="form-control" id="" name="meta_keywords">{{ old('meta_keywords',$search->meta_keywords??'')}} </textarea>
                  @if ($errors->has('meta_keywords'))
                  <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Banner Title<span class="text-danger">*</span></label>
                  <input type="text" name="banner_title" class="form-control col" value="{{ old('banner_title',$search->banner_title??'')}}">
                  @if ($errors->has('banner_title'))
                  <span class="text-danger">{{ $errors->first('banner_title') }}</span>
                  @endif
                </div>

                <div class="col-6">
                  <label class="">Banner Description<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="" name="banner_description">{{ old('banner_description',$search->banner_description??'')}} </textarea>
                  @if ($errors->has('banner_description'))
                  <span class="text-danger">{{ $errors->first('banner_description') }}</span>
                  @endif
                </div>

                <div class="col-6 mt-3">

                  <label class="c">Banner Image<span class="text-danger">*</span></label>
                  <div class="form-group">
                    <input type="file" class="form-control" name="banner_image">
                    @if ($errors->has('banner_image'))
                    <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                    @endif
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                  </div>


                </div>
                <div class="col-6 mt-3">

                  <label class="c">Featured Image<span class="text-danger">*</span></label>
                  <div class="form-group">
                    <input type="file" class="form-control" name="feature_image">
                    @if ($errors->has('feature_image'))
                    <span class="text-danger">{{ $errors->first('feature_image') }}</span>
                    @endif
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                  </div>


                </div>

                <div class="col-12">
                  <label class="">Body Content<span class="text-danger">*</span></label>
                  <textarea class="summernote-simple" id="summernote_body_content" name="body_content">{{ old('body_content',$search->body_content??'')}} </textarea>
                  @if ($errors->has('body_content'))
                  <span class="text-danger">{{ $errors->first('body_content') }}</span>
                  @endif
                </div>

              </div>

              <hr>

              {{-- Our Answering Service --}}

              <div class="form-group row mb-4 color-two">

                <div class="col-12 mx-auto">
                  <h3>Our Answering Service Solutions</h3>
                </div>

                <div class="col-6">
                  <label class="">Service List Title</label>
                  <input type="text" class="form-control" name="service_list_title" value="{{ old('service_list_title', $search->service_list_title ?? '') }}">
                  @error('service_list_title')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label class="">Service List Description</label>
                  <textarea class="form-control" id="summernote_service_list" name="service_list_description">{{ old('service_list_description', $search->service_list_description ?? '') }}</textarea>
                  @error('service_list_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="additional-fields ptb-50">
                  <!-- Template for additional fields -->
                  <div class="additional-field-template row mb-4 mx-auto">
                    <div class="col-3">
                      <label class="">Service List Item Image</label>
                      <input type="file" class="form-control" name="service_list_item_image[]">
                    </div>
                    <div class="col-3">
                      <label class="">Service List Item Title</label>
                      <input type="text" class="form-control" name="service_list_item_title[]">
                    </div>
                    <div class="col-3">
                      <label class="">Service List Item Description</label>
                      <textarea class="form-control" name="service_list_item_description[]"></textarea>
                    </div>
                    <div class="col-3">
                      <label class="">Service List Item Link</label>
                      <input type="text" class="form-control" name="service_list_item_link[]">
                    </div>
                    <div class="col-2 mt-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary copy-and-clear">Add More</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <hr>

              {{-- More Services --}}

              <div class="form-group row mb-4 color-three">
                <div class="col-12 mx-auto">
                  <h3>More Services</h3>
                </div>
                <div class="col-12">
                  <label class="">More Services</label>
                  <input type="text" class="form-control" name="more_service_main_title">
                </div>
                <div class="more-service-fields ptb-50 col-12">
                  <!-- Template for more-service fields -->
                  <div class="more-service-field-template row mb-4 mx-auto">
                    <div class="col-5">
                      <label class="">More Service Items</label>
                      <input type="text" class="form-control" name="more_service_items[]">
                    </div>
                    <div class="col-5">
                      <label class="">More Service Items Link</label>
                      <input type="text" class="form-control" name="more_service_items_link[]">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-process" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary more-service-add">Add More</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <hr>

              {{-- Process Flow --}}

              <div class="form-group row mb-4 ptb-50 color-four">
                <div class="col-6">
                  <label class="">Process Flow Title</label>
                  <input type="text" class="form-control" name="process_flow_title" value="{{ old('process_flow_title', $search->process_flow_title ?? '') }}">
                  @if ($errors->has('process_flow_title'))
                  <span class="text-danger">{{ $errors->first('process_flow_title') }}</span>
                  @endif
                </div>

                <div class="col-6">
                  <label class="">Process Flow Description</label>
                  <textarea class="form-control" name="process_flow_description">{{ old('process_flow_description', $search->process_flow_description ?? '') }}</textarea>
                  @error('process_flow_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="additional-process-fields ptb-50">
                  <!-- Template for additional-process fields -->
                  <div class="additional-process-field-template row mb-4 mx-auto">
                    <div class="col-3">
                      <label class="">Process Flow Item logo</label>
                      <input type="text" class="form-control" name="process_flow_item_logo[]">
                    </div>
                    <div class="col-3">
                      <label class="">Process Flow Item Title</label>
                      <input type="text" class="form-control" name="process_flow_item_title[]">
                    </div>
                    <div class="col-4">
                      <label class="">Process Flow Item Description</label>
                      <textarea class="form-control" name="process_flow_item_description[]"></textarea>
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-process" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary copy-and-clear-process">Add More</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <hr>

              {{-- Industries we serve --}}

              <div class="form-group row mb-4 color-three">
                <div class="col-12 mx-auto">
                  <h3>Industries We Serve</h3>
                </div>
                <div class="col-12">
                  <label class="">Industries We Serve</label>
                  <input type="text" class="form-control" name="industry_main_title">
                </div>
                <div class="industry-fields ptb-50 col-12">
                  <!-- Template for industry fields -->
                  <div class="industry-field-template row mb-4 mx-auto">
                    <div class="col-10">
                      <label class="">Service Items</label>
                      <input type="text" class="form-control" name="industry_items[]">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-process" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary industry-add">Add More</button>
                      </div>
                    </div>
                  </div>
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
                  <input type="text" class="form-control" name="why_choose_title" value="{{ old('why_choose_title', $search->why_choose_title ?? '') }}">
                  @if ($errors->has('why_choose_title'))
                  <span class="text-danger">{{ $errors->first('why_choose_title') }}</span>
                  @endif
                </div>

                <div class="col-6">
                  <label class="">Why Choose Description</label>
                  <textarea class="form-control" name="why_choose_description">{{ old('why_choose_description', $search->why_choose_description ?? '') }}</textarea>
                  @error('why_choose_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <!-- additional fields -->
                <div class="additional-why-choose-fields ptb-50 col-12">
                  <!-- Template for additional-why-choose fields -->
                  <div class="additional-why-choose-field-template row mb-4">
                    <div class="col-3">
                      <label class="">Why Choose Item Title</label>
                      <input type="text" class="form-control" name="why_choose_item_title[]">
                    </div>
                    <div class="col-4">
                      <label class="">Why Choose Item Description</label>
                      <textarea class="form-control" name="why_choose_item_description[]"></textarea>
                    </div>
                    <div class="col-3">
                      <label class="">Why Choose Item Link</label>
                      <input type="text" class="form-control" name="why_choose_item_link[]">
                    </div>
                    <!-- This div will only contain the Add More button initially -->
                    <div class="col-2 pt-5" style="">
                      <button type="button" class="btn btn-primary copy-and-clear-why-choose">Add More</button>
                    </div>
                  </div>
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
                  <input type="text" class="form-control" name="article_main_title">
                </div>
                <div class="additional-article-fields ptb-50 col-12">

                  <div class="additional-article-field-template row mb-4">
                    <div class="col-3">
                      <label class="">Article Item Image</label>
                      <input type="file" class="form-control art-img" name="article_item_image[]">
                    </div>
                    <div class="col-4">
                      <label class="">Article Item Description</label>
                      <textarea class="form-control" name="article_item_description[]"></textarea>
                    </div>
                    <div class="col-3">
                      <label class="">Article Item Link</label>
                      <input type="link" class="form-control art-img" name="article_item_link[]">
                    </div>
                    <!-- This div will only contain the Add More button initially -->
                    <div class="col-2 pt-5" style="">
                      <button type="button" class="btn btn-primary copy-and-clear-article">Add More</button>
                    </div>
                  </div>
                </div>
              </div>

              <hr>

              {{-- Additional Serices --}}

              <div class="form-group row mb-4 color-eight">
                <div class="col-12 mx-auto">
                  <h3>Additional Services</h3>
                </div>
                <div class="col-12">
                  <label class="">Additional Main Title</label>
                  <input type="text" class="form-control" name="additional_title">
                </div>

                <div class="additional-additional-fields ptb-50 col-12">
                  <!-- Template for additional-additional fields -->
                  <div class="additional-additional-field-template row mb-4">
                    <div class="col-3">
                      <label class="">Additional Services Item Title</label>
                      <input type="text" class="form-control" name="additional_services_item_title[]">
                    </div>
                    <div class="col-4">
                      <label class="">Additional Services Item Description</label>
                      <textarea class="form-control" name="additional_services_item_description[]"></textarea>
                    </div>
                    <div class="col-3">
                      <label class="">Additional Services Item Link</label>
                      <input type="text" class="form-control" name="additional_services_item_link[]">
                    </div>
                    <!-- This div will only contain the Add More button initially -->
                    <div class="col-2 pt-5" style="">
                      <button type="button" class="btn btn-primary copy-and-clear-additional">Add More</button>
                    </div>
                  </div>
                </div>

              </div>

              <hr>

              {{-- Technologies we Use --}}

              <div class="form-group row mb-4 color-five">
                <div class="col-12 mx-auto">
                  <h3>Technologies We Use</h3>
                </div>
                <div class="col-12">
                  <label class="">Technologies Main Title</label>
                  <input type="text" class="form-control" name="tech_title">
                </div>
                <div class="col-12">
                  <label class="c">Technologies We Use</label>
                  <div class="form-group">
                    <input type="file" class="form-control" name="tech_images[]" id="tech-images-input" multiple>
                    @if ($errors->has('tech_images'))
                    <span class="text-danger">{{ $errors->first('tech_images') }}</span>
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
                  <input type="text" class="form-control" name="client_main_title">
                </div>
                <div class="col-6">
                  <label class="">Client Main Title Link</label>
                  <input type="text" class="form-control" name="client_title_link">
                </div>
                <div class="additional-client-fields ptb-50">
                  <!-- Template for additional-client fields -->
                  <div class="additional-client-field-template row mb-4 mx-auto">
                    <div class="col-5">
                      <label class="">Client Title</label>
                      <input type="text" class="form-control" name="client_success_title[]">
                    </div>
                    <div class="col-5">
                      <label class="">Client Title Link</label>
                      <input type="text" class="form-control" name="client_success_title_link[]">
                    </div>

                    <div class="col-5 mt-3">
                      <label class="">Client Description</label>
                      <input type="text" class="form-control" name="client_success_description[]">
                    </div>
                    <div class="col-5 mt-3">
                      <label class="">Client Link</label>
                      <input type="text" class="form-control" name="client_success_link[]"></input>
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-client" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary copy-and-clear-client">Add More</button>
                      </div>
                    </div>
                  </div>
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
                  <input type="text" class="form-control" name="testimonial_main_title">
                </div>
                <div class="col-6">
                  <label class="">Testimonials Main Title Link</label>
                  <input type="text" class="form-control" name="testimonial_title_link">
                </div>
                {{-- <div class="col-6">
              <label class="">Testimonial Title</label>
              <textarea class="form-control" name="testimonial_title">{{ old('testimonial_title') }}</textarea>
                @if ($errors->has('testimonial_title'))
                <span class="text-danger">{{ $errors->first('testimonial_title') }}</span>
                @endif
              </div> --}}

              <div class="col-6 mt-3">
                <label class="">Testimonial Description</label>
                <textarea class="form-control" name="testimonial_description">{{ old('testimonial_description') }}</textarea>
                @error('testimonial_description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-6 mt-3">
                <label class="">Author Name</label>
                <input type="text" class="form-control" name="testimonial_author" value="{{ old('testimonial_author', $search->testimonial_author ?? '') }}">
                @if ($errors->has('testimonial_author'))
                <span class="text-danger">{{ $errors->first('testimonial_author') }}</span>
                @endif
              </div>



              <div class="col-6 mt-3">
                <label class="">Testimonial Link</label>
                <input type="text" class="form-control" name="testimonial_link" value="{{ old('testimonial_link', $search->testimonial_link ?? '') }}">
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
                <input type="text" class="form-control" name="outsource_title" value="{{ old('outsource_title') }}">

              </div>

              <div class="col-6">
                <label class="">Outsource Description</label>
                <textarea class="form-control" name="outsource_description">{{ old('outsource_description') }}</textarea>
              </div>
              <div class="col-12 mt-3">
                <label class="">Outsource Description Para</label>
                <textarea class="form-control" name="outsource_para">{{ old('outsource_para') }}</textarea>
              </div>

              <div class="outsource-fields ptb-50 col-12">
                <!-- Template for outsource fields -->
                <div class="outsource-field-template row mb-4 mx-auto">
                  <div class="col-10">
                    <label class="">Outsource Items</label>
                    <input type="text" class="form-control" name="outsource_dynamic[]">
                  </div>
                  <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                    <!-- This div will only contain the Add More button initially -->
                    <div class="add-more-container-process" style="padding-left: 10px;">
                      <button type="button" class="btn btn-primary outsource-add">Add More</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <hr>

            {{-- Faq --}}

            <div class="form-group row mb-4 ptb-50 color-four">

              <div class="col-12 mx-auto">
                <h3>Faq</h3>
              </div>
              <div class="col-12">
                <label class="">Faq Main Title</label>
                <input type="text" class="form-control" name="faq_main_title" value="{{ old('faq_main_title') }}">

              </div>

              <div class="additional-faq-fields ptb-50 col-12">
                <!-- Template for additional-additional fields -->
                <div class="additional-faq-field-template row mb-4">
                  <div class="col-5">
                    <label class="">Faq Title</label>
                    <input type="text" class="form-control" name="faq_title[]">
                  </div>
                  <div class="col-5">
                    <label class="">Faq Description</label>
                    <textarea class="form-control" name="faq_description[]"></textarea>
                  </div>
                  <!-- This div will only contain the Add More button initially -->
                  <div class="col-2 pt-5" style="">
                    <button type="button" class="btn btn-primary copy-and-clear-faq">Add More</button>
                  </div>
                </div>
              </div>


            </div>

            {{-- Technologies we Use --}}

            <div class="form-group row mb-4 color-five">
              <div class="col-12 mx-auto">
                <h3>Schema Code Snippet</h3>
              </div>
              <div class="col-12">
                <label class="">Schema Code Snippet</label>
                <textarea class="summernote-simple" id="" name="code_snippet">{{ old('code_snippet') }}</textarea>
              </div>              
            </div>

            <div class="form-group row mb-4 justify-content-end">
              <div class="col-sm-2 col-md-2 text-right">
                <button class="btn btn-primary btn-pub" type="submit" name="action" value="publish" onclick="return confirm('Are you sure you want to Create Page?');">Create Page</button>
              </div>  
              <div class="col-sm-2 col-md-2 text-right">
                <button class="btn btn-primary btn-pub" type="submit" name="action" value="draft">Draft</button>
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
  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field", function() {
      $(this).closest(".additional-field").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear", function() {
      var $template = $(".additional-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-field-template").addClass("additional-field");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container").remove();
      $newField.find(".col-2").append('<div><button type="button" class="btn btn-danger remove-field">Remove</button></div>');

      // Append the new field
      $(".additional-fields").append($newField);
    });
  });




  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field-process", function() {
      $(this).closest(".additional-field-process").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-process", function() {
      var $template = $(".additional-process-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-process-field-template").addClass("additional-field-process");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button container from the new field and add the Remove button
      $newField.find(".add-more-container-process").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-process">Remove</button>');

      // Append the new field
      $(".additional-process-fields").append($newField);
    });
  });

  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field-client", function() {
      $(this).closest(".additional-field-client").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-client", function() {
      var $template = $(".additional-client-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-client-field-template").addClass("additional-field-client");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button container from the new field and add the Remove button
      $newField.find(".add-more-container-client").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-client">Remove</button>');

      // Append the new field
      $(".additional-client-fields").append($newField);
    });
  });




  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field-why-choose", function() {
      $(this).closest(".additional-field-why-choose").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-why-choose", function() {
      var $template = $(".additional-why-choose-field-template").first();
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
    // Remove field
    $(document).on("click", ".remove-field-article", function() {
      $(this).closest(".additional-field-article").remove();
    });

    // Copy and clear data
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
      $(this).closest(".additional-field-additional").remove();
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
    $(document).on("click", ".remove-field-faq", function() {
      $(this).closest(".additional-field-faq").remove();
    });

    // Copy and clear data
    $(document).on("click", ".copy-and-clear-faq", function() {
      var $template = $(".additional-faq-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("additional-faq-field-template").addClass("additional-field-faq");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".copy-and-clear-faq").remove();
      $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-faq">Remove</button>');

      // Append the new field
      $(".additional-faq-fields").append($newField);
    });
  });



  $(document).ready(function() {
    var oldSubService = $('#old-sub-service').val();
    var oldSubSubService = $('#old-sub-sub-service').val();

    $('#service-dropdown').on('change', function() {
      var serviceId = this.value;
      $("#sub-service-dropdown").html('<option value="">Select Sub Folder</option>');
      $("#sub-sub-service-dropdown").html('<option value="">Select Sub Sub Folder</option>');
      $.ajax({
        url: '/admin/public/get-subservices/' + serviceId,
        type: 'GET',
        success: function(result) {
          $.each(result, function(key, value) {
            $('#sub-service-dropdown').append('<option value="' + value.slug + '">' + value.name + '</option>');
          });
          // Set the old sub-service value if it exists
          if (oldSubService) {
            $('#sub-service-dropdown').val(oldSubService).trigger('change');
            oldSubService = ''; // Clear the old value after setting
          }
          updateGeneratedURL();
        }
      });
    });

    $('#sub-service-dropdown').on('change', function() {
      var subServiceId = this.value;
      $("#sub-sub-service-dropdown").html('<option value="">Select Sub Sub Folder</option>');
      $.ajax({
        url: '/admin/public/get-subsubservices/' + subServiceId,
        type: 'GET',
        success: function(result) {
          $.each(result, function(key, value) {
            $('#sub-sub-service-dropdown').append('<option value="' + value.slug + '">' + value.name + '</option>');
          });
          // Set the old sub-sub-service value if it exists
          if (oldSubSubService) {
            $('#sub-sub-service-dropdown').val(oldSubSubService);
            oldSubSubService = ''; // Clear the old value after setting
          }
          updateGeneratedURL();
        }
      });
    });

    $('#sub-sub-service-dropdown').on('change', updateGeneratedURL);
    $('#url-input').on('input', updateGeneratedURL);

    // Trigger change event on page load if there are old values
    if ($('#service-dropdown').val()) {
      $('#service-dropdown').trigger('change');
    }
  });

  function updateGeneratedURL() {
    const folderValue = $('#service-dropdown option:selected').text();
    const subFolderValue = $('#sub-service-dropdown option:selected').text();
    const subSubFolderValue = $('#sub-sub-service-dropdown option:selected').text();
    let urlValue = $('#url-input').val();
    if(urlValue != ''){
      urlValue = urlValue + '.php';
    }

    // Filter out default values
    const parts = [];
    if (folderValue && folderValue !== 'Select Folder') parts.push(folderValue);
    if (subFolderValue && subFolderValue !== 'Select Sub Folder') parts.push(subFolderValue);
    if (subSubFolderValue && subSubFolderValue !== 'Select Sub Sub Folder') parts.push(subSubFolderValue);
    if (urlValue) parts.push(urlValue);

    const fullURL = parts.join('/');

    const slug = fullURL.toLowerCase().replace(/ /g, '-');

    $('#generated-url').text(slug);
  }



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




  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field", function() {
      $(this).closest(".additional-field-more").remove();
    });

    // Copy and clear data
    $(document).on("click", ".more-service-add", function() {
      var $template = $(".more-service-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("more-service-field-template").addClass("additional-field-more");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container-process").remove();
      $newField.find(".col-2").append('<div><button type="button" class="btn btn-danger remove-field">Remove</button></div>');

      // Append the new field
      $(".more-service-fields").append($newField);
    });
  });

  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field", function() {
      $(this).closest(".additional-field-more").remove();
    });

    // Copy and clear data
    $(document).on("click", ".industry-add", function() {
      var $template = $(".industry-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("industry-field-template").addClass("additional-field-more");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container-process").remove();
      $newField.find(".col-2").append('<div><button type="button" class="btn btn-danger remove-field">Remove</button></div>');

      // Append the new field
      $(".industry-fields").append($newField);
    });
  });

  $(document).ready(function() {
    // Remove field
    $(document).on("click", ".remove-field", function() {
      $(this).closest(".additional-field-more").remove();
    });

    // Copy and clear data
    $(document).on("click", ".outsource-add", function() {
      var $template = $(".outsource-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("outsource-field-template").addClass("additional-field-more");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container-process").remove();
      $newField.find(".col-2").append('<div><button type="button" class="btn btn-danger remove-field">Remove</button></div>');

      // Append the new field
      $(".outsource-fields").append($newField);
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

<script>
  function showLoader() {
    document.getElementById('loader').style.display = 'block';
  }
</script>
@endsection