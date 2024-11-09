</main>

<?php
if($group_name == "Mortgage") {?>
<section id="mortgage-disclaimer-footer">
	<div class="container">
      <div class="row py-3  align-items-center">
          <div class="col-md-7">
        	  <p><b>Disclaimer:</b> This site is not authorized by the New York State Department of Financial Services. No mortgage solicitation activity or loan applications for properties located in the State of New York can be facilitated through this site. Any contact information on the website is not for use by New York borrowers.</p>		
          </div> 
          <div class="col-md-5 text-end">
            <span>All loans placed through 3rd party lenders.</span>
        </div>  
	</div>
</section>
<?php } ?>
<footer>
  <section class="d-flex" id="footer">
    <div class="container"> 
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-md-4 mb-0">
          <a href="/" class="col-md-3 d-flex link-dark text-decoration-none">
            <img src="https://www.flatworldsolutions.com/images/fws-logo-white.webp" class="logo-footer" alt="">
          </a>

          <ul class="nav footer-nav col-md-9 justify-content-start">
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/sitemap.php" class="nav-link px-2">Sitemap</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/customer-testimonials.php" class="nav-link px-2">Testimonials</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/success-stories/" class="nav-link px-2">Success Stories</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/faqs-on-outsourcing.php" class="nav-link px-2">FAQs</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/articles/" class="nav-link px-2">Resources</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/infographics/" class="nav-link px-2">Infographics</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/videos.php" class="nav-link px-2">Videos</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/events/" class="nav-link px-2">Events</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/careers/" class="nav-link px-2">Careers</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/forms/partners.php#top" class="nav-link px-2">Partners</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/terms-of-use.php" class="nav-link px-2">Terms of Use</a></li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/privacy.php" class="nav-link px-2">Privacy Statement</a></li>
            <li class="nav-item"><a href="<?php echo $contact_page_url; ?>#top" id="footer_cut" onclick="document.getElementById('footer_cut').href='<?php echo $contact_page_url; ?>loc=FooterNav&amp;url=<?php echo $tagpath;?>&amp;at=txt&amp;ft=Global&amp;cv=<?php echo $GAPageLevelVar;?>#top';" class="nav-link px-2">Contact Us</a></li>
          </ul>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-2 my-2">
          <div class="col-md-3 mb-3">
            <span class="social-media-text ms-2">Follow Us On</span>  
            <ul class="list-unstyled d-flex social-media-icons">
              <li class="ms-2"><a href="https://www.linkedin.com/company/flatworld-solutions" class="link-dark" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <li class="ms-2"><a href="https://www.facebook.com/FlatworldSolution" class="link-dark" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li class="ms-2"><a href="https://twitter.com/flatworldsols" class="link-dark" target="_blank"><img src="https://www.flatworldsolutions.com/images/icons/twitter-x.png" alt="Twitter" style="width: 57%;"></a></li>
			  <li class="ms-2"><a href="https://www.youtube.com/c/Flatworldsolutions" class="link-dark" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
			  <li class="ms-2">
				<a href="https://www.instagram.com/flatworldsolutions/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
			  </li>
            </ul>           
          </div>           
          <div class="col-md-5 col-sm-12 mb-3 d-inline-flex">
              <div class="row">
                <div class="col-md-10">
                    <p class="footer-note">The information on this website cannot be commercially used without the prior consent of Flatworld Solutions Inc.</p>
                </div>
                <div class="col-md-10">
                   <p class="copyright">&copy; 2024 Flatworld Solutions Inc. All Rights Reserved.</p>
                </div>   
              </div>  
          </div>
          <div class="col-md-4 mb-3 col-sm-12 d-inline-flex">
            <p class="footer-note"><p class="footer-note">Third-party logos displayed on the website are not owned by us, and are displayed only for representation purpose. The ownership and copyright of Logos belong to their respective organizations.</p></p>
          </div>
        </div>
   </div>
</section>
</footer>

<script src="https://www.flatworldsolutions.com/js/bootstrap.bundle.min.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://www.flatworldsolutions.com/js/jquery-3.4.1.min.js"></script>
<!--to view items on reach-->
<script src="https://www.flatworldsolutions.com/js/jquery.appear.js"></script>


<!-- Add fancyBox main JS and CSS files -->
 <script src="https://cdn.jsdelivr.net/npm/fancybox@3.0.1/dist/js/jquery.fancybox.min.js
 "></script>

 <script type="text/javascript">
  $(document).ready(function() {
   /*
    *  Button helper. Disable animations, hide close button, change title type and content
    */

   $('.fancybox-buttons').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none',

    prevEffect : true,
    nextEffect : true,

    closeBtn  : false,

    helpers : {
     title : {
      type : 'inside',
      position: 'top'
     },
     buttons : {


     }
    },

    afterLoad : function() {
     this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
    }
   });
  });
 </script>

<!-- condition for multiple file upload functionality -->

<script src="https://www.flatworldsolutions.com/js/jquery.MultiFile.js?ver=19.09.2023"></script>


<!-- GRT Youtube Popup -->
<script src="https://www.flatworldsolutions.com/js/grt-youtube-popup.js?ver=19.09.2023"></script>
<script>
	// Demo video 1
	$(".youtube-link").grtyoutube({
		autoPlay:true,
		theme: "dark"
	});

	// Demo video 2
	$(".youtube-link-dark").grtyoutube({
		autoPlay:false,
		theme: "dark"
	});
</script>

   <script>
    $('.toggle').click(function(){
    $('.nav').toggleClass("justify-content-end");
    $('.toggle').toggleClass("text-light");
    $('.toggle i').toggleClass("rotate-icon");    
    });
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

$(window).scroll(function() {    
    var scroll = $(window).scrollTop(); 

    if (scroll >= 50) {
        //$("#subHeaderSection").addClass("top0");
    }
    else  if (scroll <= 50) {
      //$("#subHeaderSection").removeClass("top0");
      
    }
});

$("#subHeaderSection .navbar-toggler").click(function(){
 $(this).toggleClass("rotate-icon");
});

var btn = $('.btn');

   </script>   

