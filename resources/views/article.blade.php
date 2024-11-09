@extends('inc.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('title', $article->meta_title)
@section('meta_keywords', $article->meta_keywords)
@section('meta_description', $article->meta_description)
@section('feature_image', $article->meta_description)

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<style>
    

    h2 {
    color: #b70000 !important;
}

 ol{
    list-style-type: decimal !important;
}


li::before{
    background: url(https://www.flatworldsolutions.com/images/icons/12.svg) 0 0/15px no-repeat;
    content: "";
    width: 25px;
    height: 100%;
    position: absolute;
    left: 0;
    background-position-y: top;
    top: 2px;
}


</style>

@include('inc.header')

    <!-- H1 BANNER IMAGE STARTS -->
    <section id="bannerplain" data-wow-delay="300ms" class="wow fadeIn position-relative page-header parallax section-nav-smooth page-hgt">
        <img src="{{ asset('storage/banner_images/' . $article->banner_image) }}" class="img-fluid object-fit-cover" alt="Answering Services" title="Answering Services" />
        <div class="page-titles whitecolor text-center">
            <h1>{{ $article->banner_title ?? '' }}</h1>
        <div>{{ $article->banner_description ?? '' }}</div>
        
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
                    <ol vocab="http://schema.org/" typeof="BreadcrumbList"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="/"><span property="name">Outsource Services Home</span></a><meta property="position" content="1"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="/healthcare/"><span property="name">Healthcare</span></a><meta property="position" content="2"></li><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="<?php echo $BreadcrumbCPL;?>"><span property="name">Articles - Revolutionizing Healthcare 6 Ways to Improve the Patient Registration Process</span></a><meta property="position" content="3"></li></ol>
                </div> --}}
                <!-- BREADCRUMB ENDS -->
    
    <div>{!! $article->body_content !!}</div>
    <h2>{{ $article->reimage_title }}  </h2>
    <p>{{ $article->reimage_desc }} </p>
    
    <ul>

        @php
            $reimage_items = json_decode($article->reimage_items);
        @endphp
    
        @if (isset($reimage_items) && count($reimage_items) > 0)
            @foreach ($reimage_items as $item)       
                <li>
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->description }} </p>
                </li>
            @endforeach    
        @endif
        {{ $article->reimage_para ?? ''}}
 
    </ul>
    
    <h2>{{ $article->regis_title }}  </h2>
    <p>{{ $article->regis_desc }} </p>

    <ul>

        @php
            $regis_items = json_decode($article->regis_items);
        @endphp
    
        @if (isset($regis_items) && count($regis_items) > 0)
            @foreach ($regis_items as $item)       
                <li>
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->description }} </p>
                </li>
            @endforeach    
        @endif
 
    </ul>
    
    <h2>{{ $article->digital_title }}  </h2>
    <p>{{ $article->digital_desc }} </p>

    <ul>

        @php
            $digital_items = json_decode($article->digital_items);
        @endphp
    
        @if (isset($digital_items) && count($digital_items) > 0)
            @foreach ($digital_items as $item)       
                <li>
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->description }} </p>
                </li>
            @endforeach    
        @endif
    
    <p>{{ $article->digital_para ?? ''}}   </p>
    
    </ul>
    
                {{-- <a href="/forms/healthcarecontactform.php?loc=EOP&url=online-medical-billing-services&at=btn&ft=Global&cv=Healthcare-ServicePage" \l "top" id="btm_cub" onclick="document.getElementById('btm_cub').href='/forms/engineeringcontactform.php?loc=EOP&url=<?php echo $tagpath;?>&at=btn&ft=Global&cv=<?php echo $GAPageLevelVar;?>#top';" class="butn butn__new mt-4"><i class="fa-regular fa-user pr-2"></i><span class="px-2">Contact Us</span></a> --}}
        </div>
        </div>
    </div>
    </section>
    <!-- CASESTUDIES BLOCK ENDS -->


    <section class="faqs-page">
        <div class="container">
            <div class="row">
                <h2 class="faqs-page-head">FAQs</h2>
                <div class="accordion" id="accordionExample">
                    @if(isset($faq_data))
                    @foreach($faq_data as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                {{ $faq->title }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ $faq->description }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="faqs-page">
					<div class="container">
						<div class="row">
							<h2 class="faqs-page-head">FAQs</h2>
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How can technology be used to improve the patient registration process? 
                          </button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
										<div class="accordion-body">Technology can be a significant change in improving the patient registration process. It enables automation of manual tasks, reduces paperwork, and enhances data accuracy. Digital tools like EHRs, mobile apps, and self-service kiosks can streamline the process, resulting in a more efficient and less frustrating experience for both patients and staff. 
                         </div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How can standardizing the registration process improve patient experience?</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
										<div class="accordion-body">Standardizing the registration process can significantly improve the patient's experience by creating a predictable and hassle-free process. It ensures that all necessary information is collected consistently, reducing the likelihood of errors and miscommunications. Moreover, it can help streamline workflows and save time, leading to increased patient satisfaction. </div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Why is training staff important in improving the patient registration process?</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
										<div class="accordion-body">Staff training is crucial in improving the patient registration process as it ensures that all staff members are equipped with the necessary skills and knowledge to handle the process efficiently. Trained staff can accurately capture patient information, identify and rectify errors, and provide a better service to patients. 
 
</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How can pre-registration improve the patient registration process?  
</button>
									</h2>
									<div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
										<div class="accordion-body">Pre-registration allows patients to complete their registration at their own convenience, reducing their waiting time at the healthcare facility. It also gives healthcare providers the chance to review and verify the information beforehand, thereby making the actual visit more efficient</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How are errors reduced in the patient registration process? 
</button>
									</h2>
									<div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
										<div class="accordion-body">Errors in the patient registration process can be reduced by implementing digital tools that automatically check for missing or inconsistent information, by standardizing the process to ensure consistency, and through regular staff training to enhance data capturing skills. </div>
									</div>
								</div>
								
							</div>
						</div>
					</div>  
				</section> --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var slug = "{{ $article->slug }}";
    
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