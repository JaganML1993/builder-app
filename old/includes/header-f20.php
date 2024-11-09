<?php
	$OrgName = $_COOKIE["orgName"];
	$ISPName = $_COOKIE["ISPName"];
	if($OrgName == "" || $ISPName == ""){
		$OrgName = "N/A";
		$ISPName = "N/A";
	}
	
	$Raw_VTZ = $_COOKIE['VTZ'];
	$v_timezone = substr($Raw_VTZ,9);

	//echo $v_timezone;

	$Raw_VCityCountryTZ = $_COOKIE['VCityCountryTZ'];
	$VCityCountryTZChunks = explode(",", $Raw_VCityCountryTZ);
	$v_city = $VCityCountryTZChunks[0];
	$v_country = $VCityCountryTZChunks[1];
	if($v_city == "" || $v_country == "" || $v_timezone == ""){
		$v_city = "Not Specified";
		$v_country = "Not Specified";
		$v_timezone = "Not Specified";
	}

	$GetCountryCodeDatalayer = "";
	if (isset($_COOKIE["CountryCode"])){
		$GetCountryCodeDatalayer = $_COOKIE["CountryCode"];
	}else{
		$GetCountryCodeDatalayer = $country_code;
	}
?>
<script>
	dataLayer = [{
		'pageCategory': '<?php echo $group_name; ?>',
		'pageType': '<?php echo $page_type; ?>',
		'orgName': '<?php echo $OrgName; ?>',
		'ISPName': '<?php echo $ISPName; ?>',
		'city': '<?php echo $v_city; ?>',
		'country': '<?php echo $GetCountryCodeDatalayer; ?>',
		'timezone': '<?php echo $v_timezone; ?>'
	}];
</script>

<?php if($_SERVER["HTTP_HOST"] == "www.flatworldsolutions.com" ||  $_SERVER["HTTP_HOST"] == "flatworldsolutions.com"){ ?>
<!-- Online - Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KV2F6R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KV2F6R');</script>
<!-- End Google Tag Manager -->

<?php }elseif($_SERVER["HTTP_HOST"] == "flatworldsolutionslocal" || $_SERVER["HTTP_HOST"] == "flatworldsolutionslocal"){ ?>
<!-- Local - Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WFJGFB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFJGFB');</script>
<!-- End Google Tag Manager -->
<?php } ?>

