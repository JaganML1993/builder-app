!function(a){a.fn.extend({easyResponsiveTabs:function(t){var e={type:"default",width:"auto",fit:!0,closed:!1,activate:function(){}},t=a.extend(e,t),s=t,i=s.type,n=s.fit,r=s.width,c="vertical",o="accordion",d=window.location.hash,l=!(!window.history||!history.replaceState);a(this).bind("tabactivate",function(a,e){"function"==typeof t.activate&&t.activate.call(e,a)}),this.each(function(){function e(){i==c&&s.addClass("resp-vtabs"),1==n&&s.css({width:"100%",margin:"20px 30px 30px 0"}),i==o&&(s.addClass("resp-easy-accordion"),s.find(".resp-tabs-list").css("display","none"))}var s=a(this),p=s.find("ul.resp-tabs-list"),b=s.attr("id");s.find("ul.resp-tabs-list li").addClass("resp-tab-item"),s.css({display:"block",width:r}),s.find(".resp-tabs-container > div").addClass("resp-tab-content"),e();var v;s.find(".resp-tab-content").before("<h2 class='resp-accordion' role='tab'><span class='resp-arrow'></span></h2>");var f=0;s.find(".resp-accordion").each(function(){v=a(this);var t=s.find(".resp-tab-item:eq("+f+")"),e=s.find(".resp-accordion:eq("+f+")");e.append(t.html()),e.data(t.data()),v.attr("aria-controls","tab_item-"+f),f++});var h,u=0;s.find(".resp-tab-item").each(function(){$tabItem=a(this),$tabItem.attr("aria-controls","tab_item-"+u),$tabItem.attr("role","tab");var t=0;s.find(".resp-tab-content").each(function(){h=a(this),h.attr("aria-labelledby","tab_item-"+t),t++}),u++});var C=0;if(""!=d){var m=d.match(new RegExp(b+"([0-9]+)"));null!==m&&2===m.length&&(C=parseInt(m[1],10)-1,C>u&&(C=0))}a(s.find(".resp-tab-item")[C]).addClass("resp-tab-active"),t.closed===!0||"accordion"===t.closed&&!p.is(":visible")||"tabs"===t.closed&&p.is(":visible")?a(s.find(".resp-tab-content")[C]).addClass("resp-tab-content-active resp-accordion-closed"):(a(s.find(".resp-accordion")[C]).addClass("resp-tab-active"),a(s.find(".resp-tab-content")[C]).addClass("resp-tab-content-active").attr("style","display:block")),s.find("[role=tab]").each(function(){var t=a(this);t.click(function(){var t=a(this),e=t.attr("aria-controls");if(t.hasClass("resp-accordion")&&t.hasClass("resp-tab-active"))return s.find(".resp-tab-content-active").slideUp("",function(){a(this).addClass("resp-accordion-closed")}),t.removeClass("resp-tab-active"),!1;if(!t.hasClass("resp-tab-active")&&t.hasClass("resp-accordion")?(s.find(".resp-tab-active").removeClass("resp-tab-active"),s.find(".resp-tab-content-active").slideUp().removeClass("resp-tab-content-active resp-accordion-closed"),s.find("[aria-controls="+e+"]").addClass("resp-tab-active"),s.find(".resp-tab-content[aria-labelledby = "+e+"]").slideDown().addClass("resp-tab-content-active")):(s.find(".resp-tab-active").removeClass("resp-tab-active"),s.find(".resp-tab-content-active").removeAttr("style").removeClass("resp-tab-content-active").removeClass("resp-accordion-closed"),s.find("[aria-controls="+e+"]").addClass("resp-tab-active"),s.find(".resp-tab-content[aria-labelledby = "+e+"]").addClass("resp-tab-content-active").attr("style","display:block")),t.trigger("tabactivate",t),l){var i=window.location.hash,n=b+(parseInt(e.substring(9),10)+1).toString();if(""!=i){var r=new RegExp(b+"[0-9]+");n=null!=i.match(r)?i.replace(r,n):i+"|"+n}else n="#"+n;history.replaceState(null,null,n)}})}),a(window).resize(function(){s.find(".resp-accordion-closed").removeAttr("style")})})}})}(jQuery);