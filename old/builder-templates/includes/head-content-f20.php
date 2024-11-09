<?php
	$path = $_SERVER['SCRIPT_NAME'];
  $page = basename($path);
  $page = basename($path, '.php');
	$currentpage_url = htmlentities($_SERVER["REQUEST_URI"]);
  //echo $page;
  //echo $path;

	// fo_r the Tagging path and BreadCrumb Current page
	if($page == "default"){
		$tagpath = substr($path,0,-11);
		$BreadcrumbCPL = substr($path,0,-11);
	}else{
		$tagpath = $page;
		$BreadcrumbCPL = $path;
	}

	//echo $BreadcrumbCPL;

	// fo_r the Tagging path
	if($page == "default"){
	$tagpath = substr($path,0,-11);
	}else{
		$tagpath = $page;
	}
	//echo $tagpath;
	// fo_r the Tagging path

	// To check the service names
	include "https://www.flatworldsolutions.com/includes/page-group.php";
	
	

	include "https://www.flatworldsolutions.com/includes/group-name-service.php";
	include "https://www.flatworldsolutions.com/includes/phone-number1.php";
	
	$GetCountryCode = "";
	if (isset($_COOKIE["CountryCode"])){
		$GetCountryCode = $_COOKIE["CountryCode"];
	}else{
		$GetCountryCode = $country_code;
	}

	// Fo_r the Canonical Tag
	$canonicalparamcheck = stristr($_SERVER['SCRIPT_NAME'], '?');
	$canonical_defaultpage_check = stristr($_SERVER['SCRIPT_NAME'], 'default.php');
	$remove_default = str_replace("default.php","",$_SERVER['SCRIPT_NAME']);
	//echo $remove_default;
	//echo $_SERVER["SCRIPT_NAME"];	
	// Fo_r the Canonical Tag
//echo $path;
if($canonical_defaultpage_check!=""){
?>
<link rel="canonical" href="https://www.flatworldsolutions.com<?php echo $remove_default;?>" />
<?php	}else{?>
<link rel="canonical" href="https://www.flatworldsolutions.com<?php echo $_SERVER['SCRIPT_NAME'];?>" />
<?php	} ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


<?php
	/* For_Page_Level Custom Variable */
	if(empty($group_name) && empty($page_type)){
		$GAPageLevelVar = "unknown_group-unknown_type";
	}elseif(!empty($group_name) && empty($page_type)){
		$GAPageLevelVar = $group_name."-unknown_type";
	}elseif(!empty($group_name) && !empty($page_type)){
		$GAPageLevelVar = $group_name."-".$page_type;
	}

	/* For_Visit_Level Custom Variable */
	if(empty($group_name) && empty($page_type)){
		$GAVisitLevelVar = "unknown_group-unknown_type";
	}elseif(!empty($group_name) && empty($page_type)){
		$GAVisitLevelVar = $group_name."-unknown_type";
	}elseif(!empty($group_name) && !empty($page_type)){
		$GAVisitLevelVar = $group_name."-".$page_type;
	}
	//echo $GAVisitLevelVar;
?>

<script type="text/javascript">
	/* FUNCTION TO GET THE COOKIE */
	function getCookie(c_name)
	{
	if (document.cookie.length>0)
		{
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1)
			{ 
			c_start=c_start + c_name.length+1; 
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
			} 
		}
	return "";
	}
	/* FUNCTION TO GET THE COOKIE */

	/* FUNCTION TO CREATE THE COOKIE */
	function setCookie(c_name,value,expiredays,path)
	{
		var exdate = new Date();
		exdate.setDate(exdate.getDate()+expiredays);
		document.cookie = c_name + "=" + escape(value) +
		((expiredays==null) ? "" : ";expires=" + exdate.toGMTString()) + "; path=" + escape ( path );;
	}
	/* FUNCTION TO CREATE THE COOKIE */
</script>

<script>
/* Delete the Cookie if the Visitor is Idle for more than 30 minutes */
var idleTime = 0;
	$(document).ready(function (){
		var idleInterval = setInterval(timerIncrement, 1800000); // 30 Minutes
	$(this).mousemove(function (e){
		idleTime = 0;
	});
	$(this).keypress(function (e){
		idleTime = 0;
	});
	});

	function timerIncrement(){
		idleTime = idleTime + 1;
		if (idleTime > 1) {
			//alert("No Activity for 30 Minutes");
			setCookie("GAVisitLevelVar",GAVisitLevelValue,-1,"/"); // Delete the Cookie
			setCookie("GAVisitLevelVarTimer",date1,-1,"/"); // Delete the Cookie
		}
	}
