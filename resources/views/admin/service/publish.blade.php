<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="php1">
  <title><?php echo $service->meta_title ?></title>
  <meta name="description" content="<?php echo $service->meta_description ?>" />
  <meta name="keywords" content="<?php echo $service->meta_keywords ?? ' ' ?>" />

  <!-- Facebook -->
  <meta property="og:title" content="<?php echo $service->meta_title ?>" />
  <meta property="og:description" content="<?php echo $service->meta_description ?>" />
  <meta property="og:image" content="{{ asset('storage/feature_images/' . $service->feature_image)  }}" />
  
  <meta name="servicType" content="<?php echo $service->meta_title ?>" />
  <meta name="id" content="https://demo1.flatworldsolutions.com{{ $service->page_link }}.php" />
  <meta name="image" content="<?php echo  asset('storage/banner_images/' . $service->banner_image)  ?>" />

  <!-- Twitter -->
  <meta name="twitter:title" content="<?php echo $service->meta_title ?>" />
  <meta name="twitter:description" content="<?php echo $service->meta_description ?>" />
  <meta name="twitter:image:src" content="{{ asset('storage/feature_images/' . $service->feature_image) }}" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="php2">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<style>
    @media (min-width: 576px) {
    .modal-dialog {
        max-width: 50% !important;
    }
}
</style>
</head>

<body>
  <!-- HEADER STARTS -->
  <meta name="php3">
  <!-- HEADER ENDS -->

  <!-- SUB MENU STARTS -->
  <meta name="php4">
  <!-- SUB MENU ENDS -->
  
  @php
    $directoryPath = '';
  if (!empty($service->service_slug)) {
                $serviceSlug = \App\Models\ServiceList::where('id', $service->service_slug)->pluck('slug')->first();
               
                $directoryPath .= '/' . $serviceSlug;
            }
   
    $imagesDirectory = $directoryPath . '/images'; 
  @endphp
 
  <!-- H1 BANNER IMAGE STARTS -->
  <section id="bannerplain" data-wow-delay="300ms" class="wow fadeIn position-relative page-header parallax section-nav-smooth page-hgt">
    <img src="<?php echo  $imagesDirectory.'/'. $service->banner_image  ?>" class="img-fluid object-fit-cover" alt="<?php echo $service->banner_title ?>" title="<?php echo $service->banner_title ?>" />
    <div class="page-titles whitecolor text-center">
      <h1><?php echo $service->banner_title ?></h1>
      <p><?php echo $service->banner_description ?></p>
    </div>
  </section>
  <!-- H1 BANNER IMAGE ENDS -->

  <!-- TOP SMALL FORM STARTS -->
  <section id="smallFormInnerPage">
    <meta name="php5">
  </section>
  <!-- TOP SMALL FORM ENDS -->


  <!-- About us -->
  <section class="service-page-intro">
    <div class="container aboutus">
      <div class="row">
        <div class="col-lg-12 col-md-12 text-md-left">

          <div class="breadcrumbs mb-0">
                        <!--<ol vocab="http://schema.org/" typeof="BreadcrumbList"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href=#><span property="name">{{ $service->slug ?? '' }}</span></a><meta property="position" content="1"></li>-->
                        <ol vocab="http://schema.org/" typeof="BreadcrumbList">
                         <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="https://www.flatworldsolutions.com/"><span property="name">Home</span></a><meta property="position" content="1"></li>
                     
                   
                       @if(isset($service->service_slug ) && !empty($service->service_slug ))
                          @foreach ($services as $item)
                          @if($item->id ==$service->service_slug)
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $item->name }}</span></a><meta property="position" content="3"></li>
                      @endif
                       @endforeach
                       @endif
                          @if(isset($service->sub_service_slug ) && !empty($service->sub_service_slug ))
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $service->sub_service_slug ?? '' }}</span></a><meta property="position" content="3"></li>
                       @endif
                        @if(isset($service->sub_sub_service_slug ) && !empty($service->sub_sub_service_slug ))
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $service->sub_sub_service_slug ??'' }}</span></a><meta property="position" content="4"></li>
                        @endif
                         <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href=#><span property="name">{{ $service->slug ?? '' }}</span></a><meta property="position" content="5"></li>
                        </ol>
                    </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-lg-12 col-md-12 text-md-left">

          <p><?php echo $service->body_content ?></p>

        </div>
      </div>
    </div>
  </section>

  @if(!empty($service->service_list_title))
  <section class="services-we-offer">
    <div class="container">
      <div class="row row-margin">
        <div class="col-md-12 col-xl-10 offset-xl-1 text-center">
          <h2><?php echo $service->service_list_title ?></h2>
          <p class="services-wel-txt"><?php echo $service->service_list_description ?></p>
        </div>
      </div>
      <div class="row service-list">
        @foreach(json_decode($service->service_list_contents) as $item)
        @php
        $imageName = basename($item->image);
        @endphp
        <div class="col-md-12 col-xl-6 col-sm-12">
          <div class="contact-center-box">
            <img src="<?php echo  $imagesDirectory.'/'. $imageName  ?>" class="img-fluid" alt="<?php echo  $item->title  ?>" align="left">
            <h3><a href="/call-center/answering-services/medical-answering-services.php"><?php echo  $item->title  ?></a></h3>
            <p><?php echo  $item->description  ?></p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  @endif

