@extends('layouts.master')
<!-- CSS only -->
<style>
  .image-preview,
    #callback-preview {
      height: 100px !important;
  }
  textarea {
    min-height: 120px; /* Adjust the height as needed (approximately 5 rows) */
}
</style>

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
      <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="fas fa-arrow-left"></i>
      Back</a>
        
        <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-header">
                <h4>Create Article Page</h4>
              </div>
              <!-- @include('inc.messages') -->
              <div class="card-body">
                <div class="form-group row mb-4 d-flex justify-content-end">
                  <div class="col-sm-2 col-md-2 text-right">
                    <button class="btn btn-primary btn-pub" type="submit" name="action" value="Create Page" onclick="return confirm('Are you sure you want to Create Page?');">Create Page</button>
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
                    <label class="">Services</label>
                    <select id="service-dropdown" name="service_slug" class="form-control col">
                        <option value="">Select Service</option>
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}" @selected(old('service_slug') == $item->id)>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('service_slug'))
                        <span class="text-danger">{{ $errors->first('service_slug') }}</span>
                    @endif
                </div>

                  <div class="col-4 mb-4">
                      <label class="">Sub Services</label>
                      <select id="sub-service-dropdown" name="sub_service_slug" class="form-control col">
                          <option value="">Select Sub Service</option>
                      </select>
                      @if ($errors->has('sub_service_slug'))
                          <span class="text-danger">{{ $errors->first('sub_service_slug') }}</span>
                      @endif
                  </div>

                  <div class="col-4 mb-4">
                      <label class="">Sub Sub Services</label>
                      <select id="sub-sub-service-dropdown" name="sub_sub_service_slug" class="form-control col">
                          <option value="">Select Sub Sub Service</option>
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

                  <div class="col-12 mb-4">
                    <label class="">Body Content<span class="text-danger">*</span></label>
                    <textarea class="summernote-simple" id="summernote_body_content" name="body_content">{{ old('body_content') }}</textarea>
                    @error('body_content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                </div>
                <hr>
                 
                <div class="form-group row mb-4 ptb-50 color-six">
                  <div class="col-12 mx-auto">
                    <h3>Reimage Section</h3>
                  </div>
                  <div class="col-6">
                    <label>Reimage Title</label>
                    <input type="text" class="form-control" name="reimage_title" value="{{ old('reimage_title', $search->reimage_title ?? '') }}">
                    @if ($errors->has('reimage_title'))
                    <span class="text-danger">{{ $errors->first('reimage_title') }}</span>
                    @endif
                  </div>
                  <div class="col-6">
                    <label>Reimage Description</label>
                    <textarea class="form-control" name="reimage_desc">{{ old('reimage_desc', $search->reimage_desc ?? '') }}</textarea>
                    @error('reimage_desc')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-12 mt-3">
                    <label>Reimage Para</label>
                    <input type="text" class="form-control" name="reimage_para" value="{{ old('reimage_para', $search->reimage_para ?? '') }}"></input>
                    @if ($errors->has('reimage_para'))
                    <span class="text-danger">{{ $errors->first('reimage_para') }}</span>
                    @endif
                  </div>
                  <div class="additional-reimage-fields ptb-50 col-12">
                    <!-- Template for additional reimage fields -->
                    <div class="additional-reimage-field-template row mb-4">
                      <div class="col-5">
                        <label>Reimage Item Title</label>
                        <input type="text" class="form-control" name="reimage_item_title[]">
                      </div>
                      <div class="col-5">
                        <label>Reimage Item Description</label>
                        <textarea class="form-control" name="reimage_item_description[]"></textarea>
                      </div>
                      <div class="col-2 pt-5">
                        <button type="button" class="btn btn-primary copy-and-clear-reimage">Add More</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-group row mb-4 ptb-50 color-six">
                  <div class="col-12 mx-auto">
                    <h3>Registration Section</h3>
                  </div>
                  <div class="col-6">
                    <label>Registration Title</label>
                    <input type="text" class="form-control" name="regis_title" value="{{ old('regis_title', $search->regis_title ?? '') }}">
                    @if ($errors->has('regis_title'))
                    <span class="text-danger">{{ $errors->first('regis_title') }}</span>
                    @endif
                  </div>
                  <div class="col-6">
                    <label>Registration Description</label>
                    <textarea class="form-control" name="regis_desc">{{ old('regis_desc', $search->regis_desc ?? '') }}</textarea>
                    @error('regis_desc')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="additional-regis-fields ptb-50 col-12">
                    <!-- Template for additional regis fields -->
                    <div class="additional-regis-field-template row mb-4">
                      <div class="col-5">
                        <label>Registration Item Title</label>
                        <input type="text" class="form-control" name="regis_item_title[]">
                      </div>
                      <div class="col-5">
                        <label>Registration Item Description</label>
                        <textarea class="form-control" name="regis_item_desc[]"></textarea>
                      </div>
                      <div class="col-2 pt-5">
                        <button type="button" class="btn btn-primary copy-and-clear-regis">Add More</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-group row mb-4 ptb-50 color-six">
                  <div class="col-12 mx-auto">
                    <h3>Digital Section</h3>
                  </div>
                  <div class="col-6">
                    <label>Digital Title</label>
                    <input type="text" class="form-control" name="digital_title" value="{{ old('digital_title', $search->digital_title ?? '') }}">
                    @if ($errors->has('digital_title'))
                    <span class="text-danger">{{ $errors->first('digital_title') }}</span>
                    @endif
                  </div>
                  <div class="col-6">
                    <label>Digital Description</label>
                    <textarea class="form-control" name="digital_desc">{{ old('digital_desc', $search->digital_desc ?? '') }}</textarea>
                    @error('digital_desc')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-12">
                    <label>Digital Para</label>
                    <input type="text" class="form-control" name="digital_para" value="{{ old('digital_para', $search->digital_para ?? '') }}"></input>
                    @if ($errors->has('digital_para'))
                    <span class="text-danger">{{ $errors->first('digital_para') }}</span>
                    @endif
                  </div>
                  <div class="additional-digital-fields ptb-50 col-12">
                    <!-- Template for additional digital fields -->
                    <div class="additional-digital-field-template row mb-4">
                      <div class="col-5">
                        <label>Digital Item Title</label>
                        <input type="text" class="form-control" name="digital_item_title[]">
                      </div>
                      <div class="col-5">
                        <label>Digital Item Description</label>
                        <textarea class="form-control" name="digital_item_desc[]"></textarea>
                      </div>
                      <div class="col-2 pt-5">
                        <button type="button" class="btn btn-primary copy-and-clear-digital">Add More</button>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <hr>
                                    
                 <div class="form-group row mb-4 ptb-50 color-six">
                  <div class="col-12 mx-auto">
                    <h3>Faq</h3>
                  </div>
                  <div class="col-12">
                    <label class="">Faq Main Title</label>
                    <input type="text" class="form-control" name="faq_main_title" value="{{ old('faq_main_title') }}">
                    
                  </div>
                    <div class="additional-additional-fields ptb-50 col-12">
                      <!-- Template for additional-additional fields -->
                      <div class="additional-additional-field-template row mb-4">
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
                          <button type="button" class="btn btn-primary copy-and-clear-additional">Add More</button>
                        </div>
                      </div>
                    </div>
    
                  </div>   
    

              {{-- Code Snippet --}}

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
                  <a class="btn btn-danger btn-pub" href="{{ url('admin/article/index') }}" style="color:white;">Close</a>
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
  

    // Remove field
    $(document).on("click", ".remove-field-reimage, .remove-field-regis, .remove-field-digital", function() {
        $(this).closest(".additional-field-reimage, .additional-field-regis, .additional-field-digital").remove();
    });

    // Copy and clear data for Reimage
    $(document).on("click", ".copy-and-clear-reimage", function() {
        var $template = $(".additional-reimage-field-template").first();
        var $newField = $template.clone();

        $newField.removeClass("additional-reimage-field-template").addClass("additional-field-reimage");
        $newField.find("input, textarea").val("");

        // Add Remove button
        $newField.find(".copy-and-clear-reimage").remove();
        $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-reimage">Remove</button>');

        $(".additional-reimage-fields").append($newField);
    });


     // Copy and clear data for Registration
     $(document).on("click", ".copy-and-clear-regis", function() {
        var $template = $(".additional-regis-field-template").first();
        var $newField = $template.clone();

        $newField.removeClass("additional-regis-field-template").addClass("additional-field-regis");
        $newField.find("input, textarea").val("");

        // Add Remove button
        $newField.find(".copy-and-clear-regis").remove();
        $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-regis">Remove</button>');

        $(".additional-regis-fields").append($newField);
    });
   
     // Copy and clear data for Digital
     $(document).on("click", ".copy-and-clear-digital", function() {
        var $template = $(".additional-digital-field-template").first();
        var $newField = $template.clone();

        $newField.removeClass("additional-digital-field-template").addClass("additional-field-digital");
        $newField.find("input, textarea").val("");

        // Add Remove button
        $newField.find(".copy-and-clear-digital").remove();
        $newField.find(".col-2").append('<button type="button" class="btn btn-danger remove-field-digital">Remove</button>');

        $(".additional-digital-fields").append($newField);
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