<script>
  var slideIndex = 1;
  showDivs(slideIndex);
  
  function plusDivs(n) {
    showDivs(slideIndex += n);
  }
  
  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
  }
  
  var slideIndexRes = 1;
  showDivsRes(slideIndexRes);  
  function plusDivsRes(n) {
    showDivsRes(slideIndexRes += n);
  }
  
  function showDivsRes(n) {
    var i;
    var x = document.getElementsByClassName("mySlidesRes");
    if (n > x.length) {slideIndexRes = 1}
    if (n < 1) {slideIndexRes = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    x[slideIndexRes-1].style.display = "block";  
  }
  
  </script>

<!-- SHOW/HIDE MORE SERVICES - START -->

	<script>
		$(".show-hide").hide();
		$(".more-services-btn").click(function () {
	    	$header = $(this);
	    	//getting the next element
	    	$content = $header.next();
	    	//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
	    	$content.slideToggle(1000, function () {
	    	});
		});
	</script>
	<script type="text/javascript">
		$('.togglefaq').click(function(event) {
			event.preventDefault();
			var notthis = $('.active').not(this);
			//notthis.find('.icon-minus').addClass('icon-plus').removeClass('icon-minus');
			notthis.toggleClass('active').next('.faqanswer').slideToggle(300);
		 	$(this).toggleClass('active').next().slideToggle("slow");
			$(this).children('i').toggleClass('icon-plus icon-minus');
		});
	</script>
	<!-- SHOW/HIDE MORE SERVICES - END -->
<script>
	$('.moreless-button').click(function() {
	$('.moretext').slideToggle();
	if ($('.moreless-button').text() == "View more services") {
		$(this).text("View less");
	} else {
		$(this).text("View more services");
	}
	});	
</script>




<!-- INTERNAL SEARCH CODE -->
<?php if((
	$group_name == "ES_Eng" || 
	$group_name == "ES_CSA" || 
	$group_name == "ES_Mech" || 
	$group_name == "Call_Center" ||	
	$group_name == "General_Pages" || 
	$group_name == "Creative" ||
	$group_name == "Software" ||
	$group_name == "InsuranceBPO" ||
	$group_name == "Photo_Editing" ||
$path == "/digital-photography/sample-gallery.php" || $path == "/digital-photography/default.php" || $path == "/about-fws/partnership-with-yuvalok-foundation-uandi-for-covid-19-relief.php" || $path == "/engineering/sample-gallery.php" || $path == "/creative-services/default.php" ||
	$path == "/creative-services/default.php" || 
	$path == "/digital-photography/default.php" || 
	$path == "/creative-services/desktop-publishing-services.php" || 
	$path == "/creative-services/adobe-indesign-services.php" || 
	$path == "/creative-services/logo-design-services.php" || 
	$path == "/creative-services/cover-design-services.php" || 
	$path == "/creative-services/graphic-design-services.php" || 
	$path == "/creative-services/illustration-services.php" || 
	$path == "/creative-services/" ||
	$path == "/creative-services/magazine-layout-services.php" ||
	$path == "/creative-services/animation-services.php" ||
	$path == "/digital-photography/color-cast-removal-services.php" || 
	$path == "/digital-photography/sky-replacement-services.php" || 
	$path == "/digital-photography/still-image-enhancement-services.php" || 
	$path == "/digital-photography/image-blending.php" || 
	$path == "/digital-photography/perspective-correction-services.php" || 
	$path == "/digital-photography/photo-clipping-services.php" || 
	$path == "/digital-photography/photo-manipulation-services.php" || 
	$path == "/digital-photography/image-enhancement.php" ||
	$path == "/digital-photography/raw-images-conversion.php" || 
	$path == "/digital-photography/virtual-staging-solutions.php" || 
	$path == "/digital-photography/3d-floor-plan-conversion-services.php" || 
	$path == "/creative-services/artwork-services.php" || 
	$path == "/creative-services/magazine-layout-services.php" || 
	$path == "/digital-photography/airbrushing-services.php" || 
	$path == "/digital-photography/wedding-photography-post-processing.php" || 
	$path == "/digital-photography/background-removal-services.php" || 
	$path == "/digital-photography/black-white-portrait-enhancement.php" || 
	$path == "/digital-photography/clipping-path.php" || 
	$path == "/digital-photography/photo-color-correction-services.php" || 
	$path == "/digital-photography/image-stitching.php" || 
	$path == "/digital-photography/photo-restoration-services.php" || 
	$path == "/digital-photography/image-retouching-services.php" || 
	$path == "/digital-photography/portrait-enhancement-services.php" || 
	$path == "/digital-photography/image-masking-services.php" || 
	$path == "/digital-photography/color-conversion-services.php" || 
	$path == "/digital-photography/sepia-portrait-enhancement.php" || 
	$path == "/digital-photography/density-color-correction.php" ||
	$path == "/digital-photography/food-photo-clipping-services.php" ||
	$path == "/IT-services/case-studies/ecommerce-website-socks-manufacturer.php" ||
	$page == "opencart-ecommerce-website-boat-manufacturer" || 
	$page == "iPad-app-development" || 
	$page == "3d-furniture-modeling" || 
	$page == "ecommerce-website-for-australian-manufacturer" || 
	$page == "data-visualization-services" || 
	$page == "iPhone-mobile-app" || 
	$page == "taxi-booking-app" || 
	$page == "business-intelligence-dashboard-creation" || 
	$page == "dashboard-creation-services" ||
	$page == "mobile-responder-trigger-web-app" ||
	$path == "/digital-photography/photo-correction-services.php" || $path == "/healthcare/impact-analysis-software.php" || $path == "/about-fws/christmas-dream-kit-distribution-in-phillippines.php" ||  $sub_group_name == "Bookkeeping_Services" || $path == "/about-fws/partnership-with-yuvalok-foundation-uandi-for-covid-19-relief.php" || $sub_group_name == "Accounting_Services" || $sub_group_name == "Accounts_Payable_Services" || $sub_group_name == "Accounts_Receivable_Services" || $sub_group_name == "Tax_Preparation" || $page == "call-center-outsourcing-partner" || $page == "800-answering-services" || $page == "phone-answering-services" || $path == "/research-analysis/syndicated-research-report-services.php" || $path == "/about-fws/flatworld-partners-with-uandi.php")  && ($path != "/default.php") && ($path != "/call-center/default.php" && $path != "/research-analysis/default.php" && $path != "/financial-services/default.php" && $path != "/data-management/default.php" && $path !="/IT-services/default.php" && $path !="/healthcare/default.php" && $path !="/mortgage/default.php" && $path !="/insurance-bpo/default.php" && $path !="/transcription/default.php" && $path !="/legal-services/default.php" && $path !="/translation/default.php" && $path !="/virtual-executive-assistant/default.php" && $path != "/webanalytics/default.php" && $path != "/reo-services/default.php" && $path != "/customs-brokerage/default.php" && $path != "/logistics/default.php" && $path !="/data-science/default.php" && $path != "/default.php" && $path != "/view-our-services.php" && $path != "/forms/contactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/ra_contactform.php" && $path != "/forms/engineeringcontactform.php" && $path != "/forms/mechanical.php" && $path != "/forms/financial_contactform.php" && $path != "/forms/dmcontactform.php" && $path != "/forms/itcontactform.php" && $path != "/forms/creative-service.php" && $path != "/forms/digital-photography-contactform.php" && $path != "/forms/insurance.php" && $path != "/forms/transcription.php" && $path != "/forms/legal-services.php" && $path != "/forms/translation.php" && $path != "/forms/healthcarecontactform.php" && $path != "/forms/mortgagecontactform.php" && $path != "/forms/virtual-assistant.php" && $path != "/forms/webanalytics.php" && $path != "/forms/reo-services.php" && $path != "/forms/brokerage-contactform.php" && $path != "/forms/partners.php" && $path !="/forms/data-science-services.php")){ ?>
<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/js/jquery.fancybox.pack.js?v=2.1.6"></script>


	<!-- Add Button helper (this is optional) -->

	<script type="text/javascript" src="/js/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<script type="text/javascript">
		$(document).ready(function() {
	
			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				//openEffect  : 'none',
				//closeEffect : 'none',

				prevEffect : true,
				nextEffect : true,

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside',
						position: 'top'
					},
					buttons	: {
						
						
					}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
		});
	</script>
<?php } ?>	

