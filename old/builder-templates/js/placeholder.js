$(function(){(function(b){var a=function(e,f){var d=b(this).data("label");if(f&&f.type==="focusin"){d.css("opacity",e.placeholderFocusOpacity)}else{if(f&&f.type==="focusout"){d.css("opacity",e.placeholderOpacity)}}if(f&&f.type!=="keydown"){c(this,d)}else{(function(g){setTimeout(function(){c(g,d)},0)})(this)}};var c=function(d,e){if(b(d).val()){e.hide()}else{e.show()}};b.fn.stickyPlaceholders=function(d){var e={wrapperClass:"sticky-placeholder-wrapper",wrapperDisplay:"block",labelClass:"sticky-placeholder-label",placeholderAttr:"placeholderBigNameField",dataAttr:"data-sticky-placeholder",placeholderColor:"#000",placeholderOpacity:0.7,placeholderFocusOpacity:0.25,placeholderLineHeight:"34px",placeholderLeftMargin:"70px"};d=b.extend(e,d);return this.each(function(){var g=b(this),i=g.attr(d.placeholderAttr),j=b(this).wrap('<span class="'+d.wrapperClass+'" />').parent().css({position:"relative",display:d.wrapperDisplay}),h=b('<label class="'+d.labelClass+'" for="'+g.attr("id")+'">'+i+"</label>").appendTo(j),f;g.data("label",h);g.removeAttr("placeholder");if(d.dataAttr&&d.placeholderAttr!==d.dataAttr){g.attr("data-sticky-placeholder",i)}f={color:d.placeholderColor,cursor:"text","font-family":g.css("font-family"),"font-weight":g.css("font-weight"),"font-size":g.css("font-size"),left:parseInt(g.css("border-left-width"),10)+parseInt(g.css("margin-left"),10),"line-height":d.placeholderLineHeight,opacity:d.placeholderOpacity,"margin-left":d.placeholderLeftMargin,"padding-top":g.css("padding-top"),position:"absolute","text-transform":g.css("text-transform"),top:parseInt(g.css("border-top-width"),10)+parseInt(g.css("margin-top"),20)};h.css(f);if(g.val()){h.hide()}b(this).bind("keydown input focusin focusout",function(k){a.call(this,d,k)});h.bind("mousedown",function(k){k.preventDefault()});a.call(this,d)})}})(jQuery);$("[placeholderBigNameField]").stickyPlaceholders()});
	
$(function(){(function(b){var a=function(e,f){var d=b(this).data("label");if(f&&f.type==="focusin"){d.css("opacity",e.placeholderFocusOpacity)}else{if(f&&f.type==="focusout"){d.css("opacity",e.placeholderOpacity)}}if(f&&f.type!=="keydown"){c(this,d)}else{(function(g){setTimeout(function(){c(g,d)},0)})(this)}};var c=function(d,e){if(b(d).val()){e.hide()}else{e.show()}};b.fn.stickyPlaceholders=function(d){var e={wrapperClass:"sticky-placeholder-wrapper",wrapperDisplay:"block",labelClass:"sticky-placeholder-label",placeholderAttr:"placeholderBig",dataAttr:"data-sticky-placeholder",placeholderColor:"#000",placeholderOpacity:0.7,placeholderFocusOpacity:0.25,placeholderLineHeight:"34px"};d=b.extend(e,d);return this.each(function(){var g=b(this),i=g.attr(d.placeholderAttr),j=b(this).wrap('<span class="'+d.wrapperClass+'" />').parent().css({position:"relative",display:d.wrapperDisplay}),h=b('<label class="'+d.labelClass+'" for="'+g.attr("id")+'">'+i+"</label>").appendTo(j),f;g.data("label",h);g.removeAttr("placeholder");if(d.dataAttr&&d.placeholderAttr!==d.dataAttr){g.attr("data-sticky-placeholder",i)}f={color:d.placeholderColor,cursor:"text","font-family":g.css("font-family"),"font-weight":g.css("font-weight"),"font-size":g.css("font-size"),left:parseInt(g.css("border-left-width"),10)+parseInt(g.css("margin-left"),10),"line-height":d.placeholderLineHeight,opacity:d.placeholderOpacity,"padding-left":g.css("padding-left"),"padding-top":g.css("padding-top"),position:"absolute","text-transform":g.css("text-transform"),top:parseInt(g.css("border-top-width"),10)+parseInt(g.css("margin-top"),20)};h.css(f);if(g.val()){h.hide()}b(this).bind("keydown input focusin focusout",function(k){a.call(this,d,k)});h.bind("mousedown",function(k){k.preventDefault()});a.call(this,d)})}})(jQuery);$("[placeholderBig]").stickyPlaceholders()});
	
$(function(){(function(b){var a=function(e,f){var d=b(this).data("label");if(f&&f.type==="focusin"){d.css("opacity",e.placeholderFocusOpacity)}else{if(f&&f.type==="focusout"){d.css("opacity",e.placeholderOpacity)}}if(f&&f.type!=="keydown"){c(this,d)}else{(function(g){setTimeout(function(){c(g,d)},0)})(this)}};var c=function(d,e){if(b(d).val()){e.hide()}else{e.show()}};b.fn.stickyPlaceholders=function(d){var e={wrapperClass:"sticky-placeholder-wrapper",wrapperDisplay:"block",labelClass:"sticky-placeholder-label",placeholderAttr:"placeholdersmall",dataAttr:"data-sticky-placeholder",placeholderColor:"#000",placeholderOpacity:0.7,placeholderFocusOpacity:0.25,placeholderLineHeight:"18px"};d=b.extend(e,d);return this.each(function(){var g=b(this),i=g.attr(d.placeholderAttr),j=b(this).wrap('<span class="'+d.wrapperClass+'" />').parent().css({position:"relative",display:d.wrapperDisplay}),h=b('<label class="'+d.labelClass+'" for="'+g.attr("id")+'">'+i+"</label>").appendTo(j),f;g.data("label",h);g.removeAttr("placeholder");if(d.dataAttr&&d.placeholderAttr!==d.dataAttr){g.attr("data-sticky-placeholder",i)}f={color:d.placeholderColor,cursor:"text","font-family":g.css("font-family"),"font-weight":g.css("font-weight"),"font-size":g.css("font-size"),left:parseInt(g.css("border-left-width"),10)+parseInt(g.css("margin-left"),10),"line-height":d.placeholderLineHeight,opacity:d.placeholderOpacity,"padding-left":g.css("padding-left"),"padding-top":g.css("padding-top"),position:"absolute","text-transform":g.css("text-transform"),top:parseInt(g.css("border-top-width"),10)+parseInt(g.css("margin-top"),2)};h.css(f);if(g.val()){h.hide()}b(this).bind("keydown input focusin focusout",function(k){a.call(this,d,k)});h.bind("mousedown",function(k){k.preventDefault()});a.call(this,d)})}})(jQuery);$("[placeholdersmall]").stickyPlaceholders()});
