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
                <a href="{{ route('admin.article.index') }}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;">
                    <i class="fas fa-arrow-left"></i> Back</a>
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.article.update', $article->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Article</h4>
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
                                    <button class="btn btn-danger btn-pub" type="submit" name="action" value="close">Close</button>
                                    </div>
                                  </div>
                                <div class="form-group row mb-4 color-one">
                                    <!-- Services dropdown -->
                                    <div class="col-4 mb-4">
                                        <label class="">Services<span class="text-danger">*</span></label>
                                        <select id="service-dropdown" name="service_slug" class="form-control col">
                                            <option value="">Select Service</option>
                                            @foreach ($services as $service)
                                            <option value="{{ $service->id }}" {{ $article->service_slug == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('service_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Sub Services dropdown -->
                                    <div class="col-4 mb-4">
                                        <label class="">Sub Services<span class="text-danger">*</span></label>
                                        <select id="sub-service-dropdown" name="sub_service_slug" class="form-control col">
                                            <option value="">Select Sub Service</option>
                                            @foreach ($subServices as $subService)
                                            <option value="{{ $subService->slug }}" {{ $article->sub_service_slug == $subService->slug ? 'selected' : '' }}>
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
                                            <option value="{{ $subSubService->slug }}" {{ $article->sub_sub_service_slug == $subSubService->slug ? 'selected' : '' }}>
                                                {{ $subSubService->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('sub_sub_service_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Page URL -->
                                    <div class="col-6 mb-4">
                                        <label class="">Page Name<span class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control col" value="{{ $article->slug }}">
                                        @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <p><code><span id="generated-url"></span></code></p>
                                    </div>
                                    <!-- Meta Title -->
                                    <div class="col-6 mb-4">
                                        <label class="">Meta Title<span class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control col" value="{{ $article->meta_title }}">
                                        @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Meta Description -->
                                    <div class="col-6 mb-4">
                                        <label class="">Meta Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="meta_description">{{ $article->meta_description }}</textarea>
                                        @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Meta Keywords -->
                                    <div class="col-6">
                                        <label class="">Meta Keywords</label>
                                        <textarea class="form-control" name="meta_keywords">{{ $article->meta_keywords }}</textarea>
                                        @error('meta_keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Banner Title -->
                                    <div class="col-6 mb-4">
                                        <label class="">Banner Title<span class="text-danger">*</span></label>
                                        <input type="text" name="banner_title" class="form-control col" value="{{ $article->banner_title }}">
                                        @error('banner_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Banner Image -->
                                    <div class="col-6">
                                        <label class="">Banner Image<span class="text-danger">*</span></label>

                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="banner_image" id="image-upload" />
                                            @if ($article->banner_image)
                                            <img src="{{ asset('storage/banner_images/' . $article->banner_image) }}" alt="Current Banner Image" class="mt-2">
                                            @endif
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
                                            <img src="{{ asset('storage/feature_images/' . $article->feature_image) }}" class="img-fluid object-fit-cover" style="width:100px;height:100px" />
                      
                                          </div>
                                          
                                         
                                          @if ($errors->has('feature_image'))
                                          <span class="text-danger">{{ $errors->first('feature_image') }}</span>
                                          @endif
                                        </div>
                                        <p class="mt-2 text-danger">(Only Supports jpg.jpeg,png,svg and webp formats)</p>
                                      </div>

                                    <!-- Body Content -->
                                    <div class="col-12 mb-4">
                                        <label class="">Body Content<span class="text-danger">*</span></label>
                                        <textarea class="summernote-simple" id="summernote_body_content" name="body_content">{{ $article->body_content }}</textarea>
                                        @error('body_content')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row mb-4 ptb-50 color-six">
                                    <div class="col-12 mx-auto">
                                        <h3>Reimage Section</h3>
                                    </div>
                                    <div class="col-6">
                                        <label>Reimage Title</label>
                                        <input type="text" class="form-control" name="reimage_title" value="{{ old('reimage_title', $article->reimage_title ?? '') }}">
                                        @if ($errors->has('reimage_title'))
                                        <span class="text-danger">{{ $errors->first('reimage_title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Reimage Description</label>
                                        <textarea class="form-control" name="reimage_desc">{{ old('reimage_desc', $article->reimage_desc ?? '') }}</textarea>
                                        @error('reimage_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="additional-reimage-fields ptb-50 col-12">
                                        @foreach(json_decode($article->reimage_items) as $index => $item)
                                        @if($index == 0)
                                        <div class="additional-reimage-field-template row mb-4">
                                            <div class="col-5">
                                                <label>Reimage Item Title</label>
                                                <input type="text" class="form-control" name="reimage_item_title[]" value="{{$item->title}}">
                                            </div>
                                            <div class="col-5">
                                                <label>Reimage Item Description</label>
                                                <textarea class="form-control" name="reimage_item_description[]">{{$item->description}}</textarea>
                                            </div>
                                            <div class="col-2 pt-5">
                                                <button type="button" class="btn btn-primary copy-and-clear-reimage">Add More</button>
                                            </div>
                                        </div>
                                        @else
                                        <div class="additional-reimage-field-template row mb-4">
                                            <div class="col-5">
                                                <label>Reimage Item Title</label>
                                                <input type="text" class="form-control" name="reimage_item_title[]" value="{{$item->title}}">
                                            </div>
                                            <div class="col-5">
                                                <label>Reimage Item Description</label>
                                                <textarea class="form-control" name="reimage_item_description[]">{{$item->description}}</textarea>
                                            </div>
                                            <div class="col-2 pt-5">
                                                <button type="button" class="btn btn-primary copy-and-clear-reimage">Add More</button>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-4 ptb-50 color-six">
                                    <div class="col-12 mx-auto">
                                        <h3>Registration Section</h3>
                                    </div>
                                    <div class="col-6">
                                        <label>Registration Title</label>
                                        <input type="text" class="form-control" name="regis_title" value="{{ old('regis_title', $article->regis_title ?? '') }}">
                                        @if ($errors->has('regis_title'))
                                        <span class="text-danger">{{ $errors->first('regis_title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Registration Description</label>
                                        <textarea class="form-control" name="regis_desc">{{ old('regis_desc', $article->regis_desc ?? '') }}</textarea>
                                        @error('regis_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="additional-regis-fields ptb-50 col-12">
                                        @foreach(json_decode($article->regis_items) as $index => $item)
                                        @if($index == 0)
                                        <div class="additional-regis-field-template row mb-4">
                                            <div class="col-5">
                                                <label>Registration Item Title</label>
                                                <input type="text" class="form-control" name="regis_item_title[]" value="{{$item->title}}">
                                            </div>
                                            <div class="col-5">
                                                <label>Registration Item Description</label>
                                                <textarea class="form-control" name="regis_item_desc[]">{{ $item->description }}</textarea>
                                            </div>
                                            <div class="col-2 pt-5">
                                                <button type="button" class="btn btn-primary copy-and-clear-regis">Add More</button>
                                            </div>
                                        </div>
                                        @else
                                        <div class="additional-regis-field-template row mb-4">
                                            <div class="col-5">
                                                <label>Registration Item Title</label>
                                                <input type="text" class="form-control" name="regis_item_title[]" value="{{$item->title}}">
                                            </div>
                                            <div class="col-5">
                                                <label>Registration Item Description</label>
                                                <textarea class="form-control" name="regis_item_desc[]">{{ $item->description }}</textarea>
                                            </div>
                                            <div class="col-2 pt-5">
                                                <button type="button" class="btn btn-primary copy-and-clear-regis">Add More</button>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-4 ptb-50 color-six">
                                    <div class="col-12 mx-auto">
                                        <h3>Digital Section</h3>
                                    </div>
                                    <div class="col-6">
                                        <label>Digital Title</label>
                                        <input type="text" class="form-control" name="digital_title" value="{{ old('digital_title', $article->digital_title ?? '') }}">
                                        @if ($errors->has('digital_title'))
                                        <span class="text-danger">{{ $errors->first('digital_title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Digital Description</label>
                                        <textarea class="form-control" name="digital_desc">{{ old('digital_desc', $article->digital_desc ?? '') }}</textarea>
                                        @error('digital_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label>Digital Para</label>
                                        <input type="text" class="form-control" name="digital_para" value="{{ old('digital_para', $article->digital_para ?? '') }}"></input>
                                        @if ($errors->has('digital_para'))
                                        <span class="text-danger">{{ $errors->first('digital_para') }}</span>
                                        @endif
                                    </div>
                                    <div class="additional-digital-fields ptb-50 col-12">
                                        @foreach(json_decode($article->regis_items) as $index => $item)
                                        @if($index == 0)
                                        <div class="additional-digital-field-template row mb-4">
                                            <div class="col-5">
                                                <label>Digital Item Title</label>
                                                <input type="text" class="form-control" name="digital_item_title[]" value="{{ $item->title }}">
                                            </div>
                                            <div class="col-5">
                                                <label>Digital Item Description</label>
                                                <textarea class="form-control" name="digital_item_desc[]">{{ $item->description }}</textarea>
                                            </div>
                                            <div class="col-2 pt-5">
                                                <button type="button" class="btn btn-primary copy-and-clear-digital">Add More</button>
                                            </div>
                                        </div>
                                        @else

                                        <div class="additional-digital-field-template row mb-4">
                                            <div class="col-5">
                                                <label>Digital Item Title</label>
                                                <input type="text" class="form-control" name="digital_item_title[]" value="{{ $item->title }}">
                                            </div>
                                            <div class="col-5">
                                                <label>Digital Item Description</label>
                                                <textarea class="form-control" name="digital_item_desc[]">{{ $item->description }}</textarea>
                                            </div>
                                            <div class="col-2 pt-5">
                                                <button type="button" class="btn btn-primary copy-and-clear-digital">Add More</button>
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
                                        <input type="text" class="form-control" name="faq_main_title" value="{{ old('faq_main_title', $article->faq_main_title) }}">

                                    </div>


                                    <!-- additional fields for faq -->
                                    <div class="additional-faq-fields ptb-50 col-12">
                                        <!-- Template for additional-faq fields -->

                                        @foreach(json_decode($article->faqs) as $index => $item)
                                        @if($index == 0)
                                        <div class="additional-faq-field-template row mb-4">
                                            <div class="col-5">
                                                <label class="">FAQ Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="faq_title[]" value="{{ $item->title }}">
                                            </div>
                                            <div class="col-5">
                                                <label class="">FAQ Description<span class="text-danger">*</span></label>
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
                                                <label class="">FAQ Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="faq_title[]" value="{{ $item->title }}">
                                            </div>
                                            <div class="col-5">
                                                <label class="">FAQ Description<span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="faq_description[]">{{ $item->description }}</textarea>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-danger remove-field-faq">Remove</button>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>

                                </div>

                                             {{-- Code Snippet --}}

              <div class="form-group row mb-4 color-five">
                <div class="col-12 mx-auto">
                  <h3>Schema Code Snippet</h3>
                </div>
                <div class="col-12">
                  <label class="">Schema Code Snippet</label>
                  <textarea class="summernote-simple" id="" name="code_snippet">{{ old('code_snippet', $article->code_snippet) }}</textarea>
                </div>              
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
                                    <a class="btn btn-danger btn-pub" href="{{ url('admin/article/index') }}" style="color:white;">Close</a>
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
        $('#service-dropdown').on('change', function() {
            var serviceId = this.value;
            $("#sub-service-dropdown").html('');
            $("#sub-sub-service-dropdown").html('<option value="">Select Sub Sub Service</option>');
            $.ajax({
                url: '/get-subservices/' + serviceId,
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
                url: '/get-subsubservices/' + subServiceId,
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