<?php
if ($path != "/careers/forms/apply.php"){
?>
<script>

	window.onsubmit=function() { 
	//document.getElementById("form1").submit(); // using ID 
	var div = document.createElement('div');
	//var img = document.createElement('img');
	div.innerHTML = "<span style='padding:20px 40px;background:rgba(0,0,0,0.8);display:inline-block;width:auto;color:#ffffff;font-size:1.2rem;border-radius:0px'><img src='/images/ajax-load.gif' alt='' /><br />Please wait...</span>";
	div.style.cssText = 'position: fixed; left: 50%; top: 40%; transform: translate(-50%, -50%);z-index: 5000; width: 100%; padding:20px; text-align: center; background:rgba(255,255,255,0.5); color:#ffffff; font-weight:bold;z-index:99999;opacity:1;font-size:1.5rem;height:100%;padding-top:40%';
	//div.appendChild(img);
	document.body.appendChild(div);
	return true;	
	}

</script>
<?php } ?>
<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$domain = $_SERVER['HTTP_HOST'];
$imagePath = '/images/scrolltotop.png'; // Replace with the actual path to the image file on the server

// Combine the protocol, domain, and image path
$imageUrl = $protocol . $domain . $imagePath;
?>


<!-- SHOW ONLY ON ONLINE FWS WEBSITE  -->
	<?php if ($_SERVER["HTTP_HOST"] == "www.flatworldsolutions.com" ||  $_SERVER["HTTP_HOST"] == "flatworldsolutions.com" || $_SERVER["HTTP_HOST"] == "flatworldsolutionslocal") { ?>

		<!-- START: LIVECHAT CODE -->		
		<?php
		//echo "CCode:".$country_code;
		$GetCountryCodeLC = "";
		if (isset($_COOKIE["CountryCode"])){
			$GetCountryCodeLC = $_COOKIE["CountryCode"];
		}else{
			$GetCountryCodeLC = $country_code;
		}
		//echo "Country Code:" . $GetCountryCodeLC;
		?>
		<?php 
			if($GetCountryCodeLC != "IN"){			
		?>

		<script>
		//	var myVar;

	//window.onload = function myFunction() {
	  //myVar = setTimeout(alertFunc, 20000);
	//}

	//function alertFunc() {
	  //alert("Hello!");

		window.__lc = window.__lc || {};
		window.__lc.license = 7553141;
		window.__lc.chat_between_groups = false; // This is made to false, to have multiple chat groups		
		window.__lc.group = 2; // LiveChatInc Group ID 2 is "FWS team" Group		
		window.__lc.ga_version = "ga";

		;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
		
		/*(function() {
			var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
			lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
		})();*/

		var LC_API = LC_API || {};
		LC_API.on_after_load = function () {
			var x = document.cookie;
			var ga_raw = getCookie('_ga');
			let ga = ga_raw.slice(6);
			var LCUTMCheck = getCookie('UTMCheck');
			//var LCExitPopUp = getCookie('ExitPopUp');
			var custom_variables = [
				{ name: 'MMLID', value: ga },
				{ name: 'UTMCHECK', value: LCUTMCheck }
				//{ name: 'EXITPOPUP', value: LCExitPopUp }
			];
			LC_API.set_custom_variables(custom_variables);
		};		
		//LIVE CHAT CODE HERE
//}
		</script>	
		<?php } ?>
		<!-- END: LIVECHAT CODE -->

	<?php } ?>

<?php if(($DeviceType == "AllDevices" || $DeviceType == "computer" || $DeviceType == "tablet" && $DeviceType != "phone") &&  ($path != "/call-center/default.php" && $path != "/research-analysis/default.php" && $path != "/engineering/default.php" && $path != "/financial-services/default.php" && $path != "/data-management/default.php" && $path !="/IT-services/default.php" && $path !="/creative-services/default.php" && $path !="/digital-photography/default.php" && $path !="/healthcare/default.php" && $path !="/mortgage/default.php" && $path !="/insurance-bpo/default.php" && $path !="/transcription/default.php" && $path !="/legal-services/default.php" && $path !="/translation/default.php" && $path !="/virtual-executive-assistant/default.php" && $path != "/webanalytics/default.php" && $path != "/reo-services/default.php" && $path != "/customs-brokerage/default.php" && $path != "/logistics/default.php" && $path != "/default.php" && $path != "/view-our-services.php" && $path !="/data-science/" && $path != "/forms/contactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/ra_contactform.php" && $path != "/forms/engineeringcontactform.php" && $path != "/forms/mechanical.php" && $path != "/forms/financial_contactform.php" && $path != "/forms/dmcontactform.php" && $path != "/forms/itcontactform.php" && $path != "/forms/creative-service.php" && $path != "/forms/digital-photography-contactform.php" && $path != "/forms/insurance.php" && $path != "/forms/transcription.php" && $path != "/forms/legal-services.php" && $path != "/forms/translation.php" && $path != "/forms/healthcarecontactform.php" && $path != "/forms/mortgagecontactform.php" && $path != "/forms/virtual-assistant.php" && $path != "/forms/webanalytics.php" && $path != "/forms/reo-services.php" && $path != "/forms/brokerage-contactform.php" && $path != "/forms/partners.php" && $path !="/digital-photography/real-estate-image-post-processing.php" && $path != "/digital-photography/articles/emerging-photography-trends.php" && $path != "/digital-photography/articles/types-of-photo-editing-software.php" && $path != "/research-analysis/market-research-services.php " && $path != "/call-center/cold-calling-services.php" )) { ?>

<script src="https://www.flatworldsolutions.com/js/jquery.tinycarousel.js"></script>
<script>$(document).ready(function(){	
$("#inpage-clients-logos-slider").tinycarousel({bullets:true})});</script>
<?php } ?>

  <!-- SMALL FORM VALIDATION STARTS -->
