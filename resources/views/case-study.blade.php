@extends('inc.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('title', $study->meta_title)
@section('meta_keywords', $study->meta_keywords)
@section('meta_description', $study->meta_description)

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<style>
    

    h2 {
    color: #b70000 !important;
}

 ol{
    list-style-type: decimal !important;
}



</style>

@include('inc.header')

    <!-- H1 BANNER IMAGE STARTS -->
    <section id="bannerplain" data-wow-delay="300ms" class="wow fadeIn position-relative page-header parallax section-nav-smooth page-hgt">
        <img src="{{ asset('storage/banner_images/' . $study->banner_image) }}" class="img-fluid object-fit-cover" alt="Answering Services" title="Answering Services" />
        <div class="page-titles whitecolor text-center">
            <h1>{{ $study->banner_title ?? '' }}</h1>
        <div>{{ $study->banner_description ?? '' }}</div>
        
        </div>
    </section>
    <!-- H1 BANNER IMAGE ENDS -->

    
<!-- CASESTUDIES BLOCK STARTS -->
<section id="caseStudies">
    <div class="container p-lg-0 p-md-0">
        <div class="row">	
            <div class="col-md-12">
                
                <!-- BREADCRUMB STARTS -->
                {{-- <div class="breadcrumbs mb-0">
                    <ol vocab="http://schema.org/" typeof="BreadcrumbList"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="/"><span property="name">Outsource Services Home</span></a><meta property="position" content="1"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="/IT-services/"><span property="name">Software Development</span></a><meta property="position" content="2"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="/IT-services/case-studies.php"><span property="name">Case Studies</span></a><meta property="position" content="3"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="<?php echo $BreadcrumbCPL;?>"><span property="name">Case Study on Development of Rule Engine for a US-based Firm</span></a><meta property="position" content="4"></li></ol>
                </div> --}}
                <!-- BREADCRUMB ENDS -->
    
                    <h2>{{ $study->client_title ?? '' }}</h2>
                    <p>{{ $study->client_description ?? ''}}</p>
                    
                    <h2>{{ $study->client_req_title ?? ''}}</h2>
                    <p>{{ $study->client_req_desc ?? ''}}</p>
                    
                    <h2>{{ $study->business_title ?? ''}}</h2>
                    <p>{{ $study->business_desc ?? ''}}</p>
                    @php
                        $business_items = json_decode($study->business_items);
                    @endphp
               
                    @if (isset($business_items) && count($business_items) > 0)
                        <ol>
                            @foreach ($business_items as $item)                                
                            <li>{{ $item }}</li>
                            @endforeach
                        </ol>
                    @endif
                    
                    <h2>{{ $study->our_solution_title ?? ''}}</h2>
                    <p>{{ $study->our_solution_desc ?? ''}}</p>
                    
                    <h2>{{ $study->the_results_title ?? ''}}</h2>
                    <p>{{ $study->the_results_desc ?? ''}}</p>
                    
                    <h2>{{ $study->out_source_title ?? ''}}</h2>
                    {!! $study->out_source_desc??'' !!}
                    
    {{-- <p>Are you looking for a reliable and cost-effective rule engine development service provider? Then, look no further. <a href="/forms/itcontactform.php#top" id="btm_cut" onclick="document.getElementById('btm_cut').href='/forms/itcontactform.php?loc=EOP&url=<?php echo $tagpath;?>&at=txt&ft=Global&cv=<?php echo $GAPageLevelVar;?>#top';">Get in touch with us</a> today!</p> --}}
                {{-- <a href="/forms/itcontactform.php#top" id="btm_cub" onclick="document.getElementById('btm_cub').href='/forms/itcontactform.php?loc=EOP&url=<?php echo $tagpath;?>&at=btn&ft=Global&cv=<?php echo $GAPageLevelVar;?>#top';" class="butn butn__new mt-4"><i class="fa-regular fa-user pr-2"></i><span class="px-2">Contact Us</span></a> --}}
                        <p class="zpnum">PN1152054</p>
            </div>
        </div>
    </div>
    </section>
    <!-- CASESTUDIES BLOCK ENDS -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var slug = "{{ $study->slug }}";
    
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