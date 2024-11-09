@extends('inc.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('title', $service->meta_title)
@section('meta_keywords', $service->meta_keywords)
@section('meta_description', $service->meta_description)

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<style>
    /* .disc-remove ul li {
        list-style: none !important;

    }

    .new li {
        color: white !important;
        list-style: none !important;
    } */

    .indus {
        color: white !important;
    }
</style>

@include('inc.header')

<!-- H1 BANNER IMAGE STARTS -->
<section id="bannerplain" data-wow-delay="300ms" class="wow fadeIn position-relative page-header parallax section-nav-smooth page-hgt">
    <img src="{{ asset('storage/banner_images/' . $service->banner_image) }}" class="img-fluid object-fit-cover" alt="Answering Services" title="Answering Services" />
    <div class="page-titles whitecolor text-center">
        <h1>{{ $service->banner_title ?? '' }}</h1>
        <div>{{ $service->banner_description ?? '' }}</div>

    </div>
</section>
<!-- H1 BANNER IMAGE ENDS -->

<!-- About us -->
<section class="service-page-intro">
    <div class="container aboutus">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-md-left">

                <div class="breadcrumbs mb-0">
                        <ol vocab="http://schema.org/" typeof="BreadcrumbList"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href=#><span property="name">{{ $service->slug ?? '' }}</span></a><meta property="position" content="1"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $service->sub_service_slug ?? '' }}</span></a><meta property="position" content="2"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $service->sub_sub_service_slug ??'' }}</span></a><meta property="position" content="3"></li></ol>
                    </div> 
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 text-md-left">
                <div>{!! $service->body_content ?? '' !!}</div>
            </div>
        </div>
    </div>
</section>

{{-- Our Answering Services --}}
@php
function hasValidService($services) {
    foreach ($services as $service) {
        if (!is_null($service->image) || !is_null($service->title) || !is_null($service->description) || !is_null($service->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($service_list_data) && count($service_list_data) > 0 && hasValidService($service_list_data))
    <section class="services-we-offer">
        <div class="container">
            <div class="row row-margin">
                <div class="col-md-12 col-xl-10 offset-xl-1 text-center">
                    <h2>{{ $service->service_list_title??'' }}</h2>
                    <p class="services-wel-txt">{!! $service->service_list_description ?? '' !!}</p>
                </div>
            </div>
            <div class="row service-list">

                @foreach($service_list_data as $s)
                <div class="col-md-12 col-xl-6 col-sm-12">
                    <div class="contact-center-box">
                        <img src="{{ asset($s->image) }}" align="left">
                        <h3><a href="{{ $s->link ?? ''}}">{{ $s->title ?? '' }}</a></h3>
                        <p>{{ $s->description ?? '' }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        </div>
    </section>  
@endif


{{-- More Services --}}
@php
function hasValidMoreService($services) {
    foreach ($services as $service) {
        if (!is_null($service) && $service !== '') {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($more_services) && count($more_services) > 0 && hasValidMoreService($more_services))
<section class="flat-event-head bg-white">
    <div class="container">
        <div class="flat-advantage disc-remove">
            <div class="row">
                <div class="text-center">
                    <h3>{{ $service->more_service_main_title }}</h3>
                    <div class="space20"></div>
                </div>
                @foreach($more_services as $item)
                <div class="col-md-6 col-sm-6 col-xl-4">
                    <div class="d-flex media-object">
                        <div class="flex-shrink-0">
                            <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                        </div>
                        <div class="flex-grow-1 ms-3" >
                            {{ $item }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


{{-- Process Flow --}}
@if (isset($process_flow_contents) && count($process_flow_contents) > 0)
    @php
        $hasValidContent = false;
        foreach ($process_flow_contents as $item) {
            if (!is_null($item->logo) || !is_null($item->title) || !is_null($item->description)) {
                $hasValidContent = true;
                break;
            }
        }
    @endphp
    @if ($hasValidContent)
    <section class="outsource-process1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2 class="color-brand">{{ $service->process_flow_title ?? '' }}</h2>
                    <div class="space30"></div>
                    <p>{!! $service->process_flow_description !!}</p>
                    <div class="space30"></div>
                </div>
                @foreach($process_flow_contents as $s)
                @if (!is_null($s->logo) || !is_null($s->title) || !is_null($s->description))
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="d-flex inner-media">
                        <div class="flex-shrink-0">
                            <div class="why-icon position-relative">
                                <span>{!! $s->logo !!}</span>
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light">
                                    <span class="badge-count">{{ $loop->iteration }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3>{{ $s->title ?? '' }}</h3>
                            <p>{{ $s->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endif



{{-- Industries we Serve --}}

@php
function hasValidIndustry($industries) {
    foreach ($industries as $industry) {
        if (!is_null($industry) && $industry !== '') {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($industries) && count($industries) > 0 && hasValidIndustry($industries))
<section class="flatworld-advantage advantage-back ser-inn" id="indus_section">
    <div class="container">
        <div class="row effect-code">
            <div class="col-md-10 col-xl-8 offset-xl-2 offset-md-1 text-center">
                <h2>{{ $service->industry_main_title }}</h2>
            </div>
            <div class="col-xl-12">
                <div class="space30 border-space"></div>
            </div>

            @foreach($industries as $item)
            <div class="col-md-4 col-sm-6 col-xl-3 col-12">
                <div class="d-flex media-object ">
                    <div class="flex-shrink-0">
                        <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                    </div>
                    <div class="flex-grow-1 ms-3 new indus">
                       {{ $item }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Why Choose Us --}}
@if (isset($why_choose_contents) && count($why_choose_contents) > 0)
    @php
        $hasValidContent = false;
        foreach ($why_choose_contents as $item) {
            if (!is_null($item->title) || !is_null($item->description) || !is_null($item->link)) {
                $hasValidContent = true;
                break;
            }
        }
    @endphp
    @if ($hasValidContent)
    <section class="services-advantage">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <div class="center-wel">
                        <h2>{{ $service->why_choose_title ?? '' }}</h2>
                        <p>{{ $service->why_choose_description ?? '' }}</p>
                    </div>
                </div>

                @foreach ($why_choose_contents as $item)
                    @if (!is_null($item->title) || !is_null($item->description) || !is_null($item->link))
                    <div class="col-md-6 col-sm-6 col-xl-3">
                        <div class="featured-box">
                            <i class="fa-sharp">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</i>
                            @if($item->link)
                                <h4><a href="{{ $item->link }}">{{ $item->title ?? '' }}</a></h4>
                            @else
                                <h4>{{ $item->title ?? '' }}</h4>
                            @endif
                            <p>{{ $item->description ?? ''}}</p>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
    @endif
@endif


{{-- Articles --}}
@php
function hasValidArticle($articles) {
    foreach ($articles as $article) {
        if (!is_null($article->image) || !is_null($article->description) || !is_null($article->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($article_contents) && count($article_contents) > 0 && hasValidArticle($article_contents))
<section class="our-services articles">
    <div class="container">
        <div class="row">
            <h2>{{ $service->article_main_title }}</h2>
            <div class="space20"></div>
        </div>

        <div class="row">
            @foreach ($article_contents as $item)
            <div class="col-md-6 col-sm-6 col-xl-3 mb-4">
                <div class="services-box">
                    <img src="{{ asset($item->image) }}" align="left" width="318px" height="200px">
                    <div class="services-box-content">
                        @if($item->link)
                        <h3><a href="{{ $item->link }}">{{ $item->description ?? '' }}</a></h3>
                        @else
                        <h3>{{ $item->description ?? '' }}</h3>
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
function hasValidAdditionalService($services) {
    foreach ($services as $service) {
        if (!is_null($service->title) || !is_null($service->description) || !is_null($service->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($additional_services_contents) && count($additional_services_contents) > 0 && hasValidAdditionalService($additional_services_contents))
<section class="services-addtional">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>{{ $service->additional_title }}</h2>
                <div class="space30"></div>
                <div class="space10"></div>
            </div>
            @foreach ($additional_services_contents as $item)
                @if (!is_null($item->title) || !is_null($item->description) || !is_null($item->link))
                <div class="col-md-12 col-xl-6">
                    <div class="inner-box-two">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="{{ $item->link ?? '' }}">
                                    <h3>{{ $item->title ?? '' }}</h3>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <p>{{ $item->description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- Technology We Use --}}
@if (isset($tech_images) && count($tech_images) > 0)
<section id="icons-stripe-box-layout" class="software-healthcare">
    <div class="container">
        <div class="row">
            <h2>{{ $service->tech_title }}</h2>
            <div class="img-box healthcare">
                @foreach ($tech_images as $item)
                <img src="{{ asset('storage/tech_images/' . $item) }}" alt="" title="">
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- Client Success Stories --}}
@php
function hasValidClientSuccessStory($stories) {
    foreach ($stories as $story) {
        if (!is_null($story->title) || !is_null($story->description) || !is_null($story->link)) {
            return true;
        }
    }
    return false;
}
@endphp
@if (isset($client_success_stories) && count($client_success_stories) > 0 && hasValidClientSuccessStory($client_success_stories))
<section id="successStories" class="client-success-stories">
    <div class="container">
        <div class="row wow fadeIn" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeIn;">
            <div class="col-md-12 col-lg-12 col-xl-8">
                <h2><a href="{{ $service->client_title_link }}">{{ $service->client_main_title }}</a> </h2>
                <div class="row">
                    @foreach ($client_success_stories as $item)
                        @if (!is_null($item->title) || !is_null($item->description) || !is_null($item->link))
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                            <div class="d-flex media-object client-succ">
                                <div class="flex-shrink-0">
                                    <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    @if (!is_null($item->title_link))
                                    <h4><a href="{{ $item->title_link }}">{{ $item->title ?? '' }}</a></h4>
                                    @else
                                    <h4>{{ $item->title ?? '' }}</h4>
                                    @endif
                                    <p>{{ $item->description ?? '' }}</p>
                                    <a href="{{ $item->link ?? '' }}" class="read-mortgage">Read More <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-none d-xl-block col-xl-4">
                <img src="https://www.flatworldsolutions.com/images/success-stories.webp" class="img-fluid" alt="Success Stories ">
            </div>
        </div>
    </div>
</section>
@endif


{{-- Client Testimonials --}}

@if (isset($service->testimonial_title))
<section id="service-hm-testimonials" class="pb-5  wow fadeInDown" data-wow-delay="400ms">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 m-auto text-center py-3">
                <h2 class="service-top-heading-testim"><a href="{{ $service->testimonial_title_link }}">
                        {{ $service->testimonial_main_title?? '' }}
                    </a></h2>
            </div>
            <div class="col-md-12">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <i class="fa-solid fa-quote-left h1"></i>
                            <p class="description">{{ $service->testimonial_description ?? '' }}</p>
                            <h3 class="testimonial-title">
                                <small>{{ $service->testimonial_author ?? '' }}</small> </small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-auto text-center">
                <a href="{{ $service->testimonial_link ??''}}" class="butn butn__new">More Testimonials <i class="fa-solid fa-caret-right"></i></a>
            </div>
        </div>
    </div>
</section>  
@endif


{{-- <section class="outsource-services">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <h2>Outsource Answering Service Requirements to Us</h2>
                <p>For the past , we have helped leading companies across multiple industries address answering service and call center support requirements. Our comprehensive services have helped them provide high-quality support and improve customer satisfaction. With outsourced answering service, you get to benefit from -</p>
                <div class="row">
                        <div class="col-md-6 col-sm-6 col-xl-4">
                        <div class="d-flex media-object">
                            <div class="flex-shrink-0">
                                <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p>Trained and experienced agents</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xl-4">
                            <div class="d-flex media-object">
                            <div class="flex-shrink-0">
                            <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                            </div>
                            <div class="flex-grow-1 ms-3">
                            <p>Consistent support quality</p>
                            </div>
                        </div>
                        </div>
                    <div class="col-md-6 col-sm-6 col-xl-4">
                    <div class="d-flex media-object">
                        <div class="flex-shrink-0">
                        <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p>Industry-specific expertise</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xl-4">
                    <div class="d-flex media-object">
                    <div class="flex-shrink-0">
                    <img src="https://www.flatworldsolutions.com/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <p>Customizable scripts and protocols</p>
                    </div>
                </div>
                </div>
                <p>Ensure every customer call is answered promptly and professionally by reaching out to us today!</p>

                
            </div>
            </div>
        </div>
    </section> --}}

  @if (isset($service->outsource_title))
  <section class="outsource-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $service->outsource_title }}</h2>
                <p>{{ $service->outsource_description }}</p>
                <div class="row">
                   @foreach ($outsource_dynamic as $item)
                   <div class="col-md-6 col-sm-6 col-xl-4">
                        <div class="d-flex media-object">
                            <div class="flex-shrink-0">
                            <img src="/images/icons/12.svg" class="rounded-circle" alt="Arrow">
                            </div>
                            <div class="flex-grow-1 ms-3">
                            <p>{{ $item  }}</p>
                            </div>
                        </div>
                    </div>  
                   @endforeach              
                        
                     
                  <p>{{ $service->outsource_para }}</p>
          
                  <center><a href="/forms/callcentercontactform.php#top" id="btm_cub" onclick="document.getElementById('btm_cub').href='/forms/callcentercontactform.php?loc=EOP&amp;url=service-template&amp;at=btn&amp;ft=Global&amp;cv=unknown_group-unknown_pagetype#top';" class="butn butn__new">Contact Us</a>
                  </center>
                </div>

             

            </div>
        </div>
    </div>
</section>  
  @endif  


<!-- Start FAQ Code -->

@php
function hasValidFaq($faqs) {
    foreach ($faqs as $faq) {
        if (!is_null($faq->title) || !is_null($faq->description)) {
            return true;
        }
    }
    return false;
}
@endphp

@if (isset($faq_data) && count($faq_data) > 0 && hasValidFaq($faq_data))
<section class="faqs-page pt-5">
    <div class="container">
        <div class="row">
            <h2 class="faqs-page-head">{{ $service->faq_main_title ?? '' }}</h2>
            <div class="accordion" id="accordionExample">
                @foreach($faq_data as $index => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                            {{ $faq->title ?? '' }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ $faq->description ?? '' }}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var slug = "{{ $service->slug }}";

    var htmlContent = document.documentElement.outerHTML;

    $.ajax({
        url: '{{ route("save-html") }}',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            htmlContent: htmlContent,
            slug: slug
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
</script>
@endsection