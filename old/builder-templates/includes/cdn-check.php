<?php
	ini_set( "display_errors", 0);
	$pathtest = $_SERVER['SCRIPT_NAME'];
  
	// START: Get the Current IP Location using the User IP Address
	if ($_SERVER["HTTP_HOST"] == "www.flatworldsolutions.com" || $_SERVER["HTTP_HOST"] == "flatworldsolutions.com"){
		if (!isset($_COOKIE["CountryCode"])){
			$Current_Visitor_IP = "";
			$Current_Visitor_IP = $_SERVER['REMOTE_ADDR']; // Get Current IP Address

			/* Code to Connect Maxmind Country Lookup Table and fetch Country Name */
			try
			{
				if ($connectionGEOIP = mysqli_connect("209.59.188.67","fwssiteusr_db1website","rIt77nBQp@hX","fwssiteusr_maxmind_country"))
				{		
					//echo "DB connected";
				}
				else
				{
					throw new Exception();
				}
			}
			catch(Exception $e)
			{
				//echo $e->getMessage();
				//echo "Catch";
			}

			$iplong = ip2long($Current_Visitor_IP);
			$Country_Query = "SELECT geoname_id FROM tbl_07_04Sep20_GeoIP2_Country WHERE $iplong BETWEEN uint_from_ip AND uint_to_ip LIMIT 1";
			//echo $Country_Query . "<br />";
			$Country_Row_Result = mysqli_query($connectionGEOIP,$Country_Query) or die(mysqli_error($connectionGEOIP));
			$Country_Row = mysqli_fetch_array($Country_Row_Result, MYSQLI_ASSOC);
			
			$CountryName_Query = "SELECT country_name, country_iso_code FROM tbl_07_04Sep20_GeoIP2_CountryNames WHERE geoname_id = $Country_Row[geoname_id]";
			$CountryName_Row_Result = mysqli_query($connectionGEOIP,$CountryName_Query) or die(mysqli_error($connectionGEOIP));
			$CountryName_Row = mysqli_fetch_array($CountryName_Row_Result, MYSQLI_ASSOC);
			//echo "Country Name: " . $CountryName_Row['country_name'] . "<br />";
			$country_code = $CountryName_Row['country_iso_code']; // Get 2 letter Country Code

			//mysqli_free_result($Country_Row_Result);
			//mysqli_free_result($CountryName_Row_Result);
			mysqli_close($connectionGEOIP);
			
			//echo $country_code;
			?>

			<script type="text/javascript">
			var MMCountryCodeCookieValue = <?php echo '"'.$country_code.'"'?>;
			//var MMVCityCountryTZCookieValue = <?php echo '"'.$VCityCountryTZ.'"'?>;
			setCookie("CountryCode",MMCountryCodeCookieValue,90,"/");
			//setCookie("VCityCountryTZ",MMVCityCountryTZCookieValue,90,"/");

			function setCookie(c_name,value,expiredays,path)
			{
			var exdate = new Date();
			exdate.setDate(exdate.getDate()+expiredays);
			document.cookie = c_name + "=" + escape(value) +
			((expiredays==null) ? "" : ";expires=" + exdate.toGMTString()) + "; path=" + escape ( path );
			}
			</script>

			<?php

			//setcookie("CountryCode",$country_code,0,'/');
			//setcookie("VCityCountryTZ",$VCityCountryTZ,0,'/');
			// NEW CODE ENDS HERE

		}

		// Start: Code block to check for New and Repeat Visitors
		if(!isset($_COOKIE["last_visit"])){
		
		/* Function to convert time zone from UTC to IST */
		function getLocalTime($ts, $offset)
		{
			return($ts - date("Z", $ts)) + (3600 * $offset);
		}

		$RV_ISTTime = date("Y-m-d", getLocalTime(time(), +5.5));
		/* Function to convert time zone from UTC to IST */
	?>
		<script type="text/javascript">
		setCookie("last_visit","<?php echo $RV_ISTTime; ?>",90,"/");
		function setCookie(c_name,value,expiredays,path)
		{
		var exdate = new Date();
		exdate.setDate(exdate.getDate()+expiredays);
		document.cookie = c_name + "=" + escape(value) +
		((expiredays==null) ? "" : ";expires=" + exdate.toGMTString()) + "; path=" + escape ( path );
		}
		</script>
	
	<?php
	}
	// Start: Code block to check for New and Repeat Visitors

	}
	// END: Get the Current IP Location using the User IP Address


	// Change the CDN path according to the Environment - Local and Online
	if($_SERVER["HTTP_HOST"] == "www.flatworldsolutions.com" ||  $_SERVER["HTTP_HOST"] == "flatworldsolutions.com"){
		$cdn_path = "https://cdn.flatworldsolutions.com";
		$wwwfws = "https://www.flatworldsolutions.com";
	}elseif($_SERVER["HTTP_HOST"] == "flatworldsolutionslocal"){
		$cdn_path = "";
		$wwwfws = "";
	}else{
		$cdn_path = "";
		$wwwfws = "";
	}

	// START: Detect the Device
	if($_SERVER["HTTP_HOST"] == "www.flatworldsolutions.com" ||  $_SERVER["HTTP_HOST"] == "flatworldsolutions.com"){
		include $_SERVER['DOCUMENT_ROOT']."/includes/MobileDetect.php";
		$detect = new \Detection\MobileDetect;
		$DeviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
		$ServerEnvironment = "Online";
	}else{
		$DeviceType = "AllDevices";
		$ServerEnvironment = "Local";
	}
	
	//$DeviceType = "tablet";
	//echo $DeviceType;
	// END: Detect the Device

	/* Global Variable for FWS Founded in 2004 */
	$FWS_Founded_2004_Years = "20 years";
	/* Global Variable for FWS Founded in 2004 */
?>

<?php
	if((!isset($_COOKIE["dt"])) && ($_COOKIE["dt"] == "")){
?>
	<script type="text/javascript">
	var DTCookieValue = <?php echo '"'.$DeviceType.'"'?>;
	setCookie("dt",DTCookieValue,90,"/")	

	function setCookie(c_name,value,expiredays,path)
	{
	var exdate = new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie = c_name + "=" + escape(value) +
	((expiredays==null) ? "" : ";expires=" + exdate.toGMTString()) + "; path=" + escape ( path );
	}

	</script>

<?php
	}
?>