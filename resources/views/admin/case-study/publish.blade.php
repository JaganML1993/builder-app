<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="php1">

  <title><?php echo $caseStudy->meta_title ?></title>
  <meta name="description" content="<?php echo $caseStudy->meta_description ?>" />
  <meta name="keywords" content="<?php echo $caseStudy->meta_keywords ?? ' ' ?>" />

  <!-- Facebook -->
  <meta property="og:title" content="<?php echo $caseStudy->meta_title ?>" />
  <meta property="og:description" content="<?php echo $caseStudy->meta_description ?>" />
  <meta property="og:image" content="{{ asset('storage/feature_images/' . $caseStudy->feature_image)  }}" />

  <!-- Twitter -->
  <meta name="twitter:title" content="<?php echo $caseStudy->meta_title ?>" />
  <meta name="twitter:description" content="<?php echo $caseStudy->meta_description ?>" />
  <meta name="twitter:image:src" content="{{ asset('storage/feature_images/' . $caseStudy->feature_image) }}" />
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
    <img src="<?php echo  asset('storage/banner_images/' . $caseStudy->banner_image)  ?>" class="img-fluid object-fit-cover" alt="<?php echo $caseStudy->banner_title ?>" title="<?php echo $caseStudy->banner_title ?>" />
    <div class="page-titles whitecolor text-center">
      <h1><?php echo $caseStudy->banner_title ?></h1>
      <p><?php echo $caseStudy->body_content ?></p>
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
                        <ol vocab="http://schema.org/" typeof="BreadcrumbList"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href=#><span property="name">{{ $caseStudy->slug ?? '' }}</span></a><meta property="position" content="1"></li>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $caseStudy->sub_service_slug ?? '' }}</span></a><meta property="position" content="2"></li>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="#"><span property="name">{{ $caseStudy->sub_sub_service_slug ??'' }}</span></a><meta property="position" content="3"></li></ol>
                    </div>
          <!-- BREADCRUMB ENDS -->

          @if(!empty($caseStudy->client_title))
          <h2><?php echo $caseStudy->client_title ?></h2>
          <p><?php echo $caseStudy->client_description ?></p>
          @endif

          @if(!empty($caseStudy->client_req_title))
          <h2><?php echo $caseStudy->client_req_title ?></h2>
          <p><?php echo $caseStudy->client_req_desc ?></p>
          @endif

          @if(!empty($caseStudy->business_title))
          <h2><?php echo $caseStudy->business_title ?></h2>
          <p><?php echo $caseStudy->business_desc ?></p>

          <ol>
            @foreach(json_decode($caseStudy->business_items) as $index => $item)
            <li><?php echo  $item  ?></li>
            <li><?php echo  $item  ?></li>
            @endforeach
          </ol>
          @endif

          @if(!empty($caseStudy->our_solution_title))
          <h2><?php echo $caseStudy->our_solution_title ?></h2>
          <p><?php echo $caseStudy->our_solution_desc ?></p>
          @endif

          @if(!empty($caseStudy->the_results_title))
          <h2><?php echo $caseStudy->the_results_title ?></h2>
          <p><?php echo $caseStudy->the_results_desc ?></p>
          @endif

          @if(!empty($caseStudy->out_source_title))
          <h2><?php echo $caseStudy->out_source_title ?></h2>
          <p><?php echo $caseStudy->out_source_desc ?></p>

          <p>Are you looking for a reliable and cost-effective rule engine development service provider? Then, look no further. <a href="/forms/itcontactform.php#top" id="btm_cut" onclick="document.getElementById('btm_cut').href='/forms/itcontactform.php?loc=EOP&url=php7&at=txt&ft=Global&cv=php8#top';">Get in touch with us</a> today!</p>
          <a href="/forms/itcontactform.php#top" id="btm_cub" onclick="document.getElementById('btm_cub').href='/forms/itcontactform.php?loc=EOP&url=php7&at=btn&ft=Global&cv=php8#top';" class="butn butn__new mt-4"><i class="fa-regular fa-user pr-2"></i><span class="px-2">Contact Us</span></a>
          <p class="zpnum">PN1152054</p>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- CASESTUDIES BLOCK ENDS -->
  <!-- BOTTOM BOX SECTION STARTS -->
  <meta name="php10">
  <!-- BOTTOM BOX SECTION STARTS -->

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body mx-auto text-center my-auto">
          <h2>The page is published</h2>
          <br>
          <p>Click below url to view the page</p>
          <br>
                    <a href="https://demo1.flatworldsolutions.com{{ $caseStudy->page_link }}.php" target="_blank">https://demo1.flatworldsolutions.com{{ $caseStudy->page_link }}.php</a>

    
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

  <!-- BOTTOM CONTACT FORM STARTS -->
  <meta name="php11">
  <!-- BOTTOM CONTACT FORM STARTS -->

  <!-- FOOTER STARTS -->
  <meta name="php12">
  <!-- FOOTER ENDS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>//script-start
    var slug = "<?php echo  $caseStudy->slug  ?>";

    var htmlContent = document.documentElement.outerHTML;

    $.ajax({
      url: '<?php echo  route("save-html-case-study")  ?>',
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
          window.location.href = '<?php echo  url("admin/case-study/index")  ?>';
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