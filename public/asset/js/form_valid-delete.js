// JavaScript Document
function isEmailAddr(email)
{
  var result = false;
  var theStr = new String(email);
  var index = theStr.indexOf("@");
  if (index > 0)
  {
    var pindex = theStr.indexOf(".",index);
    if ((pindex > index+1) && (theStr.length > pindex+1))
	result = true;
  }
  return result;
}
function echeck(str){
var at="@";
var dot=".";
var lat=str.indexOf(at);
var lstr=str.length;
var ldot=str.indexOf(dot);
if (str.indexOf(at)==-1){
   alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
   return false;
}
if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
   alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
   return false;
}
if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
	alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
	return false;
}
 if (str.indexOf(at,(lat+1))!=-1){
	alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
	return false;
 }
 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
	alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
	return false;
 }
 if (str.indexOf(dot,(lat+2))==-1){
	alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
	return false;
 }
 if (str.indexOf(" ")!=-1){
	alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
	return false;
 }
 return true;
}
function validRequired(formField,fieldLabel)
{
	var result = true;
	
	if (formField.value == "")
	{
		alert('Please enter your' + fieldLabel);
		formField.focus();
		result = false;
	}	
	return result;
}
function allDigits(str)
{
	return inValidCharSet(str,"0123456789");
}
function inValidCharSet(str,charset)
{
	var result = true;
	// Note: doesn't use regular expressions to avoid early Mac browser bugs	
	for (var i=0;i<str.length;i++)
		if (charset.indexOf(str.substr(i,1))<0)
		{
			result = false;
			break;
		}	
	return result;
}
function validEmail(formField,fieldLabel,required)
{
	var result = true;	
	//if (required && !validRequired(formField,fieldLabel))
		//result = false;
	/*if (result && ((formField.value.length < 3) || !isEmailAddr(formField.value)) )	{
		alert("Please enter a single complete email address in the form: yourname@yourdomain.com");
		formField.focus();
		result = false;
	}*/
	if (echeck(formField.value)==false){
		//formField.value="";
		formField.focus();
		return false;
	}   
  return result;
}
function validNum(formField,fieldLabel,required)
{
	var result = true;
	if (required && !validRequired(formField,fieldLabel))
		result = false;  
 	if (result)
 	{
 		if (!allDigits(formField.value))
 		{
 			alert('Please enter a number for the "' + fieldLabel +'" field.');
			formField.focus();		
			result = false;
		}
	} 	
	return result;
}
function validInt(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		var num = parseInt(formField.value,10);
 		if (isNaN(num))
 		{
 			alert('Please enter a valid telephone number.');
			formField.focus();		
			result = false;
		}
	} 	
	return result;
}
function validString(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		var num = parseInt(formField.value,10);
 		if (!isNaN(num))
 		{
 			alert('Please enter a valid' + fieldLabel);
			formField.focus();		
			result = false;
		}
	} 	
	return result;
}
function validDrop(formField,fieldLabel)
{
var result = true;

	if (formField.selectedIndex == 0) {
		alert('Please Select your ' + fieldLabel);
		result = false;
	};

	return result;
}
function validCheck(formField,fieldLabel)
{
var result = true;

	if (formField.Checked) {
		alert('Please Select your "' + fieldLabel +'" menu.');
		result = false;
	};

	return result;
}
function validRadio(formField,fieldLabel)
{
var result = false;
	for(var i = 0; i < formField.length; i++) {
		if (formField[i].checked)
		{
			result = true;
		}
	}
	if (!result)
	{
		alert('Please Select your "' + fieldLabel +'" menu.');
		result = false;
	}

	return result;
}
function validDate(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		var elems = formField.value.split("/"); 		
 		result = (elems.length == 3); // should be three components 		
 		if (result)
 		{
 			var month = parseInt(elems[0],10);
  			var day = parseInt(elems[1],10);
 			var year = parseInt(elems[2],10);
			result = allDigits(elems[0]) && (month > 0) && (month < 13) &&
					 allDigits(elems[1]) && (day > 0) && (day < 32) &&
					 allDigits(elems[2]) && ((elems[2].length == 2) || (elems[2].length == 4));
 		} 		
  		if (!result)
 		{
 			alert('Please enter a date in the format MM/DD/YYYY for the "' + fieldLabel +'" field.');
			formField.focus();		
		}
	} 	
	return result;
}
function validRadioSelected(formField,fieldLabel) {
	var radio_choice = false;
	for (counter = 0; counter < formField.length; counter++) {
		if (formField[counter].checked)
			radio_choice = true; 
	}
	if (!radio_choice) {
		alert('Please select a option for "' + fieldLabel + '" field.');
	} 
	return radio_choice;
}
// START: Validation for Default values like, Name*, Email*, Company*, Message* etc.. for Our Services Page
function validDefaultString(formField,fieldLabel,required)
{
	var result = true;
	if (required && !validDefaultRequired(formField,fieldLabel))
		result = false;  
 	/*if (result)
 	{
 		var num = parseInt(formField.value,10);
 		if (!isNaN(num))
 		{
 			alert('Please enter a valid' + fieldLabel);
			formField.focus();		
			result = false;
		}
	} */	
	return result;
}
function validDefaultRequired(formField,fieldLabel)
{
	var result = true;	
	if (formField.value == "" || formField.value == "Name*" || formField.value == "Telephone*" || formField.value == "Description*")
	{
		alert('Please enter Your' + fieldLabel);
		formField.focus();
		result = false;
	}	
	return result;
}
// END: Validation for Default values like, Name*, Email*, Company*, Message* etc.. for Our Services Page
//EMAIL VALIDAION STARTS HERE
function emailCheck (emailStr) {
/* The following pattern is used to check if the entered e-mail address
   fits the user@domain format.  It also is used to separate the username
   from the domain. */
var emailPat=/^(.+)@(.+)$/
/* The following string represents the pattern for matching all special
   characters.  We don't want to allow special characters in the address. 
   These characters include ( ) < > @ , ; : \ " . [ ]    */
var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
/* The following string represents the range of characters allowed in a 
   username or domainname.  It really states which chars aren't allowed. */
var validChars="\[^\\s" + specialChars + "\]"
/* The following pattern applies if the "user" is a quoted string (in
   which case, there are no rules about which characters are allowed
   and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
   is a legal e-mail address. */
var quotedUser="(\"[^\"]*\")"
/* The following pattern applies for domains that are IP addresses,
   rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
   e-mail address. NOTE: The square brackets are required. */
var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
/* The following string represents an atom (basically a series of
   non-special characters.) */
var atom=validChars + '+'
/* The following string represents one word in the typical username.
   For example, in john.doe@somewhere.com, john and doe are words.
   Basically, a word is either an atom or quoted string. */
var word="(" + atom + "|" + quotedUser + ")"
// The following pattern describes the structure of the user
var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
/* The following pattern describes the structure of a normal symbolic
   domain, as opposed to ipDomainPat, shown above. */
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
/* Finally, let's start trying to figure out if the supplied address is
   valid. */
/* Begin with the coarse pattern to simply break up user@domain into
   different pieces that are easy to analyze. */
var matchArray=emailStr.match(emailPat)
if (matchArray==null) {
  /* Too many/few @'s or something; basically, this address doesn't
     even fit the general mould of a valid e-mail address. */
	alert("Please enter your complete email address in the form: yourname@yourdomain.com")
	return false
}
var user=matchArray[1]
var domain=matchArray[2]
// See if "user" is valid 
if (user.match(userPat)==null) {
    // user is not valid
    alert("Cannot have more than one email-id")
    return false
}
/* if the e-mail address is at an IP address (as opposed to a symbolic
   host name) make sure the IP address is valid. */
var IPArray=domain.match(ipDomainPat)
if (IPArray!=null) {
    // this is an IP address
	  for (var i=1;i<=4;i++) {
	    if (IPArray[i]>255) {
	        alert("Destination IP address is invalid!")
		return false
	    }
    }
    return true
}
// Domain is symbolic name
var domainArray=domain.match(domainPat)
if (domainArray==null) {
	alert("The Email domain name doesn't seem to be valid.")
    return false
}
/* domain name seems valid, but now make sure that it ends in a
   three-letter word (like com, edu, gov) or a two-letter word,
   representing country (uk, nl), and that there's a hostname preceding 
   the domain or country. */

/* Now we need to break up the domain to get a count of how many atoms
   it consists of. */
var atomPat=new RegExp(atom,"g")
var domArr=domain.match(atomPat)
var len=domArr.length
if (domArr[domArr.length-1].length<2 || 
    domArr[domArr.length-1].length>10) {
   // the address must end in a two letter or three letter word.
   alert("The Email address must end in a three-letter domain, or two letter country.")
   return false
}
// Make sure there's a host name preceding the domain.
if (len<2) {
   var errStr="This Email address is missing a hostname!"
   alert(errStr)
   return false
}
// If we've gotten this far, everything's valid!
return true;
}
//End of Email Validation
//Start of Date Validation, format is (DD/MM/YYYY)
var dtCh= "/";
var minYear=1900;
var maxYear=2100;
function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
   // return true;
}
function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}
function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31;
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this;
}
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
		return false;
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month");
		return false;
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day");
		return false;
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year");
		return false;
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date");
		return false;
	}
// return true;
}
//End of Date validation