<!--<script src="<?php //echo $cdn_path;?>/js/form-validations.js"></script>-->
<script>
function validRequired(formField,fieldLabel){var result = true;if (formField.value == ""){alert('Please enter your' + fieldLabel);formField.focus();formField.style.background = "";result = false;}else{formField.style.background = "";}return result;}

function allDigits(str){return inValidCharSet(str,"0123456789"); }

function inValidCharSet(str,charset){ var result = true;for (var i=0;i<str.length;i++)if (charset.indexOf(str.substr(i,1))<0){result = false;break;}return result;}

function validNum(formField,fieldLabel,required){var result = true;if (required && !validRequired(formField,fieldLabel)) result = false; if (result){if (!allDigits(formField.value)){	alert('Please enter a number for the "' + fieldLabel +'" field.'); formField.focus(); result = false; }}return result;}

function validInt(formField,fieldLabel,required){ var result = true;if (required && !validRequired(formField,fieldLabel))result = false; if (result){var num = parseInt(formField.value,10);if (isNaN(num)){ alert('Please enter a valid telephone number.'); formField.focus(); result = false; }}return result;}

function validString(formField,fieldLabel,required){var result = true;if (required && !validRequired(formField,fieldLabel))result = false;  if (result){var num = parseInt(formField.value,10);if (!isNaN(num)){alert('Please enter a valid' + fieldLabel);formField.focus();result = false;}} return result;}

function validDrop(formField,fieldLabel){var result = true;if (formField.selectedIndex == 0) {alert('Please select your ' + fieldLabel);result = false;	};return result;}

function validCheck(formField,fieldLabel){var result = true;if (formField.Checked) {alert('Please select your "' + fieldLabel +'" menu.');result = false;	};return result;}

function validRadio(formField,fieldLabel){var result = false;for(var i = 0; i < formField.length; i++) {if (formField[i].checked){result = true;}}if (!result){alert('Please select your "' + fieldLabel +'" menu.');result = false;}return result;}

function validDate(formField,fieldLabel,required){var result = true;if (required && !validRequired(formField,fieldLabel))result = false; if (result){var elems = formField.value.split("/");result = (elems.length == 3);if (result){var month = parseInt(elems[0],10);var day = parseInt(elems[1],10);var year = parseInt(elems[2],10);result = allDigits(elems[0]) && (month > 0) && (month < 13) && allDigits(elems[1]) && (day > 0) && (day < 32) && allDigits(elems[2]) && ((elems[2].length == 2) || (elems[2].length == 4));	}if (!result){alert('Please enter a date in the format MM/DD/YYYY for the "' + fieldLabel +'" field.');formField.focus();}}return result;}

function validRadioSelected(formField,fieldLabel) {var radio_choice = false;for (counter = 0; counter < formField.length; counter++) {if (formField[counter].checked)radio_choice = true; }if (!radio_choice) {alert('Please select a option for "' + fieldLabel + '" field.');} return radio_choice;}

// START: Validation for Default values like, Name*, Email*, Telephone*, Description* etc.. for Our Services Page
function validDefaultString(formField,fieldLabel,required){var result = true;if (required && !validDefaultRequired(formField,fieldLabel))result = false; return result;}

function validDefaultRequired(formField,fieldLabel){var result = true;if (formField.value == "" || formField.value == "Name*" || formField.value == "Phone*" || formField.value == "Enter your requirements*"){alert('Please enter your' + fieldLabel);formField.focus();result = false;}return result;}
// END: Validation for Default values like, Name*, Email*, Company*, Message* etc.. for Our Services Page

//EMAIL VALIDAION STARTS HERE
function emailCheck (emailStr,emailfield) {
var emailPat=/^(.+)@(.+)$/
var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
var validChars="\[^\\s" + specialChars + "\]"
var quotedUser="(\"[^\"]*\")"
var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
var atom=validChars + '+'
var word="(" + atom + "|" + quotedUser + ")"
var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
var matchArray=emailStr.match(emailPat)
if (matchArray==null) { 
alert("Please enter your complete email address in the form: yourname@yourdomain.com")
emailfield.focus();
return false}
var user=matchArray[1]
var domain=matchArray[2]
if (user.match(userPat)==null) {
alert("Cannot have more than one email-id")
emailfield.focus();
return false
}
var IPArray=domain.match(ipDomainPat)
if (IPArray!=null) {
for (var i=1;i<=4;i++) {
if (IPArray[i]>255) {
alert("Destination IP address is invalid!")
emailfield.focus();
return false
}
}
return true
}
var domainArray=domain.match(domainPat)
if (domainArray==null) {
alert("The email domain name doesn't seem to be valid.")
emailfield.focus();
return false
}

var atomPat=new RegExp(atom,"g")
var domArr=domain.match(atomPat)
var len=domArr.length
if (domArr[domArr.length-1].length<2 || domArr[domArr.length-1].length>10) {
alert("The email address must end in a three-letter domain, or two letter country.")
emailfield.focus();
return false }
if (len<2) {
var errStr="This email address is missing a hostname!"
alert(errStr)
emailfield.focus();
return false }
return true; }
//End of Email Validation

//Start of Date Validation, format is (DD/MM/YYYY)
var dtCh= "/";
var minYear=1900;
var maxYear=2100;
function isInteger(s){
var i;
for (i = 0; i < s.length; i++){   
var c = s.charAt(i);
if (((c < "0") || (c > "9"))) return false;
}
}
function stripCharsInBag(s, bag){
var i;
var returnString = "";
for (i = 0; i < s.length; i++){   
var c = s.charAt(i);
if (bag.indexOf(c) == -1) returnString += c;
}
return returnString;}
function daysInFebruary (year){
return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
for (var i = 1; i <= n; i++) {
this[i] = 31;
if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
if (i==2) {this[i] = 29} } 
return this; }
function isDate(dtStr){
var daysInMonth = DaysArray(12);
var pos1=dtStr.indexOf(dtCh);
var pos2=dtStr.indexOf(dtCh,pos1+1);
var strDay=dtStr.substring(0,pos1);
var strMonth=dtStr.substring(pos1+1,pos2);
var strYear=dtStr.substring(pos2+1);
strYr=strYear;
if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
for (var i = 1; i <= 3; i++) {
if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
}
month=parseInt(strMonth);
day=parseInt(strDay);
year=parseInt(strYr);
if (pos1==-1 || pos2==-1){
alert("The date format should be : dd/mm/yyyy");
return false;}
if (strMonth.length<1 || month<1 || month>12){
alert("Please enter a valid month");
return false;}
if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
alert("Please enter a valid day");
return false;}
if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
alert("Please enter a valid 4 digit year");
return false;}
if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
alert("Please enter a valid date");
return false;}
}
//End of Date validation