@php
$more_services = json_decode($service->more_service_items);

// Check if $more_services is not null before proceeding
$valid_services = [];

if (!is_null($more_services)) {
    $valid_services = array_filter($more_services, function($item) {
        return !empty($item->title);
    });
}
@endphp


@if (!empty($valid_services))
<section class="flat-event-head bg-white">
    <div class="container">
        <div class="flat-advantage disc-remove">
            <div class="row">
                <div class="text-center">
                    <h3>{{ $service->more_service_main_title ?? '' }}</h3>
                    <div class="space20"></div>
                </div>
                @foreach($valid_services as $item)
                <div class="col-md-6 col-sm-6 col-xl-4">
                    <div class="d-flex media-object">
                        <div class="flex-shrink-0">
                            <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            @if(!empty($item->link))
                                <a href="{{ $item->link }}">{{ $item->title }}</a>
                            @else
                                {{ $item->title }}
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif



  @if(!empty($service->process_flow_title))
  <!-- Start Process adesign -->
  <section class="outsource-process1">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 text-center">
          <h2 class="color-brand"><?php echo  $service->process_flow_title??''  ?></h2>
          <div class="space30"></div>
          <p>{!! $service->process_flow_description !!}</p>
          <div class="space30"></div>
        </div>

        @foreach(json_decode($service->process_flow_contents) as $s)
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="d-flex inner-media">
            <div class="flex-shrink-0">
              <div class="why-icon position-relative">
                <i class="fas fa-list-ol"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light">
                  <span class="badge-count"><?php echo  $loop->iteration  ?></span>
                </span>
              </div>

            </div>
            <div class="flex-grow-1 ms-3">
              <h3><?php echo  $s->title ?? ''  ?></h3>
              <p><?php echo  $s->description ?? ''  ?></p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  @endif

@php
$industries = json_decode($service->industry_items);

// Check if $industries is not null before proceeding
$valid_industries = [];

if (!is_null($industries)) {
    $valid_industries = array_filter($industries, function($item) {
        return !empty($item); // Check if the item is not empty
    });
}
@endphp


@if (!empty($valid_industries))
<section class="flatworld-advantage advantage-back ser-inn" id="indus_section">
    <div class="container">
        <div class="row effect-code">
            <div class="col-md-10 col-xl-8 offset-xl-2 offset-md-1 text-center">
                <h2>{{ $service->industry_main_title }}</h2>
            </div>
            <div class="col-xl-12">
                <div class="space30 border-space"></div>
            </div>

            @foreach($valid_industries as $item)
            <div class="col-md-4 col-sm-6 col-xl-3 col-12">
                <div class="d-flex media-object">
                    <div class="flex-shrink-0">
                        <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                    </div>
                    <div class="flex-grow-1 ms-3 new indus" style="color: white;">
                        {{ $item }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


  @if(!empty($service->why_choose_title))
  <section class="services-advantage">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1 text-center">
          <div class="center-wel">
            <h2><?php echo  $service->why_choose_title??''  ?></h2>
            <p><?php echo  $service->why_choose_description??''  ?></p>
          </div>
        </div>

        @foreach(json_decode($service->why_choose_contents) as $item)
        <div class="col-md-6 col-sm-6 col-xl-3">
          <div class="featured-box">
            <i class="fa-sharp"><?php echo  str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)  ?></i>
            <h4><a href="<?php echo  $item->link  ?>"><?php echo  $item->title  ?></a></h4>
            <p><?php echo  $item->description  ?></p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  @endif
  
  {{-- Articles --}}
