function validRequired(e,r){var t=!0;return""==e.value?(alert("Please enter"+r),e.focus(),e.style.background="",t=!1):e.style.background="",t}function validDrop(e,r){var t=!0;return 0==e.selectedIndex&&(alert("Please Select your "+r),t=!1),t}function emailCheck(e){var r='[^\\s\\(\\)<>@,;:\\\\\\"\\.\\[\\]]+',t="("+r+'|("[^"]*"))',a=new RegExp("^"+t+"(\\."+t+")*$"),n=new RegExp("^"+r+"(\\."+r+")*$"),t=e.match(/^(.+)@(.+)$/);if(null==t)return alert("Please enter your complete email address in the form: yourname@yourdomain.com"),!1;e=t[1],t=t[2];if(null==e.match(a))return alert("Cannot have more than one email-id"),!1;var i=t.match(/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/);if(null!=i){for(var s=1;s<=4;s++)if(255<i[s])return alert("Destination IP address is invalid!"),!1;return!0}if(null==t.match(n))return alert("The Email domain name doesn't seem to be valid."),!1;r=new RegExp(r,"g"),t=t.match(r),r=t.length;if(t[t.length-1].length<2||10<t[t.length-1].length)return alert("The Email address must end in a three-letter domain, or two letter country."),!1;if(r<2)return alert("This Email address is missing a hostname!"),!1;return!0}var dtCh="/",minYear=1900,maxYear=2100;function isInteger(e){for(var r=0;r<e.length;r++){var t=e.charAt(r);if(t<"0"||"9"<t)return!1}}function stripCharsInBag(e,r){for(var t="",a=0;a<e.length;a++){var n=e.charAt(a);-1==r.indexOf(n)&&(t+=n)}return t}function daysInFebruary(e){return e%4!=0||e%100==0&&e%400!=0?28:29}function DaysArray(e){for(var r=1;r<=e;r++)this[r]=31,4!=r&&6!=r&&9!=r&&11!=r||(this[r]=30),2==r&&(this[r]=29);return this}function isDate(e){var r=DaysArray(12),t=e.indexOf(dtCh),a=e.indexOf(dtCh,t+1),n=e.substring(0,t),i=e.substring(t+1,a),s=e.substring(a+1);strYr=s,"0"==n.charAt(0)&&1<n.length&&(n=n.substring(1)),"0"==i.charAt(0)&&1<i.length&&(i=i.substring(1));for(var l=1;l<=3;l++)"0"==strYr.charAt(0)&&1<strYr.length&&(strYr=strYr.substring(1));return month=parseInt(i),day=parseInt(n),year=parseInt(strYr),-1==t||-1==a?(alert("The date format should be : dd/mm/yyyy"),!1):i.length<1||month<1||12<month?(alert("Please enter a valid month"),!1):n.length<1||day<1||31<day||2==month&&day>daysInFebruary(year)||day>r[month]?(alert("Please enter a valid day"),!1):4!=s.length||0==year||year<minYear||year>maxYear?(alert("Please enter a valid 4 digit year"),!1):-1!=e.indexOf(dtCh,a+1)||0==isInteger(stripCharsInBag(e,dtCh))?(alert("Please enter a valid date"),!1):void 0}