<script>window.faitracker=window.faitracker||function(){this.q=[];var t=new CustomEvent("FAITRACKER_QUEUED_EVENT");return this.init=function(t,e,a){this.TOKEN=t,this.INIT_PARAMS=e,this.INIT_CALLBACK=a,window.dispatchEvent(new CustomEvent("FAITRACKER_INIT_EVENT"))},this.call=function(){var e={k:"",a:[]};if(arguments&&arguments.length>=1){for(var a=1;a<arguments.length;a++)e.a.push(arguments[a]);e.k=arguments[0]}this.q.push(e),window.dispatchEvent(t)},this.message=function(){window.addEventListener("message",function(t){"faitracker"===t.data.origin&&this.call("message",t.data.type,t.data.message)})},this.message(),this.init("7vdm9ye4tgxe448a15yp5wq34az59crn",{host:"https://api.dyh8ken8pc.com"}),this}(),function(){var t=document.createElement("script");t.type="text/javascript",t.src="https://asset.dyh8ken8pc.com/dyh8ken8pc.js",t.async=!0,(d=document.getElementsByTagName("script")[0]).parentNode.insertBefore(t,d)}();</script>

  
<?php
	include $_SERVER['DOCUMENT_ROOT']."/includes/phone-number1.php";
  include $_SERVER['DOCUMENT_ROOT']."/includes/page-group.php";
  include $_SERVER['DOCUMENT_ROOT']."/includes/group-name-service.php";
  
  	/* Customized Alt tag for FWS logo */
  if ($path == "/call-center-services/default.php"){
		$alt_tag = "Call Center Services by Flatworld Solutions";
	}elseif ($page == "chat-support-services"){
		$alt_tag = "Chat Support Services by Flatworld Solutions";
	}elseif ($page == "inbound-callcenter-services"){
		$alt_tag = "Inbound Call Center Services by Flatworld Solutions";
	}elseif ($page == "technical-support-india"){
		$alt_tag = "Technical Support Services by Flatworld Solutions";
	}elseif ($page == "data-processing"){
		$alt_tag = "Data Processing Services by Flatworld Solutions";
	}elseif ($page == "litigation-services"){
		$alt_tag = "Litigation Support Services by Flatworld Solutions";	
	}elseif ($page == "online-data-entry-services"){
		$alt_tag = "Online Data Entry Services by Flatworld Solutions";
	}elseif ($path == "/epub/default.php"){
		$alt_tag = "Outsource ePUB services to Flatworld Solutions";
	}elseif ($page == "data-entry"){
		$alt_tag = "Data Entry Services by Flatworld Solutions";
	}elseif ($page == "transcription-services"){
		$alt_tag = "Transcription Services by Flatworld Solutions";
	}elseif ($page == "digital-transcription-services"){
		$alt_tag = "Digital Transcription Services by Flatworld Solutions";
	}elseif ($page == "voice-transcription-services"){
		$alt_tag = "Voice Transcription Services by Flatworld Solutions";
	}elseif ($page == "audio-transcription"){
		$alt_tag = "Audio Transcription Services by Flatworld Solutions";
	}elseif ($path == "/engineering/default.php"){
		$alt_tag = "Mechanical Engineering Services from Flatworld Solutions";
	}elseif ($page == "civil-engineering-services"){
		$alt_tag = "Civil Engineering Services by Flatworld Solutions";
	}elseif ($page == "architectural-services"){
		$alt_tag = "Architecture Design Services by Flatworld Solutions";
	}elseif ($page == "machine-design"){
		$alt_tag = "CAD Design &amp; Machine Design by Flatworld Solutions";
	}elseif ($page == "3d-modeling-drafting"){
		$alt_tag = "3D Rendering, Modeling &amp; Drafting Services by Flatworld Solutions";
	}elseif ($page == "online-medical-billing-services"){
		$alt_tag = "Medical Billing &amp; Medical Claims Billing Services by Flatworld Solutions";
	}elseif ($page == "medical-billing-coding"){
		$alt_tag = "Medical Billing &amp; Medical Coding Services by Flatworld Solutions";
	}elseif ($page == "medical-transcription"){
		$alt_tag = "Medical Transcription Services by Flatworld Solutions";
	}elseif ($page == "teleradiology"){
		$alt_tag = "Teleradiology Services by Flatworld Solutions";
	}elseif ($page == "bookkeeping"){
		$alt_tag = "Bookkeeping Services by Flatworld Solutions";
	}elseif ($page == "tax-processing"){
		$alt_tag = "Tax Preparation Services by Flatworld Solutions";
	}elseif ($path == "/financial-services/default.php"){
		$alt_tag = "Financial Accounting Services by Flatworld Solutions";
	}elseif ($page == "payroll-processing"){
		$alt_tag = "Payroll Services &amp; Payroll Processing Services by Flatworld Solutions";
	}elseif ($path == "/IT-services/default.php"){
		$alt_tag = "Software Development Services by Flatworld Solutions";
	}elseif ($page == "website-design-services"){
		$alt_tag = "Website Design Services by Flatworld Solutions";
	}elseif ($page == "software-testing"){
		$alt_tag = "Software Testing Services by Flatworld Solutions";
	}elseif ($page == "photo-editing-services"){
		$alt_tag = "Photo Editing Services from Flatworld Solutions";
	}elseif ($page == "image-editing"){
		$alt_tag = "Image Editing Services from Flatworld Solutions";
	}elseif ($page == "image-processing-services"){
		$alt_tag = "Image Processing Services by Flatworld Solutions";
	}elseif ($page == "photo-restoration-services"){
		$alt_tag = "Photo Restoration Services from Flatworld Solutions";
	}elseif ($page == "photo-manipulation-services"){
		$alt_tag = "Photo Manipulation Services from Flatworld Solutions";
	}elseif ($page == "web-based-market-research-services"){
		$alt_tag = "Web Based Market Research Services by Flatworld Solutions";
	}elseif ($page == "graphic-design-services"){
		$alt_tag = "Graphic Design Services by Flatworld Solutions";	
	}elseif ($page == "design-services"){
		$alt_tag = "Design Services by Flatworld Solutions";
	}elseif ($page == "advertising-services"){
		$alt_tag = "Advertising Services by Flatworld Solutions";
	}elseif ($page == "magazine-layout-services"){
		$alt_tag = "Prepress Services by Flatworld Solution";
	}elseif ($path == "/webanalytics/default.php"){
		$alt_tag = "Web Analytics &amp; Web Site Analysis Services by Flatworld Solutions";
	}else{
		$alt_tag = "Flatworld Solutions";
	}
	/* Customized Alt tag for FWS logo */

	$GetCountryCode = "";
	if (isset($_COOKIE["CountryCode"])){
		$GetCountryCode = $_COOKIE["CountryCode"];
	}else{
		$GetCountryCode = $country_code;
	}
	