@php
$articles = json_decode($service->article_contents);
function hasValidArticle($articles) {
    foreach ($articles as $article) {
        if (!is_null($article->image) || !is_null($article->description) || !is_null($article->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($articles) && count($articles) > 0 && hasValidArticle($articles))


  <section class="our-services articles" />
        <div class="container" />
            <div class="row">
              <h2><?php echo  $service->article_main_title  ?></h2>
              <div class="space20" />
            </div>
            @foreach(json_decode($service->article_contents) as $item)
             @php
        $imageName = basename($item->image);
        @endphp
                      <div class="col-md-6 col-sm-6 col-xl-3 mb-4" />
                            <div class="services-box" />
                                    <img src="<?php echo  $imagesDirectory.'/'. $imageName  ?>" class="img-fluid" alt="<?php echo  $item->description  ?>" />
                                      <div class="services-box-content" />
                                        @if($item->link)
                                        <h3><a href="<?php echo  $item->link  ?>"><?php echo  $item->description ?? ''  ?></a></h3>
                                        @else
                                        <h3><?php echo  $item->description ?? ''  ?></h3>
                                        @endif
                                      </div>
                            </div>
                      </div>
            @endforeach
        </div>
        </div>
  </section>
  @endif
  

{{-- Additional --}}
@php
$additionals = json_decode($service->additional_services_contents);
function hasValidAdditionalService($additionals) {
    foreach ($additionals as $service) {
        if (!is_null($service->title) || !is_null($service->description) || !is_null($service->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($additionals) && count($additionals) > 0 && hasValidAdditionalService($additionals))
  <section class="services-addtional">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2><?php echo  $service->additional_title  ?></h2>
          <div class="space30"></div>
          <div class="space10"></div>
        </div>
        @foreach(json_decode($service->additional_services_contents) as $item)
        <div class="col-md-12 col-xl-6">
          <div class="inner-box-two">
            <div class="row">
              <div class="col-md-5">
                <a href="<?php echo  $item->link ?? ''  ?>">
                  <h3><?php echo  $item->title  ?></h3>
                </a>
              </div>
              <div class="col-md-7">
                <p><?php echo  $item->description  ?></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @php
      $tech_images = json_decode($service->tech_images);
  @endphp
  
  @if (isset($tech_images) && count($tech_images) > 0)
  <section id="icons-stripe-box-layout" class="software-healthcare">
      <div class="container">
          <div class="row">
              <h2><?php echo  $service->tech_title  ?></h2>
              <div class="img-box healthcare">
                  @foreach ($tech_images as $item)
                  <img src="<?php echo  $imagesDirectory.'/'. $item ?>" alt="" title="">
                  @endforeach
              </div>
          </div>
      </div>
  </section>
  @endif

  {{-- Client Success Stories --}}
@php
$stories = json_decode($service->client_success_stories);
function hasValidClientSuccessStory($stories) {
    foreach ($stories as $story) {
        if (!is_null($story->title) || !is_null($story->description) || !is_null($story->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($stories) && count($stories) > 0 && hasValidClientSuccessStory($stories))
  <!-- Start Client Success Stories Code -->
  <section id="successStories" class="client-success-stories">
    <div class="container">
      <div class="row wow fadeIn" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeIn;">
        <div class="col-md-12 col-lg-12 col-xl-8">
          <h2><a href="<?php echo  $service->client_title_link  ?>"><?php echo  $service->client_main_title  ?></a> </h2>
          <div class="row">

            @foreach(json_decode($service->client_success_stories) as $item)
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
              <div class="d-flex media-object client-succ">
                <div class="flex-shrink-0">
                  <img src="/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                </div>
                <div class="flex-grow-1 ms-3">
                  @if (!is_null($item->title_link))
                  <h4><a href="<?php echo  $item->title_link  ?>"><?php echo  $item->title ?? ''  ?></a></h4>
                  @else
                  <h4><?php echo  $item->title ?? ''  ?></h4>
                  @endif
                  <p><?php echo  $item->description ?? ''  ?></p>
                  <a href="<?php echo  $item->link ?? ''  ?>" class="read-mortgage">Read More <i class="fa fa-angle-double-right"></i></a>
              </div>
              </div>

            </div>
            @endforeach
          </div>
        </div>
        <div class="d-none d-xl-block col-xl-4">
          <img src="/images/success-stories.webp" class="img-fluid" alt="Success Stories ">
        </div>
      </div>
    </div>
    </div>
  </section>
  @endif


  @if (isset($service->testimonial_title))
  <section id="service-hm-testimonials" class="pb-5  wow fadeInDown" data-wow-delay="400ms">
      <div class="container">
          <div class="row py-4">
              <div class="col-md-12 m-auto text-center py-3">
                  <h2 class="service-top-heading-testim"><a href="<?php echo  $service->testimonial_title_link  ?>">
                          <?php echo  $service->testimonial_main_title?? ''  ?>
                      </a></h2>
              </div>
              <div class="col-md-12">
                  <div id="carouselExampleDark" class="carousel carousel-dark slide">
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <i class="fa-solid fa-quote-left h1"></i>
                              <p class="description"><?php echo  $service->testimonial_description ?? ''  ?></p>
                              <h3 class="testimonial-title">
                                  <small><?php echo  $service->testimonial_author ?? ''  ?></small> </small>
                              </h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 m-auto text-center">
                  <a href="<?php echo  $service->testimonial_link ??'' ?>" class="butn butn__new">More Testimonials <i class="fa-solid fa-caret-right"></i></a>
              </div>
          </div>
      </div>
  </section>  
  @endif

  @php
       $outsource_dynamic = json_decode($service->outsource_dynamic);
  @endphp

  @if (isset($service->outsource_title))
  <section class="outsource-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo  $service->outsource_title  ?></h2>
                <p><?php echo  $service->outsource_description  ?></p>
                <div class="row">
                   @foreach ($outsource_dynamic as $item)
                   <div class="col-md-6 col-sm-6 col-xl-4">
                        <div class="d-flex media-object">
                            <div class="flex-shrink-0">
                            <img src="/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                            </div>
                            <div class="flex-grow-1 ms-3">
                            <p><?php echo  $item   ?></p>
                            </div>
                        </div>
                    </div>  
                   @endforeach              
                        
                     
                  <p><?php echo  $service->outsource_para  ?></p>
          
                  <center><a href="/forms/callcentercontactform.php#top" id="btm_cub" onclick="document.getElementById('btm_cub').href='/forms/callcentercontactform.php?loc=EOP&amp;url=service-template&amp;at=btn&amp;ft=Global&amp;cv=unknown_group-unknown_pagetype#top';" class="butn butn__new">Contact Us</a>
                  </center>
                </div>

             

            </div>
        </div>
    </div>
</section>  
  @endif  

  @php
      $faqs = json_decode($service->faqs);
      function hasValidFaq($faqs) {
            foreach ($faqs as $faq) {
                if (!is_null($faq->title) || !is_null($faq->description)) {
                    return true;
                }
            }
            return false;
        }
  @endphp

@if (isset($faqs) && count($faqs) > 0 && hasValidFaq($faqs))
  <!-- Start FAQ Code -->
<section class="faqs-page pt-5">
  <div class="container">
      <div class="row">
          <h2 class="faqs-page-head"><?php echo  $service->faq_main_title  ?></h2>
          <div class="accordion" id="accordionExample">
              @foreach($faqs as $index => $faq)
              <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo  $index  ?>">
                      <button class="accordion-button <?php echo  $index == 0 ? '' : 'collapsed'  ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo  $index  ?>" aria-expanded="<?php echo  $index == 0 ? 'true' : 'false'  ?>" aria-controls="collapse<?php echo  $index  ?>">
                          <?php echo  $faq->title  ?>
                      </button>
                  </h2>
                  <div id="collapse<?php echo  $index  ?>" class="accordion-collapse collapse <?php echo  $index == 0 ? 'show' : ''  ?>" aria-labelledby="heading<?php echo  $index  ?>" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          <?php echo  $faq->description  ?>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</section>

@endif
<!-- ENd FAQ Code -->
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body mx-auto text-center my-auto">
        <h2 class="text-white">The page is published</h2>
        <br>
        <p class="text-white">Click below url to view the page</p>
        <br>
                  <a href="https://demo1.flatworldsolutions.com{{ $service->page_link }}.php" target="_blank">https://demo1.flatworldsolutions.com{{ $service->page_link }}.php</a>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="successModalButton">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="errorModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white">
        Something went wrong. Please try again.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
    
    .modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #2a2a2a !important;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 2rem !important;
    padding: 1rem !important;
    outline: 0;
}
.modal-body p{
    color:white !important;
}

</style>

  <!-- BOTTOM THREE BOX STARTS -->
  <meta name="php10">
  <!-- BOTTOM THREE BOX Ends -->

  <meta name="php11">
  <!-- FOOTER STARTS -->
  <meta name="php12">
  <!-- FOOTER ENDS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>//script-start
  $(document).ready(function() {
      var slug = "<?php echo  $service->slug  ?>";
      var htmlContent = document.documentElement.outerHTML;
  
      $.ajax({
          url: '<?php echo  route("save-html")  ?>',
          type: 'POST',
          headers: {
              'X-CSRF-TOKEN': '<?php echo  csrf_token()  ?>'
          },
          data: {
              htmlContent: htmlContent,
              slug: slug
          },
          success: function(response) {
              $('#successModal').modal('show');
              $('#successModalButton').on('click', function() {
                  window.location.href = '<?php echo  url("admin/service/index")  ?>';
              });
          },
          error: function(xhr, status, error) {
              console.error(error);
              $('#errorModal').modal('show');
          }
      });
  });
  //script-end</script>
  

</body>

</html>