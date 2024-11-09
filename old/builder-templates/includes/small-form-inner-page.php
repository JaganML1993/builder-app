<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/group-name-service.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/forms/form-country-check.php";

// Check if the CountryCode Cookie is Set Else Null
?>

<form name="smallform" method="post" action="/forms/small-form-conventional-submit.php" id="smallform" onsubmit="return ValidateSmallForm(this)" enctype="multipart/form-data">
<div class="container">
<div class="row get-quote">
<div class="col-md-6 col-lg-4  col-sm-6">
		<h2>Talk to Our Experts</h2>
	</div>
	<div class="col-md-6 col-lg-8 col-sm-6">
		<p>Schedule Your Free Consultation</p>
	</div>
	<div class="col-12">
		<div class="row">
		

		<div class="col-sm-6 col-lg-2 pe-md-1 py-2 py-md-0"><input class="form-control" type="text" name="FirstName" id="FirstName" placeholder="Name*" aria-label="Name" required> </div>
		<div class="col-sm-6 col-lg-2 pe-md-1 py-2 py-md-0"><input class="form-control" type="email" name="Email" id="Email" placeholder="Email*" aria-label="Email" required onchange="document.getElementById('captcha1').src = '/forms/captcha3/securimage_show.php?namespace=captcha_one;&amp;' + Math.random(); return false"></div>
		<div class="col-sm-6 col-lg-2 pe-md-1 py-2 py-md-0"><input class="form-control" type="text" name="phone" id="phone" placeholder="Phone*" aria-label="Number" required></div>
		<div class="col-sm-6 col-lg-2 pe-md-1 py-2 py-md-0">
			<select class="form-select"name="country" id="country" aria-label="Select Country">
			<option value="">Country*</option>
			<option value="0060others" <?php if($country_code_select == "0060others") echo 'selected="selected"';?>>Others</option>
			<option value="0001USA" <?php if($country_code_select == "0001USA") echo 'selected="selected"';?>>USA</option>
			<option value="0002Canada" <?php if($country_code_select == "0002Canada") echo 'selected="selected"';?>>Canada</option>
			<option value="0003UK" <?php if($country_code_select == "0003UK") echo 'selected="selected"';?>>UK</option>
			<option value="0004Australia" <?php if($country_code_select == "0004Australia") echo 'selected="selected"';?>>Australia</option>
			<option value="0005Singapore" <?php if($country_code_select == "0005Singapore") echo 'selected="selected"';?>>Singapore</option>
			<option value="0006Japan" <?php if($country_code_select == "0006Japan") echo 'selected="selected"';?>>Japan</option>
			<option value="0007Russia" <?php if($country_code_select == "0007Russia") echo 'selected="selected"';?>>Russia</option>
			<option value="0008India" <?php if($country_code_select == "0008India") echo 'selected="selected"';?>>India</option>
			<option value="0009UAE" <?php if($country_code_select == "0009UAE") echo 'selected="selected"';?>>UAE</option>
			<option value="0010Saudi Arabia" <?php if($country_code_select == "0010Saudi Arabia") echo 'selected="selected"';?>>Saudi Arabia</option>
			<option value="0011Bangladesh" <?php if($country_code_select == "0011Bangladesh") echo 'selected="selected"';?>>Bangladesh</option>
			<option value="0218Belarus" <?php if($country_code_select == "0218Belarus") echo 'selected="selected"';?>>Belarus</option>
			<option value="0219Bouvet Island" <?php if($country_code_select == "0219Bouvet Island") echo 'selected="selected"';?>>Bouvet Island</option>
			<option value="0220British Indian Ocean Territory" <?php if($country_code_select == "0220British Indian Ocean Territory") echo 'selected="selected"';?>>British Indian Ocean Territory</option>
			<option value="0221British Virgin Islands" <?php if($country_code_select == "0221British Virgin Islands") echo 'selected="selected"';?>>British Virgin Islands</option>
			<option value="0222Burma" <?php if($country_code_select == "0222Burma") echo 'selected="selected"';?>>Burma</option>
			<option value="0215Afghanistan" <?php if($country_code_select == "0215Afghanistan") echo 'selected="selected"';?>>Afghanistan</option>
			<option value="0078Albania" <?php if($country_code_select == "0078Albania") echo 'selected="selected"';?>>Albania</option>
			<option value="0079Algeria" <?php if($country_code_select == "0079Algeria") echo 'selected="selected"';?>>Algeria</option>
			<option value="0216American Samoa" <?php if($country_code_select == "0216American Samoa") echo 'selected="selected"';?>>American Samoa</option>
			<option value="0080Andorra" <?php if($country_code_select == "0080Andorra") echo 'selected="selected"';?>>Andorra</option>
			<option value="0081Angola" <?php if($country_code_select == "0081Angola") echo 'selected="selected"';?>>Angola</option>
			<option value="0082Anguilla" <?php if($country_code_select == "0082Anguilla") echo 'selected="selected"';?>>Anguilla</option>
			<option value="0217Antarctica" <?php if($country_code_select == "0217Antarctica") echo 'selected="selected"';?>>Antarctica</option>
			<option value="0083Antigua and Barbuda" <?php if($country_code_select == "0083Antigua and Barbuda") echo 'selected="selected"';?>>Antigua and Barbuda</option>
			<option value="0012Argentina" <?php if($country_code_select == "0012Argentina") echo 'selected="selected"';?>>Argentina</option>
			<option value="0084Armenia" <?php if($country_code_select == "0084Armenia") echo 'selected="selected"';?>>Armenia</option>
			<option value="0085Aruba" <?php if($country_code_select == "0085Aruba") echo 'selected="selected"';?>>Aruba</option>
			<option value="0013Austria" <?php if($country_code_select == "0013Austria") echo 'selected="selected"';?>>Austria</option>
			<option value="0086Azerbaijan Republic" <?php if($country_code_select == "0086Azerbaijan Republic") echo 'selected="selected"';?>>Azerbaijan Republic</option>
			<option value="0015Bahamas" <?php if($country_code_select == "0015Bahamas") echo 'selected="selected"';?>>Bahamas</option>
			<option value="0014Bahrain" <?php if($country_code_select == "0014Bahrain") echo 'selected="selected"';?>>Bahrain</option>
			<option value="0087Barbados" <?php if($country_code_select == "0087Barbados") echo 'selected="selected"';?>>Barbados</option>
			<option value="0016Belgium" <?php if($country_code_select == "0016Belgium") echo 'selected="selected"';?>>Belgium</option>
			<option value="0088Belize" <?php if($country_code_select == "0088Belize") echo 'selected="selected"';?>>Belize</option>
			<option value="0089Benin" <?php if($country_code_select == "0089Benin") echo 'selected="selected"';?>>Benin</option>
			<option value="0070Bermuda" <?php if($country_code_select == "0070Bermuda") echo 'selected="selected"';?>>Bermuda</option>
			<option value="0090Bhutan" <?php if($country_code_select == "0090Bhutan") echo 'selected="selected"';?>>Bhutan</option>
			<option value="0017Bolivia" <?php if($country_code_select == "0017Bolivia") echo 'selected="selected"';?>>Bolivia</option>
			<option value="0091Bosnia and Herzegowina" <?php if($country_code_select == "0091Bosnia and Herzegowina") echo 'selected="selected"';?>>Bosnia and Herzegowina</option>
			<option value="0092Botswana" <?php if($country_code_select == "0092Botswana") echo 'selected="selected"';?>>Botswana</option>
			<option value="0018Brazil" <?php if($country_code_select == "0018Brazil") echo 'selected="selected"';?>>Brazil</option>
			<option value="0093Brunei" <?php if($country_code_select == "0093Brunei") echo 'selected="selected"';?>>Brunei</option>
			<option value="0019Bulgaria" <?php if($country_code_select == "0019Bulgaria") echo 'selected="selected"';?>>Bulgaria</option>
			<option value="0094Burkina Faso" <?php if($country_code_select == "0094Burkina Faso") echo 'selected="selected"';?>>Burkina Faso</option>
			<option value="0095Burundi" <?php if($country_code_select == "0095Burundi") echo 'selected="selected"';?>>Burundi</option>
			<option value="0211Cameroon" <?php if($country_code_select == "0211Cameroon") echo 'selected="selected"';?>>Cameroon</option>
			<option value="0096Cambodia" <?php if($country_code_select == "0096Cambodia") echo 'selected="selected"';?>>Cambodia</option>
			<option value="0097Cape Verde" <?php if($country_code_select == "0097Cape Verde") echo 'selected="selected"';?>>Cape Verde</option>
			<option value="0098Cayman Islands" <?php if($country_code_select == "0098Cayman Islands") echo 'selected="selected"';?>>Cayman Islands</option>
			<option value="0224Central African Republic" <?php if($country_code_select == "0224Central African Republic") echo 'selected="selected"';?>>Central African Republic</option>
			<option value="0099Chad" <?php if($country_code_select == "0099Chad") echo 'selected="selected"';?>>Chad</option>
			<option value="0020Chile" <?php if($country_code_select == "0020Chile") echo 'selected="selected"';?>>Chile</option>
			<option value="0021China" <?php if($country_code_select == "0021China") echo 'selected="selected"';?>>China</option>
			<option value="0225Cocos (Keeling) Islands" <?php if($country_code_select == "0225Cocos (Keeling) Islands") echo 'selected="selected"';?>>Cocos (Keeling) Islands</option>
			<option value="0022Colombia" <?php if($country_code_select == "0022Colombia") echo 'selected="selected"';?>>Colombia</option>
			<option value="0100Comoros" <?php if($country_code_select == "0100Comoros") echo 'selected="selected"';?>>Comoros</option>
			<option value="0226Congo, Democratic Republic of the" <?php if($country_code_select == "0226Congo, Democratic Republic of the") echo 'selected="selected"';?>>Congo, Democratic Republic of the</option>
			<option value="0227Congo, Republic of the" <?php if($country_code_select == "0227Congo, Republic of the") echo 'selected="selected"';?>>Congo, Republic of the</option>
			<option value="0101Cook Islands" <?php if($country_code_select == "0101Cook Islands") echo 'selected="selected"';?>>Cook Islands</option>
			<option value="0023Costa Rica" <?php if($country_code_select == "0023Costa Rica") echo 'selected="selected"';?>>Costa Rica</option>
			<option value="0228Cote d'Ivoire" <?php if($country_code_select == "0228Cote d'Ivoire") echo 'selected="selected"';?>>Cote d'Ivoire</option>
			<option value="0024Croatia" <?php if($country_code_select == "0024Croatia") echo 'selected="selected"';?>>Croatia</option>
			<option value="0229Cuba" <?php if($country_code_select == "0229Cuba") echo 'selected="selected"';?>>Cuba</option>
			<option value="0230Curacao" <?php if($country_code_select == "0230Curacao") echo 'selected="selected"';?>>Curacao</option>
			<option value="0102Cyprus" <?php if($country_code_select == "0102Cyprus") echo 'selected="selected"';?>>Cyprus</option>
			<option value="0103Czech Republic" <?php if($country_code_select == "0103Czech Republic") echo 'selected="selected"';?>>Czech Republic</option>
			<option value="0104Democratic Republic of the Congo" <?php if($country_code_select == "0104Democratic Republic of the Congo") echo 'selected="selected"';?>>Democratic Republic of the Congo</option>
			<option value="0025Denmark" <?php if($country_code_select == "0025Denmark") echo 'selected="selected"';?>>Denmark</option>
			<option value="0105Djibouti" <?php if($country_code_select == "0105Djibouti") echo 'selected="selected"';?>>Djibouti</option>
			<option value="0106Dominica" <?php if($country_code_select == "0106Dominica") echo 'selected="selected"';?>>Dominica</option>
			<option value="0107Dominican Republic" <?php if($country_code_select == "0107Dominican Republic") echo 'selected="selected"';?>>Dominican Republic</option>
			<option value="0108Ecuador" <?php if($country_code_select == "0108Ecuador") echo 'selected="selected"';?>>Ecuador</option>
			<option value="0026Egypt" <?php if($country_code_select == "0026Egypt") echo 'selected="selected"';?>>Egypt</option>
			<option value="0109El Salvador" <?php if($country_code_select == "0109El Salvador") echo 'selected="selected"';?>>El Salvador</option>
			<option value="0110Eritrea" <?php if($country_code_select == "0110Eritrea") echo 'selected="selected"';?>>Eritrea</option>
			<option value="0111Estonia" <?php if($country_code_select == "0111Estonia") echo 'selected="selected"';?>>Estonia</option>
			<option value="0112Ethiopia" <?php if($country_code_select == "0112Ethiopia") echo 'selected="selected"';?>>Ethiopia</option>
			<option value="0231Equatorial Guinea" <?php if($country_code_select == "0231Equatorial Guinea") echo 'selected="selected"';?>>Equatorial Guinea</option>
			<option value="0113Falkland Islands" <?php if($country_code_select == "0113Falkland Islands") echo 'selected="selected"';?>>Falkland Islands</option>
			<option value="0114Faroe Islands" <?php if($country_code_select == "0114Faroe Islands") echo 'selected="selected"';?>>Faroe Islands</option>
			<option value="0115Federated States of Micronesia" <?php if($country_code_select == "0115Federated States of Micronesia") echo 'selected="selected"';?>>Federated States of Micronesia</option>
			<option value="0116Fiji" <?php if($country_code_select == "0116Fiji") echo 'selected="selected"';?>>Fiji</option>
			<option value="0027Finland" <?php if($country_code_select == "0027Finland") echo 'selected="selected"';?>>Finland</option>
			<option value="0028France" <?php if($country_code_select == "0028France") echo 'selected="selected"';?>>France</option>
			<option value="0232France, Metropolitan" <?php if($country_code_select == "0232France, Metropolitan") echo 'selected="selected"';?>>France, Metropolitan</option>
			<option value="0117French Guiana" <?php if($country_code_select == "0117French Guiana") echo 'selected="selected"';?>>French Guiana</option>
			<option value="1800French Polynesia" <?php if($country_code_select == "1800French Polynesia") echo 'selected="selected"';?>>French Polynesia</option>
			<option value="0233French Southern and Antarctic Lands" <?php if($country_code_select == "0233French Southern and Antarctic Lands") echo 'selected="selected"';?>>French Southern and Antarctic Lands</option>
			<option value="0119Gabon Republic" <?php if($country_code_select == "0119Gabon Republic") echo 'selected="selected"';?>>Gabon Republic</option>
			<option value="0120Gambia" <?php if($country_code_select == "0120Gambia") echo 'selected="selected"';?>>Gambia</option>
			<option value="0234Gaza Strip" <?php if($country_code_select == "0234Gaza Strip") echo 'selected="selected"';?>>Gaza Strip</option>
			<option value="0235Georgia" <?php if($country_code_select == "0235Georgia") echo 'selected="selected"';?>>Georgia</option>
			<option value="0029Germany" <?php if($country_code_select == "0029Germany") echo 'selected="selected"';?>>Germany</option>
			<option value="0236Ghana" <?php if($country_code_select == "0236Ghana") echo 'selected="selected"';?>>Ghana</option>
			<option value="0121Gibraltar" <?php if($country_code_select == "0121Gibraltar") echo 'selected="selected"';?>>Gibraltar</option>
			<option value="0030Greece" <?php if($country_code_select == "0030Greece") echo 'selected="selected"';?>>Greece</option>
			<option value="0122Greenland" <?php if($country_code_select == "0122Greenland") echo 'selected="selected"';?>>Greenland</option>
			<option value="0123Grenada" <?php if($country_code_select == "0123Grenada") echo 'selected="selected"';?>>Grenada</option>
			<option value="0124Guadeloupe" <?php if($country_code_select == "0124Guadeloupe") echo 'selected="selected"';?>>Guadeloupe</option>
			<option value="0237Guam" <?php if($country_code_select == "0237Guam") echo 'selected="selected"';?>>Guam</option>
			<option value="0238Guernsey" <?php if($country_code_select == "0238Guernsey") echo 'selected="selected"';?>>Guernsey</option>
			<option value="0125Guatemala" <?php if($country_code_select == "0125Guatemala") echo 'selected="selected"';?>>Guatemala</option>
			<option value="0127Guinea" <?php if($country_code_select == "0127Guinea") echo 'selected="selected"';?>>Guinea</option>
			<option value="0126Guinea Bissau" <?php if($country_code_select == "0126Guinea Bissau") echo 'selected="selected"';?>>Guinea Bissau</option>
			<option value="0128Guyana" <?php if($country_code_select == "0128Guyana") echo 'selected="selected"';?>>Guyana</option>
			<option value="0239Haiti" <?php if($country_code_select == "0239Haiti") echo 'selected="selected"';?>>Haiti</option>
			<option value="0240Heard Island and McDonald Islands" <?php if($country_code_select == "0240Heard Island and McDonald Islands") echo 'selected="selected"';?>>Heard Island and McDonald Islands</option>
			<option value="0129Honduras" <?php if($country_code_select == "0129Honduras") echo 'selected="selected"';?>>Honduras</option>
			<option value="0031Hong Kong" <?php if($country_code_select == "0031Hong Kong") echo 'selected="selected"';?>>Hong Kong</option>
			<option value="0130Hungary" <?php if($country_code_select == "0130Hungary") echo 'selected="selected"';?>>Hungary</option>
			<option value="0071Iceland" <?php if($country_code_select == "0071Iceland") echo 'selected="selected"';?>>Iceland</option>
			<option value="0032Indonesia" <?php if($country_code_select == "0032Indonesia") echo 'selected="selected"';?>>Indonesia</option>
			<option value="0241Iran" <?php if($country_code_select == "0241Iran") echo 'selected="selected"';?>>Iran</option>
			<option value="0242Iraq" <?php if($country_code_select == "0242Iraq") echo 'selected="selected"';?>>Iraq</option>
			<option value="0033Ireland" <?php if($country_code_select == "0033Ireland") echo 'selected="selected"';?>>Ireland</option>
			<option value="0035Israel" <?php if($country_code_select == "0035Israel") echo 'selected="selected"';?>>Israel</option>
			<option value="0243Isle of Man" <?php if($country_code_select == "0243Isle of Man") echo 'selected="selected"';?>>Isle of Man</option>
			<option value="0034Italy" <?php if($country_code_select == "0034Italy") echo 'selected="selected"';?>>Italy</option>
			<option value="0244Jersey" <?php if($country_code_select == "0244Jersey") echo 'selected="selected"';?>>Jersey</option>
			<option value="0131Jamaica" <?php if($country_code_select == "0131Jamaica") echo 'selected="selected"';?>>Jamaica</option>
			<option value="0036Jordan" <?php if($country_code_select == "0036Jordan") echo 'selected="selected"';?>>Jordan</option>
			<option value="0132Kazakhstan" <?php if($country_code_select == "0132Kazakhstan") echo 'selected="selected"';?>>Kazakhstan</option>
			<option value="0037Kenya" <?php if($country_code_select == "0037Kenya") echo 'selected="selected"';?>>Kenya</option>
			<option value="0133Kiribati" <?php if($country_code_select == "0133Kiribati") echo 'selected="selected"';?>>Kiribati</option>
			<option value="0038Korea" <?php if($country_code_select == "0038Korea") echo 'selected="selected"';?>>Korea</option>
			<option value="0039Kuwait" <?php if($country_code_select == "0039Kuwait") echo 'selected="selected"';?>>Kuwait</option>
			<option value="0134Kyrgyzstan" <?php if($country_code_select == "0134Kyrgyzstan") echo 'selected="selected"';?>>Kyrgyzstan</option>
			<option value="0135Laos" <?php if($country_code_select == "0135Laos") echo 'selected="selected"';?>>Laos</option>
			<option value="0136Latvia" <?php if($country_code_select == "0136Latvia") echo 'selected="selected"';?>>Latvia</option>
			<option value="0067Lebanon" <?php if($country_code_select == "0067Lebanon") echo 'selected="selected"';?>>Lebanon</option>
			<option value="0137Lesotho" <?php if($country_code_select == "0137Lesotho") echo 'selected="selected"';?>>Lesotho</option>
			<option value="0246Liberia" <?php if($country_code_select == "0246Liberia") echo 'selected="selected"';?>>Liberia</option>
			<option value="0247Libya" <?php if($country_code_select == "0247Libya") echo 'selected="selected"';?>>Libya</option>
			<option value="0138Liechtenstein" <?php if($country_code_select == "0138Liechtenstein") echo 'selected="selected"';?>>Liechtenstein</option>
			<option value="0139Lithuania" <?php if($country_code_select == "0139Lithuania") echo 'selected="selected"';?>>Lithuania</option>
			<option value="0072Luxembourg" <?php if($country_code_select == "0072Luxembourg") echo 'selected="selected"';?>>Luxembourg</option>
			<option value="0248Macau" <?php if($country_code_select == "0248Macau") echo 'selected="selected"';?>>Macau</option>
			<option value="0210Macedonia" <?php if($country_code_select == "0210Macedonia") echo 'selected="selected"';?>>Macedonia</option>
			<option value="0140Madagascar" <?php if($country_code_select == "0140Madagascar") echo 'selected="selected"';?>>Madagascar</option>
			<option value="0141Malawi" <?php if($country_code_select == "0141Malawi") echo 'selected="selected"';?>>Malawi</option>
			<option value="0040Malaysia" <?php if($country_code_select == "0040Malaysia") echo 'selected="selected"';?>>Malaysia</option>
			<option value="0142Maldives" <?php if($country_code_select == "0142Maldives") echo 'selected="selected"';?>>Maldives</option>
			<option value="0143Mali" <?php if($country_code_select == "0143Mali") echo 'selected="selected"';?>>Mali</option>
			<option value="0144Malta" <?php if($country_code_select == "0144Malta") echo 'selected="selected"';?>>Malta</option>
			<option value="0145Marshall Islands" <?php if($country_code_select == "0145Marshall Islands") echo 'selected="selected"';?>>Marshall Islands</option>
			<option value="0146Martinique" <?php if($country_code_select == "0146Martinique") echo 'selected="selected"';?>>Martinique</option>
			<option value="0147Mauritania" <?php if($country_code_select == "0147Mauritania") echo 'selected="selected"';?>>Mauritania</option>
			<option value="0041Mauritius" <?php if($country_code_select == "0041Mauritius") echo 'selected="selected"';?>>Mauritius</option>
			<option value="0148Mayotte" <?php if($country_code_select == "0148Mayotte") echo 'selected="selected"';?>>Mayotte</option>
			<option value="0042Mexico" <?php if($country_code_select == "0042Mexico") echo 'selected="selected"';?>>Mexico</option>
			<option value="0250Micronesia, Federated States of">Micronesia, Federated States of</option>
			<option value="0065Moldova" <?php if($country_code_select == "0065Moldova") echo 'selected="selected"';?>>Moldova</option>
			<option value="0213Monaco" <?php if($country_code_select == "0213Monaco") echo 'selected="selected"';?>>Monaco</option>
			<option value="0149Mongolia" <?php if($country_code_select == "0149Mongolia") echo 'selected="selected"';?>>Mongolia</option>
			<option value="0253Montenegro" <?php if($country_code_select == "0253Montenegro") echo 'selected="selected"';?>>Montenegro</option>
			<option value="0150Montserrat" <?php if($country_code_select == "0150Montserrat") echo 'selected="selected"';?>>Montserrat</option>
			<option value="0151Morocco" <?php if($country_code_select == "0151Morocco") echo 'selected="selected"';?>>Morocco</option>
			<option value="0152Mozambique" <?php if($country_code_select == "0152Mozambique") echo 'selected="selected"';?>>Mozambique</option>
			<option value="0066Namibia" <?php if($country_code_select == "0066Namibia") echo 'selected="selected"';?>>Namibia</option>
			<option value="0153Nauru" <?php if($country_code_select == "0153Nauru") echo 'selected="selected"';?>>Nauru</option>
			<option value="0154Nepal" <?php if($country_code_select == "0154Nepal") echo 'selected="selected"';?>>Nepal</option>
			<option value="0043Netherlands" <?php if($country_code_select == "0043Netherlands") echo 'selected="selected"';?>>Netherlands</option>
			<option value="0155Netherlands Antilles" <?php if($country_code_select == "0155Netherlands Antilles") echo 'selected="selected"';?>>Netherlands Antilles</option>
			<option value="0156New Caledonia" <?php if($country_code_select == "0156New Caledonia") echo 'selected="selected"';?>>New Caledonia</option>
			<option value="0044New Zealand" <?php if($country_code_select == "0044New Zealand") echo 'selected="selected"';?>>New Zealand</option>
			<option value="0157Nicaragua" <?php if($country_code_select == "0157Nicaragua") echo 'selected="selected"';?>>Nicaragua</option>
			<option value="0158Niger" <?php if($country_code_select == "0158Niger") echo 'selected="selected"';?>>Niger</option>
			<option value="0045Nigeria" <?php if($country_code_select == "0045Nigeria") echo 'selected="selected"';?>>Nigeria</option>
			<option value="0159Niue" <?php if($country_code_select == "0159Niue") echo 'selected="selected"';?>>Niue</option>
			<option value="0160Norfolk Island" <?php if($country_code_select == "0160Norfolk Island") echo 'selected="selected"';?>>Norfolk Island</option>
			<option value="0254Northern Mariana Islands" <?php if($country_code_select == "0254Northern Mariana Islands") echo 'selected="selected"';?>>Northern Mariana Islands</option>
			<option value="0046Norway" <?php if($country_code_select == "0046Norway") echo 'selected="selected"';?>>Norway</option>
			<option value="0047Oman" <?php if($country_code_select == "0047Oman") echo 'selected="selected"';?>>Oman</option>
			<option value="0048Pakistan" <?php if($country_code_select == "0048Pakistan") echo 'selected="selected"';?>>Pakistan</option>
			<option value="0161Palau" <?php if($country_code_select == "0161Palau") echo 'selected="selected"';?>>Palau</option>
			<option value="0162Panama" <?php if($country_code_select == "0162Panama") echo 'selected="selected"';?>>Panama</option>
			<option value="0163Papua New Guinea" <?php if($country_code_select == "0163Papua New Guinea") echo 'selected="selected"';?>>Papua New Guinea</option>
			<option value="0255Paraguay" <?php if($country_code_select == "0255Paraguay") echo 'selected="selected"';?>>Paraguay</option>
			<option value="0062Peru" <?php if($country_code_select == "0062Peru") echo 'selected="selected"';?>>Peru</option>
			<option value="0049Philippines" <?php if($country_code_select == "0049Philippines") echo 'selected="selected"';?>>Philippines</option>
			<option value="0164Pitcairn Islands" <?php if($country_code_select == "0164Pitcairn Islands") echo 'selected="selected"';?>>Pitcairn Islands</option>
			<option value="0214Puerto Rico" <?php if($country_code_select == "0214Puerto Rico") echo 'selected="selected"';?>>Puerto Rico</option>
			<option value="0050Poland" <?php if($country_code_select == "0050Poland") echo 'selected="selected"';?>>Poland</option>
			<option value="0068Portugal" <?php if($country_code_select == "0068Portugal") echo 'selected="selected"';?>>Portugal</option>
			<option value="0061Qatar" <?php if($country_code_select == "0061Qatar") echo 'selected="selected"';?>>Qatar</option>
			<option value="0165Republic of the Congo" <?php if($country_code_select == "0165Republic of the Congo") echo 'selected="selected"';?>>Republic of the Congo</option>
			<option value="0166Reunion" <?php if($country_code_select == "0166Reunion") echo 'selected="selected"';?>>Reunion</option>
			<option value="0167Romania" <?php if($country_code_select == "0167Romania") echo 'selected="selected"';?>>Romania</option>
			<option value="0168Rwanda" <?php if($country_code_select == "0168Rwanda") echo 'selected="selected"';?>>Rwanda</option>
			<option value="0257Saint Barthelemy" <?php if($country_code_select == "0257Saint Barthelemy") echo 'selected="selected"';?>>Saint Barthelemy</option>
			<option value="0258Saint Helena, Ascension, and Tristan da Cunha" <?php if($country_code_select == "0258Saint Helena, Ascension, and Tristan da Cunha") echo 'selected="selected"';?>>Saint Helena, Ascension, and Tristan da Cunha</option>
			<option value="0259Saint Kitts and Nevis" <?php if($country_code_select == "0259Saint Kitts and Nevis") echo 'selected="selected"';?>>Saint Kitts and Nevis</option>
			<option value="0260Saint Lucia" <?php if($country_code_select == "0260Saint Lucia") echo 'selected="selected"';?>>Saint Lucia</option>
			<option value="0261Saint Martin" <?php if($country_code_select == "0261Saint Martin") echo 'selected="selected"';?>>Saint Martin</option>
			<option value="0262Saint Pierre and Miquelon" <?php if($country_code_select == "0262Saint Pierre and Miquelon") echo 'selected="selected"';?>>Saint Pierre and Miquelon</option>
			<option value="0169Saint Vincent and the Grenadines" <?php if($country_code_select == "0169Saint Vincent and the Grenadines") echo 'selected="selected"';?>>Saint Vincent and the Grenadines</option>
			<option value="0170Samoa" <?php if($country_code_select == "0170Samoa") echo 'selected="selected"';?>>Samoa</option>
			<option value="0171San Marino" <?php if($country_code_select == "0171San Marino") echo 'selected="selected"';?>>San Marino</option>
			<option value="0172Sao Tome and Principe" <?php if($country_code_select == "0172Sao Tome and Principe") echo 'selected="selected"';?>>Sao Tome and Principe</option>
			<option value="0173Senegal" <?php if($country_code_select == "0173Senegal") echo 'selected="selected"';?>>Senegal</option>
			<option value="0263Serbia" <?php if($country_code_select == "0263Serbia") echo 'selected="selected"';?>>Serbia</option>
			<option value="0174Seychelles" <?php if($country_code_select == "0174Seychelles") echo 'selected="selected"';?>>Seychelles</option>
			<option value="0175Sierra Leone" <?php if($country_code_select == "0175Sierra Leone") echo 'selected="selected"';?>>Sierra Leone</option>
			<option value="0264Sint Maarten" <?php if($country_code_select == "0264Sint Maarten") echo 'selected="selected"';?>>Sint Maarten</option>
			<option value="0176Slovakia" <?php if($country_code_select == "0176Slovakia") echo 'selected="selected"';?>>Slovakia</option>
			<option value="0177Slovenia" <?php if($country_code_select == "0177Slovenia") echo 'selected="selected"';?>>Slovenia</option>
			<option value="0178Solomon Islands" <?php if($country_code_select == "0178Solomon Islands") echo 'selected="selected"';?>>Solomon Islands</option>
			<option value="0179Somalia" <?php if($country_code_select == "0179Somalia") echo 'selected="selected"';?>>Somalia</option>
			<option value="0051South Africa" <?php if($country_code_select == "0051South Africa") echo 'selected="selected"';?>>South Africa</option>
			<option value="0265South Georgia and the Islands" <?php if($country_code_select == "0265South Georgia and the Islands") echo 'selected="selected"';?>>South Georgia and the Islands</option>
			<option value="0180South Korea" <?php if($country_code_select == "0180South Korea") echo 'selected="selected"';?>>South Korea</option>
			<option value="0052Spain" <?php if($country_code_select == "0052Spain") echo 'selected="selected"';?>>Spain</option>
			<option value="0053Sri Lanka" <?php if($country_code_select == "0053Sri Lanka") echo 'selected="selected"';?>>Sri Lanka</option>
			<option value="0181St. Helena" <?php if($country_code_select == "0181St. Helena") echo 'selected="selected"';?>>St. Helena</option>
			<option value="0182St. Kitts and Nevis" <?php if($country_code_select == "0182St. Kitts and Nevis") echo 'selected="selected"';?>>St. Kitts and Nevis</option>
			<option value="0183St. Lucia" <?php if($country_code_select == "0183St. Lucia") echo 'selected="selected"';?>>St. Lucia</option>
			<option value="0184St. Pierre and Miquelon" <?php if($country_code_select == "0184St. Pierre and Miquelon") echo 'selected="selected"';?>>St. Pierre and Miquelon</option>
			<option value="0185Suriname" <?php if($country_code_select == "0185Suriname") echo 'selected="selected"';?>>Suriname</option>
			<option value="0186Svalbard and Jan Mayen Islands" <?php if($country_code_select == "0186Svalbard and Jan Mayen Islands") echo 'selected="selected"';?>>Svalbard and Jan Mayen Islands</option>
			<option value="0187Swaziland" <?php if($country_code_select == "0187Swaziland") echo 'selected="selected"';?>>Swaziland</option>
			<option value="0064Sweden" <?php if($country_code_select == "0064Sweden") echo 'selected="selected"';?>>Sweden</option>
			<option value="0054Switzerland" <?php if($country_code_select == "0054Switzerland") echo 'selected="selected"';?>>Switzerland</option>
			<option value="0055Syria" <?php if($country_code_select == "0055Syria") echo 'selected="selected"';?>>Syria</option>
			<option value="0188Taiwan" <?php if($country_code_select == "0188Taiwan") echo 'selected="selected"';?>>Taiwan</option>
			<option value="0189Tajikistan" <?php if($country_code_select == "0189Tajikistan") echo 'selected="selected"';?>>Tajikistan</option>
			<option value="0069Tanzania" <?php if($country_code_select == "0069Tanzania") echo 'selected="selected"';?>>Tanzania</option>
			<option value="0056Thailand" <?php if($country_code_select == "0056Thailand") echo 'selected="selected"';?>>Thailand</option>
			<option value="0266Timor" <?php if($country_code_select == "0266Timor") echo 'selected="selected"';?>>Timor</option>
			<option value="0190Togo" <?php if($country_code_select == "0190Togo") echo 'selected="selected"';?>>Togo</option>
			<option value="0267Tokelau" <?php if($country_code_select == "0267Tokelau") echo 'selected="selected"';?>>Tokelau</option>
			<option value="0191Tonga" <?php if($country_code_select == "0191Tonga") echo 'selected="selected"';?>>Tonga</option>
			<option value="0192Trinidad and Tobago" <?php if($country_code_select == "0192Trinidad and Tobago") echo 'selected="selected"';?>>Trinidad and Tobago</option>
			<option value="0193Tunisia" <?php if($country_code_select == "0193Tunisia") echo 'selected="selected"';?>>Tunisia</option>
			<option value="0194Turkey" <?php if($country_code_select == "0194Turkey") echo 'selected="selected"';?>>Turkey</option>
			<option value="0195Turkmenistan" <?php if($country_code_select == "0195Turkmenistan") echo 'selected="selected"';?>>Turkmenistan</option>
			<option value="0196Turks and Caicos Islands" <?php if($country_code_select == "0196Turks and Caicos Islands") echo 'selected="selected"';?>>Turks and Caicos Islands</option>
			<option value="0197Tuvalu" <?php if($country_code_select == "0197Tuvalu") echo 'selected="selected"';?>>Tuvalu</option>
			<option value="0198Uganda" <?php if($country_code_select == "0198Uganda") echo 'selected="selected"';?>>Uganda</option>
			<option value="0268United States Minor Outlying Islands" <?php if($country_code_select == "0268United States Minor Outlying Islands") echo 'selected="selected"';?>>United States Minor Outlying Islands</option>
			<option value="0199Ukraine" <?php if($country_code_select == "0199Ukraine") echo 'selected="selected"';?>>Ukraine</option>
			<option value="0200Uruguay" <?php if($country_code_select == "0200Uruguay") echo 'selected="selected"';?>>Uruguay</option>
			<option value="0269Uzbekistan" <?php if($country_code_select == "0269Uzbekistan") echo 'selected="selected"';?>>Uzbekistan</option>
			<option value="0201Vanuatu" <?php if($country_code_select == "0201Vanuatu") echo 'selected="selected"';?>>Vanuatu</option>
			<option value="0202Vatican City State" <?php if($country_code_select == "0202Vatican City State") echo 'selected="selected"';?>>Vatican City State</option>
			<option value="0203Venezuela" <?php if($country_code_select == "0203Venezuela") echo 'selected="selected"';?>>Venezuela</option>
			<option value="0057Vietnam" <?php if($country_code_select == "0057Vietnam") echo 'selected="selected"';?>>Vietnam</option>
			<option value="0058Virgin Islands" <?php if($country_code_select == "0058Virgin Islands") echo 'selected="selected"';?>>Virgin Islands</option>
			<option value="0204Wallis and Futuna Islands" <?php if($country_code_select == "0204Wallis and Futuna Islands") echo 'selected="selected"';?>>Wallis and Futuna Islands</option>
			<option value="0270West Bank" <?php if($country_code_select == "0270West Bank") echo 'selected="selected"';?>>West Bank</option>
			<option value="0271Western Sahara" <?php if($country_code_select == "0271Western Sahara") echo 'selected="selected"';?>>Western Sahara</option>
			<option value="0059Yemen" <?php if($country_code_select == "0059Yemen") echo 'selected="selected"';?>>Yemen</option>
			<option value="0205Zambia" <?php if($country_code_select == "0205Zambia") echo 'selected="selected"';?>>Zambia</option>
			<option value="0209Zimbabwe" <?php if($country_code_select == "0209Zimbabwe") echo 'selected="selected"';?>>Zimbabwe</option>
			</select>
	</div>
	
	<div class="col-sm-6 col-lg-2 pe-md-1 py-2 py-md-0"><textarea class="form-control" name="description" id="description" placeholder="Requirements*" id="floatingTextarea" required></textarea></div>
	<input type="hidden" name="sf_service_name" value="<?php echo $sf_service_name; ?>" />
	<input type="hidden" name="sf_sub_service_name" value="<?php echo $sf_sub_service_name; ?>" />
	<input type="hidden" name="sf_email_ID" value="<?php echo $sf_email_ID; ?>" />
	<input type="hidden" name="sf_Ack_email_ID" value="<?php echo $sf_Ack_email_ID; ?>" />
	<input type="hidden" name="currentpage_url" value="<?php echo $currentpage_url; ?>" />
	<input type="hidden" name="Referrer_Page_Category" value="<?php echo $group_name; ?>" />
	<input type="hidden" name="Referrer_Page_Type" value="<?php echo $page_type; ?>" />
	<input type="hidden" id="token" name="token">
	<input type="hidden" name="captcha_name" value="captcha_one">

	<input type="hidden" name="V_TimeZone" id="V_TimeZone" value="" />
	<script type="text/javascript">
	var d = new Date();
	var n = d.toTimeString();
	document.getElementById("V_TimeZone").value = n;
	</script>

	<div class="col-sm-3 col-lg-1  py-2 py-md-0 col-6 pe-md-1 captcha-box">
		<input type="text" class="form-control" name="captcha_number" id="captcha_number" placeholder="Captcha" size="4" autocomplete="off" minlength="4" maxlength="4" required /> 
	</div>
	<div class="col-sm-3 col-lg-1 py-2 py-md-0 col-6 captcha-box d-flex justify-content-left m-0 px-1">
		<img src="/forms/captcha3/securimage_show.php?namespace=captcha_one" id="captcha1" width="82" height="29" alt="" />
		<a href="#" onclick="document.getElementById('captcha1').src = '/forms/captcha3/securimage_show.php?namespace=captcha_one;&amp;' + Math.random(); return false" class="ms-1 mt-2"><i class="fas fa-sync-alt text-white"></i></a>	
	</div>

	<div class="col m-auto text-center mt-2 mt-sm-3 mt-md-3 mt-lg-3 d-block d-md-flex d-sm-flex">
		<input type="submit" value="Submit" class="btn btn-dark px-4 fw-bold">  <p class="sm-form-pp m-auto">We respect your privacy. <a href="#">Read our Policy</a>.</p> 
	</div>

	<div class="col-md-12 m-auto text-center mt-3">
	
	</div>

		</div>
	</div>

</div>
</div>
</form>