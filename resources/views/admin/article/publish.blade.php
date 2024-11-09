<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="php1">

	<title><?php echo $article->meta_title ?></title>
	<meta name="description" content="<?php echo $article->meta_description ?>" />

	<!-- Facebook -->
	<meta property="og:title" content="<?php echo $article->meta_title ?>" />
	<meta property="og:description" content="<?php echo $article->meta_description ?>" />
  <meta property="og:image" content="{{ asset('storage/feature_images/' . $article->feature_image)  }}" />
  
  <meta name="Headline" content="<?php echo $article->meta_title ?>" />
  <meta name="datePubshiled" content="<?php echo $article->created_at ?>" />
  <meta name="image" content="<?php echo  asset('storage/banner_images/' . $article->banner_image)  ?>" />

	<!-- Twitter -->
	<meta name="twitter:title" content="<?php echo $article->meta_title ?>" />
	<meta name="twitter:description" content="<?php echo $article->meta_description ?>" />
  <meta name="twitter:image:src" content="{{ asset('storage/feature_images/' . $article->feature_image) }}" />
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

	<!-- H1 BANNER IMAGE STARTS -->
	<section id="bannerplain" data-wow-delay="300ms" class="wow fadeIn position-relative page-header parallax section-nav-smooth page-hgt">
		<img src="<?php echo  asset('storage/banner_images/' . $article->banner_image)  ?>" class="img-fluid object-fit-cover" alt="<?php echo $article->banner_title ?>" title="<?php echo $article->banner_title ?>" />
		<div class="page-titles whitecolor text-center">
			<h1><?php echo $article->banner_title ?></h1>
			<p><?php echo $article->body_content ?></p>
		</div>
	</section>
	<!-- H1 BANNER IMAGE ENDS -->

	<!-- TOP SMALL FORM STARTS -->
	<section id="smallFormInnerPage">
		<meta name="php5">
	</section>
	<!-- TOP SMALL FORM ENDS -->


	<!-- CASESTUDIES BLOCK STARTS -->
	<section id="caseStudies">
		<div class="container p-lg-0 p-md-0">
			<div class="row">
				<div class="col-md-12">

					<!-- BREADCRUMB STARTS -->
				 <div class="breadcrumbs mb-0">
                        <ol vocab="http://schema.org/" typeof="BreadcrumbList"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href=#><span property="name">{{ $article->slug ?? '' }}</span></a><meta property="position" content="1"></li>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $article->sub_service_slug ?? '' }}</span></a><meta property="position" content="2"></li>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $article->sub_sub_service_slug ??'' }}</span></a><meta property="position" content="3"></li></ol>
                    </div>
					<!-- BREADCRUMB ENDS -->

					<p>A smooth patient registration process is a crucial element of quality healthcare delivery. It sets the tone for the patient's experience and helps healthcare providers capture vital information necessary for effective patient management. However, this process can often be time-consuming, frustrating, and prone to errors, leading to a negative experience for both patients and healthcare providers.
					</p>
					<p>The patient registration process is an integral part of the patient's journey that can influence their overall experience. </p>

					<p>Innovative patient registration services are increasingly becoming a necessity rather than an option, offering solutions that streamline the entire process, improving efficiency and patient satisfaction. As a part of this digital transformation, patient registration consulting services assist healthcare providers in adopting these advancements effectively. This article delves into the realm of digital patient registration services, highlighting the significant role of AI in patient registration services, and presents six key strategies to revolutionize this crucial aspect of healthcare delivery. </p>

					@if(!empty($article->reimage_title))
					<h2><?php echo $article->reimage_title ?> </h2>
					<p><?php echo $article->reimage_desc ?></p>
					@endif

					@if(!empty($article->reimage_items))
					<ul>
						@foreach(json_decode($article->reimage_items) as $index => $item)
						<li>
							<h3><?php echo $item->title ?> </h3>
							<p><?php echo $item->description ?></p>
						</li>
						@endforeach

						<?php echo  $article->reimage_para ?? '' ?>
					</ul>
					@endif

					@if(!empty($article->regis_title))
					<h2><?php echo $article->regis_title ?>
					</h2>
					<p><?php echo $article->regis_desc ?></p>
					@endif

					@if(!empty($article->regis_items))
					<ul>
						@foreach(json_decode($article->regis_items) as $index => $item)
						<li>
							<h3><?php echo $item->title ?> </h3>
							<p><?php echo  $item->description  ?></p>
						</li>
						@endforeach
					</ul>
					@endif

					@if(!empty($article->digital_title))
					<h2><?php echo $article->digital_title ?>
					</h2>

					<p><?php echo $article->digital_desc ?></p>

					@if(!empty($article->regis_items))
					<ul>
						@foreach(json_decode($article->regis_items) as $index => $item)
						<li>
							<h3><?php echo  $item->title  ?></h3>
							<p><?php echo  $item->description  ?> </p>
						</li>
						@endforeach

						<p><?php echo $article->digital_para ?>
						</p>

					</ul>
					@endif
					@endif

					<a href="/forms/healthcarecontactform.php?loc=EOP&url=online-medical-billing-services&at=btn&ft=Global&cv=Healthcare-ServicePage" \l "top" id="btm_cub" onclick="document.getElementById('btm_cub').href='/forms/engineeringcontactform.php?loc=EOP&url=php7&at=btn&ft=Global&cv=php8#top';" class="butn butn__new mt-4"><i class="fa-regular fa-user pr-2"></i><span class="px-2">Contact Us</span></a>
				</div>
			</div>
		</div>
	</section>
	<!-- CASESTUDIES BLOCK ENDS -->
	<!-- BOTTOM BOX SECTION STARTS -->
	<meta name="php10">
	<!-- BOTTOM BOX SECTION STARTS -->

	@if(!empty($article->faq_main_title))
	<section class="faqs-page">
		<div class="container">
			<div class="row">
				<h2 class="faqs-page-head"><?php echo $article->faq_main_title ?></h2>
				<div class="accordion" id="accordionExample">
					@if(!empty($article->faqs))
					@foreach(json_decode($article->faqs) as $index => $item)
					<div class="accordion-item">
						<h2 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo  $item->title  ?>
							</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
							<div class="accordion-body"><?php echo  $item->description  ?>
							</div>
						</div>
					</div>
					@endforeach
					@endif

				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- BOTTOM CONTACT FORM STARTS -->
	<meta name="php11">
	<!-- BOTTOM CONTACT FORM STARTS -->
  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		{{-- <div class="modal-header">
		  <h5 class="modal-title" id="successModalLabel">Success</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div> --}}
		<div class="modal-body mx-auto text-center my-auto">
		  <h2>The page is published</h2>
		  <br>
		  <p>Click below url to view the page</p>
		  <br>
		   <a href="https://demo1.flatworldsolutions.com{{ $article->page_link }}.php" target="_blank">https://demo1.flatworldsolutions.com{{ $article->page_link }}.php</a>

    
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
		  <h5 class="modal-title" id="errorModalLabel">Error</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  Something went wrong. Please try again.
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
  </div>
	<!-- FOOTER STARTS -->
	<meta name="php12">
	<!-- FOOTER ENDS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>//script-start
		var slug = "<?php echo  $article->slug  ?>";

		var htmlContent = document.documentElement.outerHTML;

		$.ajax({
			url: '<?php echo  route("save-html-article")  ?>',
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': '<?php echo  csrf_token()  ?>' // Directly provide the CSRF token here
			},
			data: {
				htmlContent: htmlContent,
				slug: slug
			},
			success: function(response) {
				$('#successModal').modal('show');
                $('#successModalButton').on('click', function() {
				  window.location.href = '<?php echo  url("admin/article/index")  ?>';
			    });	
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('something went wrong');
			}
		});

	//script-end</script>
</body>

</html>