?>
<header class="container-fluid p-0 wow fadeInDown" data-wow-delay="200ms" id="headNav">
    <div class="d-flex flex-wrap pb-0 pb-md-2 mb-0 position-relative m-auto">
      <a href="/" class="d-flex mt-3 mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="<?php echo $cdn_path;?>/images/fws-logo.webp" class="logo" alt="">
      </a>
      <button class="navbar-toggler wow fadeInDown" data-wow-delay="200ms" type="button" data-bs-toggle="collapse" data-bs-target="#topNavSidebar" aria-controls="topNavSidebar" aria-expanded="true" aria-label="Toggle navigation">
        <span class="fw-bold menu wow fadeInTop" data-wow-delay="200ms">MENU</span>
        <span class="navbar-toggler-icon wow fadeInLeft" data-wow-delay="200ms"></span>
        <span class="navbar-toggler-icon wow fadeInRight" data-wow-delay="200ms"></span>
      </button>
      <div class="row position-absolute" id="siteSearch">
        <div class="col-md-12">
			<!--<a href='tel:800-514-7456' class='header-call'><i class='fa-solid fa-phone-volume header-call-icon'></i> 800-514-7456</a>-->
            <?php echo $PhoneNumber_header_new_design; ?>	
          
          <div role="search" class="position-relative d-inline-block">
           
            <input class="form-control st-default-search-input" type="text" placeholder="Site Search" aria-label="Site Search">
          </div>
        </div>
      </div>
      <div class="navbar-collapse collapse" id="topNavSidebar">
      <div class="row position-absolute" id="siteSearch">
        <div class="col-md-6 text-start">
			<!--<a href='tel:800-514-7456' class='header-call'><i class='fa-solid fa-phone-volume header-call-icon'></i> 800-514-7456</a>-->
            <?php echo $PhoneNumber_header_new_design_mobile; ?>	
          </div>

         <div class="col-md-6 text-end">
          <div role="search" class="position-relative">
            <input class="form-control st-default-search-input" type="search" placeholder="Site Search" aria-label="Site Search">
          </div>
        </div> 
      </div>
       <ul class="navbar-nav me-auto mb-2 mb-sm-0">
			<li class="nav-item"><a href="/" class="nav-link" aria-current="page">Home</a></li>
             <li class="nav-item">
              <a class="nav-link <?php if($path == "/view-our-services.php" || $group_name == "Call_Center" || $group_name == "Software" || $group_name == "Financial" || $group_name == "Mortgage" || $group_name == "Healthcare" || $group_name == "Creative" || $group_name == "Data_Entry" || $group_name == "InsuranceBPO" || $group_name == "Photo_Editing" || $group_name == "Data_Science" || $group_name == "Research_Analysis" || $path == "/legal-services/default.php" || $path == "/customs-brokerage/default.php" || $path == "/logistics/default.php" || $path == "/transcription/default.php" || $path == "/translation/default.php" || $path == "/additional-services/default.php") echo 'active'; ?>" data-bs-toggle="collapse" href="#collapseServices" role="button" aria-expanded="false" aria-controls="collapseServices">Services <i class="fa-solid fa-angle-down"></i></a>
              <div class="collapse" id="collapseServices">
                <div class="card card-body">
                  <ul>
                    <li>
						<a href="/call-center-services/" <?php if(($group_name == "Call_Center")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Call Center Services</a>              
					</li>
                <li>
                    <a href="/engineering/" 
                    <?php if(($group_name == "ES_Eng")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Engineering Services</a>
              
                </li>
                <li>
                    <a href="/IT-services/" 
                    <?php if(($group_name == "Software")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Software Development</a>
              
                </li>
                <li>
                    <a href="/financial-services/" 
                    <?php if(($group_name == "Financial")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Finance & Accounting</a>
               </li>
                <li>
                    <a href="/mortgage/"
                    <?php if(($group_name == "Mortgage")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Mortgage Support</a>
                </li>							
                <li>
                    <a href="/healthcare/" 
                   <?php if(($group_name == "Healthcare")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Healthcare BPO</a>
              </li>
                <li>
                    <a href="/creative-services/" 
                    <?php if(($group_name == "Creative")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Creative Services</a>
               </li>
                <li>
                  <a href="/data-management/" 
                  <?php if(($group_name == "Data_Entry")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Data Services</a>
               </li>
                <li>
					<a href="/insurance-bpo/" 
					<?php if(($group_name == "InsuranceBPO")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Insurance <br>BPO</a>
                </li>
               <li>
				   <a href="/digital-photography/" 
				   <?php if(($group_name == "Photo_Editing")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Photo Editing</a>
                </li>
                <li>
					<a href="/data-science/" 
					<?php if(($group_name == "Data_Science")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Data Science</a>
                </li>
                 <li>
                    <a href="/intelligent-automation-services/"
                    <?php if(($path == "/intelligent-automation-services/default.php")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Automation Services</a>
                </li>
                 <li>
                <a href="/research-analysis/" 
                <?php if(($group_name == "Research_Analysis")) echo "class='nav-link active'"; ?> class='nav-link'><i class="fa-solid fa-caret-right"></i> Research & Analysis</a>
                </li>
                <li>
                    <a href="/legal-services/" class="nav-link 
                    <?php if($path == "/legal-services/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Legal Process Outsourcing</a>
                  </li>

                    <li><a href="/customs-brokerage/" class="nav-link 
                    <?php if($path == "/customs-brokerage/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Customs Brokerage</a>
                    </li>

                    <li><a href="/logistics/" class="nav-link
                    <?php if($path == "/logistics/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Logistics Services</a>
                    </li>

                    <li><a href="/transcription/" class="nav-link
                    <?php if($path == "/transcription/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Transcription Services</a>
                    </li>

                    <li><a href="/translation/" class="nav-link 
                    <?php if($path == "/translation/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Translation Services</a>
                    </li>

                    <li><a href="/" class="nav-link 
                    <?php if($path == "https://www.flatworldsolutions.com/additional-services/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Additional Services</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="nav-item"><a href="/industries/" class="nav-link 
                  <?php if($path == "https://www.flatworldsolutions.com/industries/default.php") echo 'active'; ?>">Industries</a>
            </li>
            <li class="nav-item">
              <a href="/about-fws/" class="nav-link 
            <?php if($path == "https://www.flatworldsolutions.com/about-fws/default.php") echo 'active'; ?>">About</a>
            </li>
            <li class="nav-item"><a href="https://www.flatworldsolutions.com/newsroom/" class="nav-link <?php if($path == 'https://www.flatworldsolutions.com/newsroom/default.php' || $path == '/newsroom/boyne-connect.php' || $page == "flatworld-solutions-announces-new-logo") echo 'active';?>">News</a></li>
			      <li class="nav-item">
              <a class="nav-link <?php if($path == "https://www.flatworldsolutions.com/articles/default.php" || $path == "https://www.flatworldsolutions.com/success-stories/default.php" || $path == "https://www.flatworldsolutions.com/videos.php" || $path == "https://www.flatworldsolutions.com/customer-testimonials.php" || $path == "https://www.flatworldsolutions.com/customer-video-testimonials.php" && $path == "https://www.flatworldsolutions.com/infographics/default.php") echo 'active'; ?>" data-bs-toggle="collapse" href="#collapseResources" role="button" aria-expanded="false" aria-controls="collapseResources"> Resources <i class="fa-solid fa-angle-down"></i></a>
              <div class="collapse" id="collapseResources">
                <div class="card card-body">
                  <ul>
                  <li><a href="/articles/" class="nav-link 
                  <?php if($path == "/articles/default.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Articles</a>
                  </li>

                  <li><a href="/success-stories/" class="nav-link 
                  <?php if($path == "/success-stories/default.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Success Stories</a>
                  </li>
                  
                  <li><a href="/videos.php" class="nav-link 
                  <?php if($path == "/videos.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Videos</a>
                  </li>

                  <li><a href="/customer-testimonials.php" class="nav-link 
                  <?php if($path == "/customer-testimonials.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Testimonials</a>
                  </li>

                  <li><a href="/customer-video-testimonials.php" class="nav-link 
                  <?php if($path == "/customer-video-testimonials.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Video Testimonials</a>
                  </li>

                  <li><a href="/infographics" class="nav-link 
                  <?php if($path == "/infographics/default.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Infographics</a>
                  </li>

                </ul>
                </div>
              </div>
              </li>
              <li class="nav-item">
                 <a  href="<?php echo $contact_page_url; ?>#top" id="top_cut1" onclick="document.getElementById('top_cut1').href='<?php echo $contact_page_url; ?>loc=TopNav&amp;url=<?php echo $tagpath;?>&amp;at=txt&amp;ft=Global&amp;cv=<?php echo $GAPageLevelVar;?>#top';" class="nav-link">Contact</a></li>
              </ul>
            </div>
            <ul class="nav nav-pills" id="topNavDesktop">   
                  <li class="nav-item"><a href="/" class="nav-link 
                  <?php if($path == "https://www.flatworldsolutions.com/default.php") echo 'active'; ?>">Home</a>
                  </li>
                 
                  <li class="nav-item" id="desktopServices"><a href="/view-our-services.php" class="nav-link 
                  <?php if($path == "https://www.flatworldsolutions.com/view-our-services.php") echo 'active'; ?>">Services</a>
                  </li>

                  <li class="nav-item dropdown position-static" id="tabServices">
                     <a href="#" class="nav-link dropdown-toggle  <?php if($path == "https://www.flatworldsolutions.com/view-our-services.php" || $group_name == "Call_Center" || $group_name == "Software" || $group_name == "Financial" || $group_name == "Mortgage" || $group_name == "Healthcare" || $group_name == "Creative" || $group_name == "Data_Entry" || $group_name == "InsuranceBPO" || $group_name == "Photo_Editing" || $group_name == "Data_Science" || $group_name == "Research_Analysis" || $path == "https://www.flatworldsolutions.com/legal-services/default.php" || $path == "https://www.flatworldsolutions.com/customs-brokerage/default.php" || $path == "/logistics/default.php" || $path == "/transcription/default.php" || $path == "https://www.flatworldsolutions.com/translation/default.php" || $path == "/additional-services/default.php") echo 'active'; ?>" id="ourServicesDD" data-mdb-toggle="dropdown" aria-expanded="false"> Services</a>
					<ul class="dropdown-menu services-res-menu" aria-labelledby="ourServicesDD">                 
                     
                    <li>
                    <a href="https://www.flatworldsolutions.com/engineering/" 
                    <?php if(($group_name == "Call_Center")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Call Center Services</a>
              
                </li>
                <li>
                <a href="https://www.flatworldsolutions.com/engineering/" 
                    <?php if(($group_name == "ES_Eng")) echo "class='dropdown-item  active'"; ?> class='dropdown-item'><i class="fa-solid fa-caret-right"></i> Engineering Services</a>
              
                </li>
                <li>
                    <a href="https://www.flatworldsolutions.com/IT-services/" 
                    <?php if(($group_name == "Software")) echo "class='dropdown-item  active'"; ?> class='dropdown-item'><i class="fa-solid fa-caret-right"></i> Software Development</a>
              
                </li>
                <li>
                    <a href="https://www.flatworldsolutions.com/engineering/" 
                    <?php if(($group_name == "Financial")) echo "class='dropdown-item  active'"; ?> class='dropdown-item'><i class="fa-solid fa-caret-right"></i> Finance & Accounting</a>
               </li>
                <li>
                    <?php if(($group_name == "Mortgage")) echo "class='dropdown-item  active'"; ?> class='dropdown-item'><i class="fa-solid fa-caret-right"></i> Mortgage Support</a>
                </li>
                <li>
                    <a href="https://www.flatworldsolutions.com/healthcare/" 
                   <?php if(($group_name == "Healthcare")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Healthcare BPO</a>
              </li>
                <li>
                    <a href="https://www.flatworldsolutions.com/creative-services/" 
                    <?php if(($group_name == "Creative")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Creative Services</a>
               </li>
                <li>
                  <a href="https://www.flatworldsolutions.com/data-management/" 
                  <?php if(($group_name == "Data_Entry")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Data Services</a>
               </li>
                <li>
                <a href="https://www.flatworldsolutions.com/insurance-bpo/" 
                <?php if(($group_name == "InsuranceBPO")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Insurance <br>BPO</a>
                </li>
               <li>
               <a href="https://www.flatworldsolutions.com/digital-photography/" 
               <?php if(($group_name == "Photo_Editing")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Photo Editing</a>
                </li>
                <li>
                <a href="https://www.flatworldsolutions.com/data-science/" 
                <?php if(($group_name == "Data_Science")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Data Science</a>
                </li>
                <li>
					<a href="https://www.flatworldsolutions.com/intelligent-automation-services/" <?php if(($path == "/intelligent-automation-services/default.php"))echo "class='dropdown-item  active'"; ?> class='dropdown-item'><i class="fa-solid fa-caret-right"></i> Automation Services</a>
                </li>
                 <li>
                <a href="https://www.flatworldsolutions.com/research-analysis/" 
                <?php if(($group_name == "Research_Analysis")) echo "class='dropdown-item  active'"; ?> class='dropdown-item '><i class="fa-solid fa-caret-right"></i> Research & Analysis</a>
                </li>
                <li><a href="https://www.flatworldsolutions.com/legal-services/" class="dropdown-item  
                    <?php if($path == "/legal-services/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Legal Process Outsourcing</a></li>

                    <li><a href="https://www.flatworldsolutions.com/customs-brokerage/" class="dropdown-item  
                    <?php if($path == "/customs-brokerage/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Customs Brokerage</a>
                    </li>

                    <li><a href="https://www.flatworldsolutions.com/logistics/" class="dropdown-item 
                    <?php if($path == "/logistics/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Logistics Services</a>
                    </li>

                    <li><a href="https://www.flatworldsolutions.com/transcription/" class="dropdown-item 
                    <?php if($path == "/transcription/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Transcription Services</a>
                    </li>

                    <li><a href="https://www.flatworldsolutions.com/translation/" class="dropdown-item  
                    <?php if($path == "/translation/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Translation Services</a>
                    </li>

                    <li><a href="/" class="dropdown-item  
                    <?php if($path == "/additional-services/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Additional Services</a>
                    </li>
                </ul>
              </li>
              <li class="nav-item"><a href="/industries/" class="nav-link 
                  <?php if($path == "/industries/default.php") echo 'active'; ?>">Industries</a>
              </li>                  
			  <li class="nav-item">
				<a href="https://www.flatworldsolutions.com/about-fws/" class="nav-link 
			  <?php if($path == "/about-fws/default.php") echo 'active'; ?>">About</a>
			  </li>
			              <li class="nav-item"><a href="https://www.flatworldsolutions.com/newsroom/" class="nav-link <?php if($path == '/newsroom/default.php' || $path == '/newsroom/boyne-connect.php' || $page == "flatworld-solutions-announces-new-logo") echo 'active';?>">News</a></li>
              <li class="nav-item dropdown">
                <ul class="dropdown-menu resources-menu" aria-labelledby="dropdownMenuButton2">
                <a href="https://www.flatworldsolutions.com/articles/" class="nav-link dropdown-toggle  <?php if($path == "https://www.flatworldsolutions.com/articles/default.php" || $path == "https://www.flatworldsolutions.com/success-stories/default.php" || $path == "https://www.flatworldsolutions.com/videos.php" || $path == "https://www.flatworldsolutions.com/customer-testimonials.php" || $path == "https://www.flatworldsolutions.com/customer-video-testimonials.php" && $path == "https://www.flatworldsolutions.com/infographics/default.php") echo 'active'; ?>" id="dropdownMenuButton2" data-mdb-toggle="dropdown" aria-expanded="false"> Resources</a>
                <ul class="dropdown-menu resources-menu" aria-labelledby="dropdownMenuButton2">
                 
                  <li><a href="/articles/" class="dropdown-item 
                  <?php if($path == "/articles/default.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Articles</a>
                  </li>

                  <li><a href="/success-stories/" class="dropdown-item 
                  <?php if($path == "/success-stories/default.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Success Stories</a>
                  </li>
                  
                  <li><a href="/videos.php" class="dropdown-item 
                  <?php if($path == "/videos.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Videos</a>
                  </li>

                  <li><a href="/customer-testimonials.php" class="dropdown-item 
                  <?php if($path == "/customer-testimonials.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Testimonials</a>
                  </li>

                  <li><a href="/customer-video-testimonials.php" class="dropdown-item 
                  <?php if($path == "/customer-video-testimonials.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Video Testimonials</a>
                  </li>

                  <li><a href="/infographics" class="dropdown-item 
                  <?php if($path == "/infographics/default.php") echo 'active'; ?>">
                  <i class="fa-solid fa-caret-right"></i> Infographics</a>
                  </li>
                </ul>
              </li>
                <li class="nav-item">
                    <a href="<?php echo $contact_page_url; ?>" id="top_cut" class="nav-link <?php if($path === $contact_page_url) echo 'active'; ?>" 
                    onclick="document.getElementById('top_cut').href='<?php echo $contact_page_url; ?>loc=TopNav&amp;url=<?php echo $tagpath;?>&amp;at=txt&amp;ft=Global&amp;cv=<?php echo $GAPageLevelVar;?>#top';">Contact</a>
                </li>
          </ul>
        </div> 
  <nav class="bg-dark navigation">
  <div class="container-fluid p-0">
    <div class="d-flex align-items-center">
        <div class="flex-shrink-0 d-none">
            <a href="#" class="btn-left btn-link p-2 toggle text-dark"><i class="fa-solid fa-angle-left"></i></a>
        </div>
        <div class="flex-grow-1 w-100">
            <ul class="nav nav-fill small position-relative flex-nowrap">
                <li class="nav-item">
                    <a href="/call-center-services/"  
                    <?php if(($group_name == "Call_Center")) echo "class='nav-link active'"; ?> class='nav-link'>Call <br />Center</a>
              
                </li>
                <li class="nav-item">
                    <a href="/engineering/" 
                    <?php if(($group_name == "ES_Eng")) echo "class='nav-link active'"; ?> class='nav-link'>Engineering <br />Services</a>
              
                </li>
                <li class="nav-item">
                    <a href="/IT-services/" 
                    <?php if(($group_name == "Software")) echo "class='nav-link active'"; ?> class='nav-link'>Software<br />Development</a>
              
                </li>
                <li class="nav-item">
                    <a href="/financial-services/" 
                    <?php if(($group_name == "Financial")) echo "class='nav-link active'"; ?> class='nav-link'>Finance & <br />Accounting</a>
               </li>
                <li class="nav-item">
                    <a href="/mortgage/"
                    <?php if(($group_name == "Mortgage")) echo "class='nav-link active'"; ?> class='nav-link'>Mortgage <br />Support</a>
                </li>
                <li class="nav-item">
                    <a href="/healthcare/" 
                   <?php if(($group_name == "Healthcare")) echo "class='nav-link active'"; ?> class='nav-link'>Healthcare <br />BPO</a>
              </li>
                <li class="nav-item">
                    <a href="/creative-services/" 
                    <?php if(($group_name == "Creative")) echo "class='nav-link active'"; ?> class='nav-link'>Creative <br />Services</a>
               </li>
                <li class="nav-item">
                  <a href="/data-management/" 
                  <?php if(($group_name == "Data_Entry")) echo "class='nav-link active'"; ?> class='nav-link'>Data <br />Services</a>
               </li>
                <li class="nav-item">
                <a href="/insurance-bpo/" 
                <?php if(($group_name == "InsuranceBPO")) echo "class='nav-link active'"; ?> class='nav-link'>Insurance <br />BPo</a>
                </li>
               <li class="nav-item">
               <a href="/digital-photography/" 
               <?php if(($group_name == "Photo_Editing")) echo "class='nav-link active'"; ?> class='nav-link'>Photo <br/>Editing</a>
                </li>
                <li class="nav-item">
					<a href="/data-science/"<?php if(($group_name == "Data_Science")) echo "class='nav-link active'"; ?> class='nav-link'>Data <br />Science</a>
                </li>
                
                 <!--<li class="nav-item">
					<a href="/research-analysis/"<?php //if(($group_name == "Research_Analysis")) echo "class='nav-link active'"; ?> class='nav-link'>Research & <br />Analysis</a>
                </li>-->
				
				<li class="nav-item">
					<a href="/intelligent-automation-services/" <?php if(($path == "/intelligent-automation-services/default.php")) echo "class='nav-link active'"; ?> class='nav-link'> Automation <br>Services</a>
                </li>
                
                <li class="nav-item dropdown">                    
					<a href="#" class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">More <br/>Services<b class="caret"></b></a>
					<div class="dropdown-menu more-services-dd px-3">
					<ul aria-labelledby="dropdownMenuLink">
					
					<li>
						<a href="/research-analysis/" class="dropdown-item <?php if(($group_name == "Research_Analysis")) echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Research & Analysis</a>
					</li>

                  <li><a href="/legal-services/" class="dropdown-item 
                  <?php if($path == "/legal-services/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Legal Process Outsourcing</a></li>

                  <li><a href="/customs-brokerage/" class="dropdown-item 
                  <?php if($path == "/customs-brokerage/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Customs Brokerage</a>
                  </li>

                  <li><a href="/logistics/" class="dropdown-item
                  <?php if($path == "/logistics/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Logistics Services</a>
                  </li>

                  <li><a href="/transcription/" class="dropdown-item
                  <?php if($path == "/transcription/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Transcription Services</a>
                  </li>

                  <li><a href="/translation/" class="dropdown-item 
                  <?php if($path == "/translation/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Translation Services</a>
                  </li>

                  <li><a href="/additional-services/" class="dropdown-item 
                  <?php if($path == "/additional-services/default.php") echo 'active'; ?>"><i class="fa-solid fa-caret-right"></i> Additional Services</a>
                  </li>
                  </ul>
                      <div class="para px-3"><p><b>F</b>latworld Solutions offers a gamut of services for small, medium &amp; large organizations.</p>
					            	<a href="/view-our-services.php">View all services <i class="fa-solid fa-arrow-right"></i></a>
					            </div>
                    </div>                
                </li>
            </ul>
        </div>
        <!--<div class="flex-shrink-0">
            <a href="#" class="btn-right btn-link toggle p-2 text-dark"><i class="fa-solid fa-angle-right"></i></a>
        </div>-->
    </div>
</div>
</nav>
</header>
<!--PreLoader-->
<!--<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>-->
<!--PreLoader Ends-->


<main>