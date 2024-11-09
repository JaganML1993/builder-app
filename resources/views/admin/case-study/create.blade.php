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
          <form method="POST" action="{{ route('admin.case-study.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Create Case Study Page</h4>
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
              </div>
              <hr>
              <div class="form-group row mb-4 color-three">

                <div class="col-6 mb-4">
                  <label class="">Client Title</label>
                  <input type="text" name="client_title" class="form-control col" value="{{ old('client_title') }}">
                  @if ($errors->has('client_title'))
                  <span class="text-danger">{{ $errors->first('client_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Client Description</label>
                  <textarea class="summernote-simple" id="" name="client_description">{{ old('client_description') }}</textarea>
                  @if ($errors->has('client_description'))
                  <span class="text-danger">{{ $errors->first('client_description') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Client Requirement Title</label>
                  <input type="text" name="client_req_title" class="form-control col" value="{{ old('client_req_title') }}">
                  @if ($errors->has('client_req_title'))
                  <span class="text-danger">{{ $errors->first('client_req_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Client Requirement Description</label>
                  <textarea class="summernote-simple" id="" name="client_req_desc">{{ old('client_req_desc') }}</textarea>
                  @if ($errors->has('client_req_desc'))
                  <span class="text-danger">{{ $errors->first('client_req_desc') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Business Title</label>
                  <input type="text" name="business_title" class="form-control col" value="{{ old('business_title') }}">
                  @if ($errors->has('business_title'))
                  <span class="text-danger">{{ $errors->first('business_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Business Description</label>
                  <textarea class="summernote-simple" id="" name="business_desc">{{ old('business_desc') }}</textarea>
                  @if ($errors->has('business_desc'))
                  <span class="text-danger">{{ $errors->first('business_desc') }}</span>
                  @endif
                </div>

                <div class="more-business-fields ptb-50 col-12">
                  <!-- Template for more-business fields -->
                  <div class="more-business-field-template row mb-4 mx-auto">
                    <div class="col-10">
                      <label class="">Business Items</label>
                      <input type="text" class="form-control" name="business_items[]">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-process" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary more-business-add">Add More</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 mb-4">
                  <label class="">Our Solution Title</label>
                  <input type="text" name="our_solution_title" class="form-control col" value="{{ old('our_solution_title') }}">
                  @if ($errors->has('our_solution_title'))
                  <span class="text-danger">{{ $errors->first('our_solution_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Our Solution Description</label>
                  <textarea class="form-control" id="" name="our_solution_desc">{{ old('our_solution_desc') }}</textarea>
                  @if ($errors->has('our_solution_desc'))
                  <span class="text-danger">{{ $errors->first('our_solution_desc') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">The Results Title</label>
                  <input type="text" name="the_results_title" class="form-control col" value="{{ old('the_results_title') }}">
                  @if ($errors->has('the_results_title'))
                  <span class="text-danger">{{ $errors->first('the_results_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">The Results Description</label>
                  <textarea class="form-control" id="" name="the_results_desc">{{ old('the_results_desc') }}</textarea>
                  @if ($errors->has('the_results_desc'))
                  <span class="text-danger">{{ $errors->first('the_results_desc') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Outsource Title</label>
                  <input type="text" name="out_source_title" class="form-control col" value="{{ old('out_source_title') }}">
                  @if ($errors->has('out_source_title'))
                  <span class="text-danger">{{ $errors->first('out_source_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Outsource Description</label>
                  <textarea class="summernote-simple" id="" name="out_source_desc">{{ old('out_source_desc') }}</textarea>
                  @if ($errors->has('out_source_desc'))
                  <span class="text-danger">{{ $errors->first('out_source_desc') }}</span>
                  @endif
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
                  <a class="btn btn-danger btn-pub" href="{{ url('admin/case-study/index') }}" style="color:white;">Close</a>
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
      $(this).closest(".additional-field-more").remove();
    });

    // Copy and clear data
    $(document).on("click", ".more-business-add", function() {
      var $template = $(".more-business-field-template").first();
      var $newField = $template.clone();

      $newField.removeClass("more-business-field-template").addClass("additional-field-more");

      // Clear input values in the new field
      $newField.find("input, textarea").val("");

      // Remove the Add More button from the new field and add the Remove button
      $newField.find(".add-more-container-process").remove();
      $newField.find(".col-2").append('<div><button type="button" class="btn btn-danger remove-field">Remove</button></div>');

      // Append the new field
      $(".more-business-fields").append($newField);
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

</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('textarea').forEach(function(textarea) {
          textarea.setAttribute('rows', '5');
      });
  });


</script>


@endsection