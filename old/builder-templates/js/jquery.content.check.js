// Edited on 31May16
$(document).ready(function(){
function encode_cookie(cookie_value) { var coded_string = ""; for (var counter = 0; counter < cookie_value.length; counter++) { coded_string += cookie_value.charCodeAt(counter); if (counter < cookie_value.length - 1) { coded_string += ".";} } return coded_string; }
function decode_cookie(coded_string) { var cookie_value = ""; var code_array = coded_string.split("."); for (var counter = 0; counter < code_array.length; counter++) { cookie_value += String.fromCharCode(code_array[counter]) } return cookie_value; }
var httpswww_domain_name = decode_cookie("104.116.116.112.115.58.47.47.119.119.119.46.102.108.97.116.119.111.114.108.100.115.111.108.117.116.105.111.110.115.46.99.111.109");
var www_domain_name = decode_cookie("119.119.119.46.102.108.97.116.119.111.114.108.100.115.111.108.117.116.105.111.110.115.46.99.111.109");

//alert("Hi" + www_domain_name);
var domainname = document.domain; var fullurl = window.location.href; var currentDateTime = Date();
//alert("Hi1" + domainname);
if(domainname != www_domain_name){ $.ajax({url: httpswww_domain_name + "/forms/plagiarism-check.php?website=" + domainname, data: { website: domainname, pathname: fullurl, currentdate: currentDateTime }}); }else{  }
});