/* START: BROWSER DETECTION */
var BrowserDetect={init:function(){this.browser=this.searchString(this.dataBrowser)||"An unknown browser",this.version=this.searchVersion(navigator.userAgent)||this.searchVersion(navigator.appVersion)||"an unknown version",this.OS=this.searchString(this.dataOS)||"an unknown OS"},searchString:function(i){for(var n=0;n<i.length;n++){var r=i[n].string,t=i[n].prop;if(this.versionSearchString=i[n].versionSearch||i[n].identity,r){if(-1!=r.indexOf(i[n].subString))return i[n].identity}else if(t)return i[n].identity}},searchVersion:function(i){var n=i.indexOf(this.versionSearchString);if(-1!=n)return parseFloat(i.substring(n+this.versionSearchString.length+1))},dataBrowser:[{string:navigator.userAgent,subString:"OmniWeb",versionSearch:"OmniWeb/",identity:"OmniWeb"},{string:navigator.vendor,subString:"Apple",identity:"Safari"},{prop:window.opera,identity:"Opera"},{string:navigator.vendor,subString:"iCab",identity:"iCab"},{string:navigator.vendor,subString:"KDE",identity:"Konqueror"},{string:navigator.userAgent,subString:"Firefox",identity:"Firefox"},{string:navigator.vendor,subString:"Camino",identity:"Camino"},{string:navigator.userAgent,subString:"Netscape",identity:"Netscape"},{string:navigator.userAgent,subString:"MSIE",identity:"Explorer",versionSearch:"MSIE"},{string:navigator.userAgent,subString:"Gecko",identity:"Mozilla",versionSearch:"rv"},{string:navigator.userAgent,subString:"Mozilla",identity:"Netscape",versionSearch:"Mozilla"}],dataOS:[{string:navigator.platform,subString:"Win",identity:"Windows"},{string:navigator.platform,subString:"Mac",identity:"Mac"},{string:navigator.platform,subString:"Linux",identity:"Linux"}]};BrowserDetect.init();
/* END: BROWSER DETECTION */
</script>
<script>
function ValidateSmallForm(theForm)
{
	//if (!validRequired(theForm.FirstName," name"))
  //return false;
	//if (!emailCheck(theForm.Email.value, theForm.Email))
	//return false;
	//if (!validRequired(theForm.phone," telephone number",true))
	//return false;
	if (!validDrop(theForm.country,"country"))
		return false;
	//if (!validRequired(theForm.description," description of requirements"))
	//return false;	

	return true;	
}
</script>

<!-- TO TRACK SEARCH ENGINE AND KEYWORD -->
<?php include_once $_SERVER['DOCUMENT_ROOT']."/includes/keyword.php";?>
<!-- TO TRACK SEARCH ENGINE AND KEYWORD -->

<!-- MEGA MENU -->
<!-- START: JAVASCRIPT SUBMENU FOR DESKTOP AND IPAD/TABLET DEVICE -->
<?php if(($DeviceType == "AllDevices" || $DeviceType == "computer" || $DeviceType == "tablet" && $DeviceType != "phone") && ($path != "/default.php") && ($path != "/call-center/default.php" && $path != "/research-analysis/default.php" && $path != "/engineering/default.php" && $path != "/financial-services/default.php" && $path != "/data-management/default.php" && $path !="/IT-services/default.php" && $path !="/creative-services/default.php" && $path !="/digital-photography/default.php" && $path !="/healthcare/default.php" && $path !="/mortgage/default.php" && $path !="/insurance-bpo/default.php" && $path !="/transcription/default.php" && $path !="/legal-services/default.php" && $path !="/translation/default.php" && $path !="/virtual-executive-assistant/default.php" && $path != "/webanalytics/default.php" && $path != "/reo-services/default.php" && $path != "/customs-brokerage/default.php" && $path != "/logistics/default.php" && $path !="/data-science/default.php" && $path != "/default.php" && $path != "/view-our-services.php" && $path != "/forms/contactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/callcentercontactform1.php" && $path != "/forms/ra_contactform.php" && $path != "/forms/engineeringcontactform.php" && $path != "/forms/mechanical.php" && $path != "/forms/financial_contactform.php" && $path != "/forms/dmcontactform.php" && $path != "/forms/itcontactform.php" && $path != "/forms/creative-service.php" && $path != "/forms/digital-photography-contactform.php" && $path != "/forms/insurance.php" && $path != "/forms/transcription.php" && $path != "/forms/legal-services.php" && $path != "/forms/translation.php" && $path != "/forms/healthcarecontactform.php" && $path != "/forms/mortgagecontactform.php" && $path != "/forms/virtual-assistant.php" && $path != "/forms/webanalytics.php" && $path != "/forms/reo-services.php" && $path != "/forms/brokerage-contactform.php" && $path != "/forms/partners.php" && $path !="/forms/data-science-services.php" )){ ?>
<script src="https://www.flatworldsolutions.com/js/jquery.js"></script>
<script src="https://www.flatworldsolutions.com/js/mobile.js"></script>
<?php }?>
<!-- START: JAVASCRIPT SUBMENU FOR DESKTOP AND IPAD/TABLET DEVICE -->
<!-- MEGA MENU -->

<!-- RESPONSIVE SUBMENU-->
<!--<script src="<?php //echo $cdn_path;?>/js/modernizr.custom.js"></script>-->
<script>
/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-cssanimations-csstransitions-touch-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},q.cssanimations=function(){return F("animationName")},q.csstransitions=function(){return F("transition")};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
</script>
<!-- RESPONSIVE SUBMENU-->

<!-- RESPONSIVE MENU STARTS -->
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/expand-collapse-group.php";?>

<?php if($DeviceType != "tablet" && $DeviceType != "phone" && $path !="/default.php" && $path !="/digital-photography/real-estate-image-post-processing.php" && $path != "/digital-photography/articles/emerging-photography-trends.php" && $path != "/call-center/cold-calling-services.php" && $path != "/research-analysis/market-research-services.php" && $path != "/digital-photography/articles/types-of-photo-existing-software.php"){ ?>	
<script src="https://www.flatworldsolutions.com/js/jquery.MultiFile.js"></script>
<?php
}
?>	

