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