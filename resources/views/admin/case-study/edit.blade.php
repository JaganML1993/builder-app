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
          <form method="POST" action="{{ route('admin.case-study.update', $caseStudy->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Edit Case Study Page</h4>
            </div>
            <div class="card-body">
              <div class="form-group row mb-4 d-flex justify-content-end">
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="publish" onclick="return confirm('Are you sure you want to publish the page?');">Publish</button>
                </div>  
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="save">Save</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-danger btn-pub" onclick="window.history.back();" name="action" value="close">Close</button>
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
                    <option value="{{ $item->id }}" {{ $item->id == $caseStudy->service_slug ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('service_slug'))
                  <span class="text-danger">{{ $errors->first('service_slug') }}</span>
                  @endif
                </div>

                <!-- Sub Services dropdown -->
                <div class="col-4 mb-4">
                  <label class="">Sub Services</label>
                  <select id="sub-service-dropdown" name="sub_service_slug" class="form-control col">
                    <option value="">Select Sub Service</option>
                    @foreach ($subServices as $subService)
                    <option value="{{ $subService->slug }}" {{ $caseStudy->sub_service_slug == $subService->slug ? 'selected' : '' }}>
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
                  <label class="">Sub Sub Services</label>
                  <select id="sub-sub-service-dropdown" name="sub_sub_service_slug" class="form-control col">
                    <option value="">Select Sub Sub Service</option>
                    @foreach ($subSubServices as $subSubService)
                    <option value="{{ $subSubService->slug }}" {{ $caseStudy->sub_sub_service_slug == $subSubService->slug ? 'selected' : '' }}>
                      {{ $subSubService->name }}
                    </option>
                    @endforeach
                  </select>
                  @error('sub_sub_service_slug')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-6 mb-4">
                  <label class="">Page Name<span class="text-danger">*</span></label>
                  <input type="text" name="slug" class="form-control col" value="{{ old('slug', $caseStudy->slug) }}">
                  @if ($errors->has('slug'))
                  <span class="text-danger">{{ $errors->first('slug') }}</span>
                  @endif
                  <p><code><span id="generated-url"></span></code></p>
                </div>
                <div class="col-6 mb-4">
                  <label class="">Meta Title<span class="text-danger">*</span></label>
                  <input type="text" name="meta_title" class="form-control col" value="{{ old('meta_title', $caseStudy->meta_title) }}">
                  @if ($errors->has('meta_title'))
                  <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Meta Description<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="" name="meta_description">{{ old('meta_description', $caseStudy->meta_description) }}</textarea>
                  @if ($errors->has('meta_description'))
                  <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                  @endif
                </div>

                <div class="col-6">
                  <label class="">Meta Keywords</label>
                  <textarea class="form-control" id="" name="meta_keywords">{{ old('meta_keywords', $caseStudy->meta_keywords) }}</textarea>
                  @if ($errors->has('meta_keywords'))
                  <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Banner Title<span class="text-danger">*</span></label>
                  <input type="text" name="banner_title" class="form-control col" value="{{ old('banner_title', $caseStudy->banner_title) }}">
                  @if ($errors->has('banner_title'))
                  <span class="text-danger">{{ $errors->first('banner_title') }}</span>
                  @endif
                </div>

                <div class="col-6">
                  <label class="">Banner Image<span class="text-danger">*</span></label>

                  <div class="form-group">
                    <input type="file" class="form-control" name="banner_image">
                    @if ($caseStudy->banner_image)
                    <img src="{{ asset('storage/banner_images/' . $caseStudy->banner_image) }}" alt="Current Banner Image" class="mt-2" style="width: 150px;height:150px">
                    @endif
                    @if ($errors->has('banner_image'))
                    <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                    @endif
                    <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                  </div>

                </div>

                <div class="col-6 mt-3">
                  <label class="">Featured Image<span class="text-danger">*</span></label>
                  <div class="d-flex justify-content-between">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="feature_image" id="image-upload" />
                    </div>
                    <div>
                      <img src="{{ asset('storage/feature_images/' . $caseStudy->feature_image) }}" class="img-fluid object-fit-cover" style="width:100px;height:100px" />

                    </div>
                    
                   
                    @if ($errors->has('feature_image'))
                    <span class="text-danger">{{ $errors->first('feature_image') }}</span>
                    @endif
                  </div>
                  <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                </div>
              </div>

              <hr>
              <div class="form-group row mb-4 color-three">

                <div class="col-6 mb-4">
                  <label class="">Client Title</label>
                  <input type="text" name="client_title" class="form-control col" value="{{ old('client_title', $caseStudy->client_title) }}">
                  @if ($errors->has('client_title'))
                  <span class="text-danger">{{ $errors->first('client_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Client Description</label>
                  <textarea class="summernote-simple" id="" name="client_description">{{ old('client_description', $caseStudy->client_description) }}</textarea>
                  @if ($errors->has('client_description'))
                  <span class="text-danger">{{ $errors->first('client_description') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Client Requirement Title</label>
                  <input type="text" name="client_req_title" class="form-control col" value="{{ old('client_req_title', $caseStudy->client_req_title) }}">
                  @if ($errors->has('client_req_title'))
                  <span class="text-danger">{{ $errors->first('client_req_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Client Requirement Description</label>
                  <textarea class="summernote-simple" id="" name="client_req_desc">{{ old('client_req_desc', $caseStudy->client_req_desc) }}</textarea>
                  @if ($errors->has('client_req_desc'))
                  <span class="text-danger">{{ $errors->first('client_req_desc') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Business Title</label>
                  <input type="text" name="business_title" class="form-control col" value="{{ old('business_title', $caseStudy->business_title) }}">
                  @if ($errors->has('business_title'))
                  <span class="text-danger">{{ $errors->first('business_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Business Description</label>
                  <textarea class="summernote-simple" id="" name="business_desc">{{ old('business_desc', $caseStudy->business_desc) }}</textarea>
                  @if ($errors->has('business_desc'))
                  <span class="text-danger">{{ $errors->first('business_desc') }}</span>
                  @endif
                </div>

                <div class="more-business-fields ptb-50 col-12">
                  <!-- Template for more-business fields -->
                  @foreach(json_decode($caseStudy->business_items) as $index => $item)
                  @if($index == 0)
                  <div class="more-service-field row mb-4 mx-auto">
                    <div class="col-10">
                      <label class="">Business Items</label>
                      <input type="text" class="form-control" name="business_items[]" value="{{ $item }}">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-process" style="padding-left: 10px;">
                        <button type="button" class="btn btn-primary more-business-add">Add More</button>
                      </div>
                    </div>
                  </div>
                  @else
                  <div class="more-service-field row mb-4 mx-auto">
                    <div class="col-10">
                      <label class="">Business Items</label>
                      <input type="text" class="form-control" name="business_items[]" value="{{ $item }}">
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between; align-items: self-end;">
                      <!-- This div will only contain the Add More button initially -->
                      <div class="add-more-container-process" style="padding-left: 10px;">
                        <button type="button" class="btn btn-danger remove-more-service mt-4">Remove</button>
                      </div>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>

                <div class="col-6 mb-4">
                  <label class="">Our Solution Title</label>
                  <input type="text" name="our_solution_title" class="form-control col" value="{{ old('our_solution_title', $caseStudy->our_solution_title) }}">
                  @if ($errors->has('our_solution_title'))
                  <span class="text-danger">{{ $errors->first('our_solution_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Our Solution Description</label>
                  <textarea class="form-control" id="" name="our_solution_desc">{{ old('our_solution_desc', $caseStudy->our_solution_desc) }}</textarea>
                  @if ($errors->has('our_solution_desc'))
                  <span class="text-danger">{{ $errors->first('our_solution_desc') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">The Results Title</label>
                  <input type="text" name="the_results_title" class="form-control col" value="{{ old('the_results_title', $caseStudy->the_results_title) }}">
                  @if ($errors->has('the_results_title'))
                  <span class="text-danger">{{ $errors->first('the_results_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">The Results Description</label>
                  <textarea class="form-control" id="" name="the_results_desc">{{ old('the_results_desc', $caseStudy->the_results_desc) }}</textarea>
                  @if ($errors->has('the_results_desc'))
                  <span class="text-danger">{{ $errors->first('the_results_desc') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Outsource Title</label>
                  <input type="text" name="out_source_title" class="form-control col" value="{{ old('out_source_title', $caseStudy->out_source_title) }}">
                  @if ($errors->has('out_source_title'))
                  <span class="text-danger">{{ $errors->first('out_source_title') }}</span>
                  @endif
                </div>

                <div class="col-6 mb-4">
                  <label class="">Outsource Description</label>
                  <textarea class="summernote-simple" id="" name="out_source_desc">{{ old('out_source_desc', $caseStudy->out_source_desc) }}</textarea>
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
                  <textarea class="summernote-simple" id="" name="code_snippet">{{ old('code_snippet', $caseStudy->code_snippet) }}</textarea>
                </div>              
              </div>
              <div class="form-group row mb-4 justify-content-end">
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="publish" onclick="return confirm('Are you sure you want to publish the page?');">Publish</button>
                </div>  
                <div class="col-sm-2 col-md-2 text-right">
                  <button class="btn btn-primary btn-pub" type="submit" name="action" value="save">Update</button>
                </div>
                <div class="col-sm-2 col-md-2 text-right">
                  <a class="btn btn-danger btn-pub" href="{{ url('admin/case-study/index') }}" style="color:white;">Close</a>
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
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.more-business-add').addEventListener('click', function() {
      let template = document.querySelector('.more-service-field.row').cloneNode(true);
      template.querySelector('input').value = '';
      template.querySelector('.add-more-container-process').innerHTML = '<button type="button" class="btn btn-danger remove-more-service mt-4">Remove</button>';
      document.querySelector('.more-business-fields').appendChild(template);

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
      document.querySelectorAll('textarea').forEach(function(textarea) {
          textarea.setAttribute('rows', '5');
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
@endsection