<?php
	if($page == "iPad-app-development" || $page == "iPhone-mobile-app" || $page == "taxi-booking-app" || $page == "business-intelligence-dashboard-creation" || $page == "dashboard-creation-services" || $page == "mobile-responder-trigger-web-app" || $page == "ipad-app-development-services" || $page == "iphone-app-development-services" || $path == "/template/small-container-slider.php" || $page == "large-carousel"  || $path == "/call-center/super-agent-services.php"){
?>	
<!--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>-->
<script src="https://www.flatworldsolutions.com/js/jquery.tinycarousel.js"></script>
<script>
	$(document).ready(function(){		
	$("#slider1, #slider2, #slider3, #slider4").tinycarousel({
			bullets  : true });		
			});
</script>
<?php
}
?>	
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
$(function() {
  $('#calc-banner').click(function(){
		location.href="/callcenter-cost-staffing-calculator.php#top";
	}); 	
	$('#nav-toggle i').hide();
	$('#nav-toggle').click( function(event){	
        event.stopPropagation();
       $('#nav-toggle span').toggleClass("displaynone");
	    $('#nav-toggle i').toggleClass("displayblock");
		//$('#logo-container #right-box #top-links .megamenu_dark_theme .megamenu_container .megamenu > li').toggleClass("sample");
        $('.nav-menu .responsive-main-menu').slideToggle( "slide");
		//$('#nav-toggle').toggleClass("displaynone");
	
    });
$('.responsive-services-menu').hide();
$('#services-toggle').click( function(event){	
        event.stopPropagation();
        $('.responsive-services-menu').slideToggle( "slide");
	});
});
function loadMenu() {
    $(".nav-menu .menu-toggle").on("click", function() {
        $(this).closest(".menu-item").toggleClass("active");
    });
    $('.btn-scroll').on("click", function() {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 10
        }, 500);
        return false;
    });
    $(".menu-item").on('click',
        function() {
            if ($(".sub-menu", this).css('display') === 'none') {
                $(".sub-menu", this).css("display", "block");
            } else {
                $(".sub-menu", this).css("display", "none");
            }
        }
    );
}

</script>	