</script>

<script type="text/javascript">
	
  var _gaq = _gaq || [];
  
	/* 1. Number of visits to a service/section - Scope:3 (Page Level) */
		

	var VisitCustVariable = getCookie('GAVisitLevelVar');	// Get the Cookie if already Created
	if ((VisitCustVariable == "") || (VisitCustVariable == null)) // Check if Cookie already Created, if not Create
	{
		var date1 = new Date();
		var GAVisitLevelValue = '<?php echo $GAVisitLevelVar; ?>';
		//alert(GAVisitLevelValue);
		setCookie("GAVisitLevelVar",GAVisitLevelValue,1,"/"); // Create Cookie with PageCategory and PageType
		setCookie("GAVisitLevelVarTimer",date1,1,"/"); // Create Cookie with Timer
		setCookie("GAVisitLevelVarStartTime",date1,1,"/"); // Create Cookie with Time Entered First
		/* 2. Number of visits landed on a specific service/section - Scope:2 (Visit Level) */
	}

	var GAVarDate1 = new Date(getCookie('GAVisitLevelVarTimer'));
	var GAVarDate2 = new Date();
	var DateDiff = (GAVarDate2 - GAVarDate1) / 1000;	// Get the Time Difference in Second between the Times
	//alert (DateDiff);
	if(DateDiff <= "1800"){ // Visitor is within Session time 30 Minutes
		//alert("Within Session time 30 Minutes")
		var dateplus = new Date();
		setCookie("GAVisitLevelVarTimer",dateplus,1,"/"); // Keep update with current time
	}else if(DateDiff >= "1800"){ // Visitor is out of Session of 30 Minutes
		//alert("Over 30 Minutes, Session Out");
		setCookie("GAVisitLevelVar",GAVisitLevelValue,-1,"/"); // Delete the Cookie
		setCookie("GAVisitLevelVarTimer",date1,-1,"/"); // Delete the Cookie
	}	
	
	<?php 
	if ($page_type == "FormPage"){
		if(isset($_GET['cv']))$cv = $_GET['cv']; else $cv = 'unknown_group';
		if(isset($_GET['ft']))$ft = $_GET['ft']; else $ft = 'unknown_pagetype';
	?>
	/* 3. Identify the trigger page to the form page - Scope:3 (Page Level) */
	<?php } ?>

	<?php
	if ($group_name == "ThankYou_Page"){
	$ga_utmb = $_COOKIE["__utmb"];
	?>
	/* 4. Capture the visitor data at visit level who complete the form filling process - Scope:2 (Visit Level) */
	<?php }	?>

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();	
  
</script>
<!-- End GA code -->
<link rel="shortcut icon" type="image/ico" href="https://www.flatworldsolutions.com/images/flatworld.ico">
<link rel="stylesheet" href="https://www.flatworldsolutions.com/css/animate.min.css">

<link href="https://www.flatworldsolutions.com/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">

<!-- Custom styles for this template -->
<link href="https://www.flatworldsolutions.com/css/styles-nd.css?v16-03-2024" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://www.flatworldsolutions.com/css/contact-us-nd.css?v18-03-2024">

<!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="https://www.flatworldsolutions.com/css/service-home-nd.css?v18-03-2024">
<link rel="stylesheet" href="https://www.flatworldsolutions.com/css/inner-pages-nd.css?v18-03-2024">

<!-- Style-responsive css -->
<link rel="stylesheet" type="text/css" href="https://www.flatworldsolutions.com/css/responsive.css?v29-12-2023">

<!-- <link href="https://cdn.jsdelivr.net/npm/fancybox@3.0.1/dist/css/jquery.fancybox.min.css" rel="stylesheet"> -->