<?php if(($path != "/default.php") && ($path != "/call-center/default.php" && $path != "/research-analysis/default.php" && $path != "/engineering/default.php" && $path != "/financial-services/default.php" && $path != "/data-management/default.php" && $path !="/IT-services/default.php" && $path !="/creative-services/default.php" && $path !="/digital-photography/default.php" && $path !="/healthcare/default.php" && $path !="/mortgage/default.php" && $path !="/insurance-bpo/default.php" && $path !="/transcription/default.php" && $path !="/legal-services/default.php" && $path !="/translation/default.php" && $path !="/virtual-executive-assistant/default.php" && $path != "/webanalytics/default.php" && $path != "/reo-services/default.php" && $path != "/customs-brokerage/default.php" && $path != "/logistics/default.php" && $path !="/data-science/default.php" && $path != "/default.php" && $path != "/view-our-services.php" && $path != "/forms/contactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/callcentercontactform1.php" && $path != "/forms/ra_contactform.php" && $path != "/forms/engineeringcontactform.php" && $path != "/forms/mechanical.php" && $path != "/forms/financial_contactform.php" && $path != "/forms/dmcontactform.php" && $path != "/forms/itcontactform.php" && $path != "/forms/creative-service.php" && $path != "/forms/digital-photography-contactform.php" && $path != "/forms/insurance.php" && $path != "/forms/transcription.php" && $path != "/forms/legal-services.php" && $path != "/forms/translation.php" && $path != "/forms/healthcarecontactform.php" && $path != "/forms/mortgagecontactform.php" && $path != "/forms/virtual-assistant.php" && $path != "/forms/webanalytics.php" && $path != "/forms/reo-services.php" && $path != "/forms/brokerage-contactform.php" && $path != "/forms/partners.php" && $path !="/forms/data-science-services.php" )){ ?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://www.flatworldsolutions.com/js/ddaccordion.js"></script>

<script>
//RESPONSIVE SUBMENU
	ddaccordion.init({
	headerclass: "dlmenu-view-all", //Shared CSS class name of headers group
	contentclass: "dlmenu-list", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	scrolltoheader: false, //scroll to header each time after it's been expanded by the user?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "dlmenu-open"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

//EXPAND-COLLAPSE MENU
ddaccordion.init({
	headerclass: "category", //Shared CSS class name of headers group
	contentclass: "categorydesc", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: true, //Should contents open by default be animated into view?
	scrolltoheader: false, //scroll to header each time after it's been expanded by the user?
	persiststate: false, //persist state of opened contents within browser session?
	toggleclass: ["", "opencategory"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
		<?php if($CollapseAll == '1'){ $checkhere = "One"; ?>
		
			ddaccordion.collapseall('category');					

		<?php }elseif($ExpandCollapse == 'EC-AllKeyDiff'){ ?> /* Expand the Menu depending on the Service Group Name */
			ddaccordion.expandone('category', 0); return false;
		
		<?php }elseif($ExpandCollapse == 'EC-AllCaseStudy'){ ?>
			ddaccordion.expandone('category', 1); return false;

		<?php }elseif($ExpandCollapse == 'EC-DM-Industry'){ ?>
			ddaccordion.expandone('category', 1); return false;

		<?php }elseif($ExpandCollapse == 'EC-MRTGS-CaseStudy'){ ?>
			ddaccordion.expandone('category', 1); return false;
		
		<?php }elseif($ExpandCollapse == 'EC-MRTGS-Events'){ ?>
			ddaccordion.expandone('category', 2); return false;

		<?php }elseif($ExpandCollapse == 'EC-CB-CaseStudy'){ ?>
			ddaccordion.expandone('category', 1); return false;
		
		<?php }elseif($ExpandCollapse == 'EC-CB-Events'){ ?>
			ddaccordion.expandone('category', 2); return false;

    <?php }elseif($ExpandCollapse == 'EC-HC-Events'){ ?>
      ddaccordion.expandone('category', 2); return false;  

		<?php }elseif($ExpandCollapse == 'EC-DM-CaseStudy'){ ?>
			ddaccordion.expandone('category', 2); return false;

		<?php }elseif($ExpandCollapse == 'EC-SW-OpenSource'){ ?>
			ddaccordion.expandone('category', 2); return false;
		
		<?php }elseif($ExpandCollapse == 'EC-SW-Products'){ ?>
			ddaccordion.expandone('category', 1); return false;

		<?php }elseif($ExpandCollapse == 'EC-SW-CaseStudy'){ ?>
			ddaccordion.expandone('category', 3); return false;	
		
		<?php }elseif($ExpandCollapse == 'EC-GN-Events'){ ?>
			ddaccordion.expandone('category', 1); return false;	

		<?php }else{?>
			ddaccordion.expandone('category', 0); return false;
		<?php }?>
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<?php
}
?>	
<!-- RESPONSIVE MENU ENDS -->

<?php if($path != "/default.php"){ ?>	
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script>
$(document).ready(function(){
		$( "#innerpg-wrapper section>a#btm_cub, #innerpg-wrapper section a#btm_cub" ).text( "Contact Us" );
		$( "#innerpg-wrapper section>a#careers_btm_cub	" ).text( "Apply Now" );
	});
	
	
	if ((screen.width>=1000)) {
		$( document ).ready(function(){
			var offsetPixel = $('#innerpg-wrapper nav').outerHeight() + 117;		
			$(window).scroll(function() {
				if ( $(window).scrollTop() > offsetPixel ) {
					$('#innerpg-wrapper nav, #subHeaderSection').addClass('inner-head-fixed');
					
				} else {
					$('#innerpg-wrapper nav, #subHeaderSection').removeClass('inner-head-fixed');				
				}
			});
		});
	}
</script>
<?php
}
?>	
<script type="text/javascript">
  (function(w,d,t,u,n,s,e){w['SwiftypeObject']=n;w[n]=w[n]||function(){
  (w[n].q=w[n].q||[]).push(arguments);};s=d.createElement(t);
  e=d.getElementsByTagName(t)[0];s.async=1;s.src=u;e.parentNode.insertBefore(s,e);
  })(window,document,'script','//s.swiftypecdn.com/install/v2/st.js','_st');
  
  _st('install','hxerDzGb4Tx2DUg5LH5H','2.0.0');
</script>

<script>
function init() {
var vidDefer = document.getElementsByTagName('iframe');
for (var i=0; i<vidDefer.length; i++) {
if(vidDefer[i].getAttribute('data-src')) {
vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
} } }
window.onload = init;
</script>


<script src="https://www.flatworldsolutions.com/js/parallaxie.js"></script>
<script src="https://www.flatworldsolutions.com/js/wow.js"></script>
<script src="https://www.flatworldsolutions.com/js/functions.js?ver=19.09.2023"></script>



<!-- SCROLL TO TOP -->
<script type="text/javascript">
$('.more-ser-tab').click( function(event){
        event.stopPropagation();
	$('.more-ser-tab').toggleClass("more-ser-tab-active");
	$('.more-ser-dd-menu-panel').show();
	//$('.more-ser-dd-menu-panel').toggle( "blind","slow" );
	 });
    $(document).click( function(event){
		event.stopPropagation();
        $('.more-ser-dd-menu-panel').hide();
		$('.more-ser-tab').removeClass("more-ser-tab-active");
    });
	
$("#portfolio-inpage-banner").each(function(e) {
    var title = $(this).attr('title');
    $(this).mouseover(
        function() {
            $(this).attr('title','');
        }).mouseout(
            function() {
            $(this).attr('title', title);
    });
    $(this).click(
    function() {
        $(this).attr('title', title);
        }
    );
});	

</script>
<!-- SCROLL TO TOP -->

<?php if(($path != "/default.php") && ($path != "/call-center/default.php" && $path != "/research-analysis/default.php" && $path != "/engineering/default.php" && $path != "/financial-services/default.php" && $path != "/data-management/default.php" && $path !="/IT-services/default.php" && $path !="/creative-services/default.php" && $path !="/digital-photography/default.php" && $path !="/healthcare/default.php" && $path !="/mortgage/default.php" && $path !="/insurance-bpo/default.php" && $path !="/transcription/default.php" && $path !="/legal-services/default.php" && $path !="/translation/default.php" && $path !="/virtual-executive-assistant/default.php" && $path != "/webanalytics/default.php" && $path != "/reo-services/default.php" && $path != "/customs-brokerage/default.php" && $path != "/logistics/default.php" && $path !="/data-science/default.php" && $path != "/default.php" && $path != "/view-our-services.php" && $path != "/forms/contactform.php" && $path != "/forms/callcentercontactform.php" && $path != "/forms/callcentercontactform1.php" && $path != "/forms/ra_contactform.php" && $path != "/forms/engineeringcontactform.php" && $path != "/forms/mechanical.php" && $path != "/forms/financial_contactform.php" && $path != "/forms/dmcontactform.php" && $path != "/forms/itcontactform.php" && $path != "/forms/creative-service.php" && $path != "/forms/digital-photography-contactform.php" && $path != "/forms/insurance.php" && $path != "/forms/transcription.php" && $path != "/forms/legal-services.php" && $path != "/forms/translation.php" && $path != "/forms/healthcarecontactform.php" && $path != "/forms/mortgagecontactform.php" && $path != "/forms/virtual-assistant.php" && $path != "/forms/webanalytics.php" && $path != "/forms/reo-services.php" && $path != "/forms/brokerage-contactform.php" && $path != "/forms/partners.php" && $path !="/forms/data-science-services.php" )){ ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- RESPONSIVE SUBMENU-->
<!--<script src="<?php //echo $cdn_path;?>/js/modernizr.custom.js"></script>-->
<script>
/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-flexbox-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-applicationcache-canvas-canvastext-draganddrop-hashchange-history-audio-video-indexeddb-input-inputtypes-localstorage-postmessage-sessionstorage-websockets-websqldatabase-webworkers-geolocation-inlinesvg-smil-svg-svgclippaths-touch-webgl-shiv-mq-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function D(a){j.cssText=a}function E(a,b){return D(n.join(a+";")+(b||""))}function F(a,b){return typeof a===b}function G(a,b){return!!~(""+a).indexOf(b)}function H(a,b){for(var d in a){var e=a[d];if(!G(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function I(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:F(f,"function")?f.bind(d||b):f}return!1}function J(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return F(b,"string")||F(b,"undefined")?H(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),I(e,b,c))}function K(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)u[c[d]]=c[d]in k;return u.list&&(u.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),u}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),t[a[d]]=!!e;return t}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},z=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return y("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},A=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=F(e[d],"function"),F(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),B={}.hasOwnProperty,C;!F(B,"undefined")&&!F(B.call,"undefined")?C=function(a,b){return B.call(a,b)}:C=function(a,b){return b in a&&F(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e}),s.flexbox=function(){return J("flexWrap")},s.canvas=function(){var a=b.createElement("canvas");return!!a.getContext&&!!a.getContext("2d")},s.canvastext=function(){return!!e.canvas&&!!F(b.createElement("canvas").getContext("2d").fillText,"function")},s.webgl=function(){return!!a.WebGLRenderingContext},s.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:y(["@media (",n.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},s.geolocation=function(){return"geolocation"in navigator},s.postmessage=function(){return!!a.postMessage},s.websqldatabase=function(){return!!a.openDatabase},s.indexedDB=function(){return!!J("indexedDB",a)},s.hashchange=function(){return A("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},s.history=function(){return!!a.history&&!!history.pushState},s.draganddrop=function(){var a=b.createElement("div");return"draggable"in a||"ondragstart"in a&&"ondrop"in a},s.websockets=function(){return"WebSocket"in a||"MozWebSocket"in a},s.rgba=function(){return D("background-color:rgba(150,255,150,.5)"),G(j.backgroundColor,"rgba")},s.hsla=function(){return D("background-color:hsla(120,40%,100%,.5)"),G(j.backgroundColor,"rgba")||G(j.backgroundColor,"hsla")},s.multiplebgs=function(){return D("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return J("backgroundSize")},s.borderimage=function(){return J("borderImage")},s.borderradius=function(){return J("borderRadius")},s.boxshadow=function(){return J("boxShadow")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return E("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return J("animationName")},s.csscolumns=function(){return J("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return D((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),G(j.backgroundImage,"gradient")},s.cssreflections=function(){return J("boxReflect")},s.csstransforms=function(){return!!J("transform")},s.csstransforms3d=function(){var a=!!J("perspective");return a&&"webkitPerspective"in g.style&&y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},s.csstransitions=function(){return J("transition")},s.fontface=function(){var a;return y('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},s.generatedcontent=function(){var a;return y(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a},s.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c},s.audio=function(){var a=b.createElement("audio"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),c.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),c.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),c.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(d){}return c},s.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}},s.sessionstorage=function(){try{return sessionStorage.setItem(h,h),sessionStorage.removeItem(h),!0}catch(a){return!1}},s.webworkers=function(){return!!a.Worker},s.applicationcache=function(){return!!a.applicationCache},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==r.svg},s.smil=function(){return!!b.createElementNS&&/SVGAnimate/.test(m.call(b.createElementNS(r.svg,"animate")))},s.svgclippaths=function(){return!!b.createElementNS&&/SVGClipPath/.test(m.call(b.createElementNS(r.svg,"clipPath")))};for(var L in s)C(s,L)&&(x=L.toLowerCase(),e[x]=s[L](),v.push((e[x]?"":"no-")+x));return e.input||K(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)C(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},D(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.mq=z,e.hasEvent=A,e.testProp=function(a){return H([a])},e.testAllProps=J,e.testStyles=y,e.prefixed=function(a,b,c){return b?J(a,b,c):J(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
</script>
<!--<script src="<?php //echo $cdn_path;?>/js/jquery.dlmenu.js"></script>-->
<script>
(function(d,b,f){var e=b.Modernizr,c=d("body");d.DLMenu=function(g,h){this.$el=d(h);this._init(g)};d.DLMenu.defaults={animationClasses:{classin:"dl-animate-in-1",classout:"dl-animate-out-1"},onLevelClick:function(h,g){return false},onLinkClick:function(g,h){return false}};d.DLMenu.prototype={_init:function(h){this.options=d.extend(true,{},d.DLMenu.defaults,h);this._config();var g={WebkitAnimation:"webkitAnimationEnd",OAnimation:"oAnimationEnd",msAnimation:"MSAnimationEnd",animation:"animationend"},i={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",msTransition:"MSTransitionEnd",transition:"transitionend"};this.animEndEventName=g[e.prefixed("animation")]+".dlmenu";this.transEndEventName=i[e.prefixed("transition")]+".dlmenu",this.supportAnimations=e.cssanimations,this.supportTransitions=e.csstransitions;this._initEvents()},_config:function(){this.open=false;this.$trigger=this.$el.children(".dl-trigger");this.$menu=this.$el.children("ul.dl-menu");this.$menuitems=this.$menu.find("li:not(.dl-back)");this.$el.find("ul.dl-submenu").prepend('<li class="dl-back"><a href="#">BACK</a></li>');this.$back=this.$menu.find("li.dl-back")},_initEvents:function(){var g=this;this.$trigger.on("click.dlmenu",function(){if(g.open){g._closeMenu()}else{g._openMenu()}return false});this.$menuitems.on("click.dlmenu",function(j){j.stopPropagation();var i=d(this),h=i.children("ul.dl-submenu");if(h.length>0){var l=h.clone().insertAfter(g.$menu).addClass(g.options.animationClasses.classin),k=function(){g.$menu.off(g.animEndEventName).removeClass(g.options.animationClasses.classout).addClass("dl-subview");i.addClass("dl-subviewopen").parents(".dl-subviewopen:first").removeClass("dl-subviewopen").addClass("dl-subview");l.remove()};g.$menu.addClass(g.options.animationClasses.classout);if(g.supportAnimations){g.$menu.on(g.animEndEventName,k)}else{k.call()}g.options.onLevelClick(i,i.children("a:first").text());return false}else{g.options.onLinkClick(i,j)}});this.$back.on("click.dlmenu",function(k){var l=d(this),i=l.parents("ul.dl-submenu:first"),h=i.parent(),n=i.clone().insertAfter(g.$menu).addClass(g.options.animationClasses.classout);var m=function(){g.$menu.off(g.animEndEventName).removeClass(g.options.animationClasses.classin);n.remove()};g.$menu.addClass(g.options.animationClasses.classin);if(g.supportAnimations){g.$menu.on(g.animEndEventName,m)}else{m.call()}h.removeClass("dl-subviewopen");var j=l.parents(".dl-subview:first");if(j.is("li")){j.addClass("dl-subviewopen")}j.removeClass("dl-subview");return false})},closeMenu:function(){if(this.open){this._closeMenu()}},_closeMenu:function(){var g=this,h=function(){g.$menu.off(g.transEndEventName);g._resetMenu()};this.$menu.removeClass("dl-menuopen");this.$menu.addClass("dl-menu-toggle");this.$trigger.removeClass("dl-active");if(this.supportTransitions){this.$menu.on(this.transEndEventName,h)}else{h.call()}this.open=false},openMenu:function(){if(!this.open){this._openMenu()}},_openMenu:function(){var g=this;c.off("click").on("click.dlmenu",function(){g._closeMenu()});this.$menu.addClass("dl-menuopen dl-menu-toggle").on(this.transEndEventName,function(){d(this).removeClass("dl-menu-toggle")});this.$trigger.addClass("dl-active");this.open=true},_resetMenu:function(){this.$menu.removeClass("dl-subview");this.$menuitems.removeClass("dl-subview dl-subviewopen")}};var a=function(g){if(b.console){b.console.error(g)}};d.fn.dlmenu=function(h){if(typeof h==="string"){var g=Array.prototype.slice.call(arguments,1);this.each(function(){var i=d.data(this,"dlmenu");if(!i){a("cannot call methods on dlmenu prior to initialization; attempted to call method '"+h+"'");return}if(!d.isFunction(i[h])||h.charAt(0)==="_"){a("no such method '"+h+"' for dlmenu instance");return}i[h].apply(i,g)})}else{this.each(function(){var i=d.data(this,"dlmenu");if(i){i._init()}else{i=d.data(this,"dlmenu",new d.DLMenu(h,this))}})}return this}})(jQuery,window);
</script>
<script>
$(function() {
if ((screen.width<=479)) {
  $( '#dl-menu' ).dlmenu();
  $(".dl-menuwrapper").css("max-width", "98%");
  $('.dl-trigger').click(function(){
	 
  $('.dl-menu').fadeToggle();
  });
   $(document).click( function(){
        $('.dl-menu').hide();
  });
}
else if ((screen.width>=480)){

 $( '#dl-menu' ).dlmenu();
 $(".dl-menuwrapper .dl-menu").css("position", "absolute");
  $(".dl-menuwrapper .dl-menu").css("display", "block");
}
});
</script>
<?php } ?>