<!-- Start Kanagaraj Upload New Landing Inner page css -->
<!-- Owl Carousel Min Css -->
<link rel="stylesheet" href="https://www.flatworldsolutions.com/css/owl.carousel.min.css?v18-02-2024">
<!-- Landing page inner Css -->
<link rel="stylesheet" href="https://www.flatworldsolutions.com/css/style-inner-page-landing.css?v18-03-2024">
<!-- Jquery Fanxybox New Css -->
<link rel="stylesheet" href="https://www.flatworldsolutions.com/css/jquery.fancybox.min-new-fancy.css?v18-02-2024">
<!-- End Kanagaraj Upload New Landing Inner page css -->

 <style>
  @font-face {
   font-family: 'Parrish';
   src: url('https://www.flatworldsolutions.com/font/Parrish.otf') format('opentype');
   font-weight: normal;
   font-style: normal;
  }
  @font-face {
   font-family: 'Rubik-Light';
   src: url('https://www.flatworldsolutions.com/font/Rubik-Light.ttf') format('TrueType');
   font-weight: normal;
   font-style: normal;
  }
    @font-face {
   font-family: 'Rubik-Medium';
   src: url('https://www.flatworldsolutions.com/font/Rubik-Medium.ttf') format('TrueType');
   font-weight: 500;
   font-style: 500;
  }
      @font-face {
   font-family: 'Rubik';
   src: url('https://www.flatworldsolutions.com/font/Rubik-Regular.ttf') format('TrueType');
   font-weight: normal;
   font-style: normal;
  }
 </style>	
 <!-- NEW DESIGN CONDITION--->

<script>
/*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
/* This file is meant as a standalone workflow for
- testing support for link[rel=preload]
- enabling async CSS loading in browsers that do not support rel=preload
- applying rel preload css once loaded, whether supported or not.
*/
(function( w ){
	"use strict";
	// rel=preload support test
	if( !w.loadCSS ){
		w.loadCSS = function(){};
	}
	// define on the loadCSS obj
	var rp = loadCSS.relpreload = {};
	// rel=preload feature support test
	// runs once and returns a function for compat purposes
	rp.support = (function(){
		var ret;
		try {
			ret = w.document.createElement( "link" ).relList.supports( "preload" );
		} catch (e) {
			ret = false;
		}
		return function(){
			return ret;
		};
	})();

	// if preload isn't supported, get an asynchronous load by using a non-matching media attribute
	// then change that media back to its intended value on load
	rp.bindMediaToggle = function( link ){
		// remember existing media attr for ultimate state, or default to 'all'
		var finalMedia = link.media || "all";

		function enableStylesheet(){
			// unbind listeners
			if( link.addEventListener ){
				link.removeEventListener( "load", enableStylesheet );
			} else if( link.attachEvent ){
				link.detachEvent( "onload", enableStylesheet );
			}
			link.setAttribute( "onload", null ); 
			link.media = finalMedia;
		}

		// bind load handlers to enable media
		if( link.addEventListener ){
			link.addEventListener( "load", enableStylesheet );
		} else if( link.attachEvent ){
			link.attachEvent( "onload", enableStylesheet );
		}

		// Set rel and non-applicable media type to start an async request
		// note: timeout allows this to happen async to let rendering continue in IE
		setTimeout(function(){
			link.rel = "stylesheet";
			link.media = "only x";
		});
		// also enable media after 3 seconds,
		// which will catch very old browsers (android 2.x, old firefox) that don't support onload on link
		setTimeout( enableStylesheet, 3000 );
	};

	// loop through link elements in DOM
	rp.poly = function(){
		// double check this to prevent external calls from running
		if( rp.support() ){
			return;
		}
		var links = w.document.getElementsByTagName( "link" );
		for( var i = 0; i < links.length; i++ ){
			var link = links[ i ];
			// qualify links to those with rel=preload and as=style attrs
			if( link.rel === "preload" && link.getAttribute( "as" ) === "style" && !link.getAttribute( "data-loadcss" ) ){
				// prevent rerunning on link
				link.setAttribute( "data-loadcss", true );
				// bind listeners to toggle media back
				rp.bindMediaToggle( link );
			}
		}
	};

	// if unsupported, run the polyfill
	if( !rp.support() ){
		// run once at least
		rp.poly();

		// rerun poly on an interval until onload
		var run = w.setInterval( rp.poly, 500 );
		if( w.addEventListener ){
			w.addEventListener( "load", function(){
				rp.poly();
				w.clearInterval( run );
			} );
		} else if( w.attachEvent ){
			w.attachEvent( "onload", function(){
				rp.poly();
				w.clearInterval( run );
			} );
		}
	}


	// commonjs
	if( typeof exports !== "undefined" ){
		exports.loadCSS = loadCSS;
	}
	else {
		w.loadCSS = loadCSS;
	}
}( typeof global !== "undefined" ? global : this ) );
</script>