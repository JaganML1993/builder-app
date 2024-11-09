window.jQuery&&function(d){"use strict";function g(e){return 1048576<e?(e/1048576).toFixed(1)+"Mb":1024==e?"1Mb":(e/1024).toFixed(1)+"Kb"}d.fn.MultiFile=function(t){if(0==this.length)return this;if("string"==typeof arguments[0]){if(1<this.length){var e=arguments;return this.each(function(){d.fn.MultiFile.apply(d(this),e)})}return d.fn.MultiFile[arguments[0]].apply(this,d.makeArray(arguments).slice(1)||[])}"number"==typeof t&&(t={max:t});t=d.extend({},d.fn.MultiFile.options,t||{});d("form").not("MultiFile-intercepted").addClass("MultiFile-intercepted").submit(d.fn.MultiFile.disableEmpty),d.fn.MultiFile.options.autoIntercept&&(d.fn.MultiFile.intercept(d.fn.MultiFile.options.autoIntercept),d.fn.MultiFile.options.autoIntercept=null),this.not(".MultiFile-applied").addClass("MultiFile-applied").each(function(){window.MultiFile=(window.MultiFile||0)+1;var i=window.MultiFile,f={e:this,E:d(this),clone:d(this).clone()},e=d.extend({},d.fn.MultiFile.options,t||{},(d.metadata?f.E.metadata():d.meta?f.E.data():null)||{},{});0<e.max||(e.max=f.E.attr("maxlength")),0<e.max||(e.max=(String(f.e.className.match(/\b(max|limit)\-([0-9]+)\b/gi)||[""]).match(/[0-9]+/gi)||[""])[0],0<e.max?e.max=String(e.max).match(/[0-9]+/gi)[0]:e.max=-1),e.max=new Number(e.max),e.accept=e.accept||f.E.attr("accept")||"",e.accept||(e.accept=f.e.className.match(/\b(accept\-[\w\|]+)\b/gi)||"",e.accept=new String(e.accept).replace(/^(accept|ext)\-/i,"")),e.maxsize=0<e.maxsize?e.maxsize:f.E.data("maxsize")||0,0<e.maxsize||(e.maxsize=(String(f.e.className.match(/\b(maxsize|maxload|size)\-([0-9]+)\b/gi)||[""]).match(/[0-9]+/gi)||[""])[0],0<e.maxsize?e.maxsize=String(e.maxsize).match(/[0-9]+/gi)[0]:e.maxsize=-1),e.maxfile=0<e.maxfile?e.maxfile:f.E.data("maxfile")||0,0<e.maxfile||(e.maxfile=(String(f.e.className.match(/\b(maxfile|filemax)\-([0-9]+)\b/gi)||[""]).match(/[0-9]+/gi)||[""])[0],0<e.maxfile?e.maxfile=String(e.maxfile).match(/[0-9]+/gi)[0]:e.maxfile=-1),1<e.maxfile&&(e.maxfile=1024*e.maxfile),1<e.maxsize&&(e.maxsize=1024*e.maxsize),1<e.max&&f.E.attr("multiple","multiple").prop("multiple",!1),d.extend(f,e||{}),f.STRING=d.extend(f.STRING||{},d.fn.MultiFile.options.STRING,f.STRING),d.extend(f,{n:0,slaves:[],files:[],instanceKey:f.e.id||"MultiFile"+String(i),generateID:function(e){return f.instanceKey+(0<e?"_F"+String(e):"")},trigger:function(e,t,l,i){var a,n=l[e]||l["on"+e];if(n)return i=i||l.files||(this.files?this.files[0]:null)||[{name:this.value,size:0,type:((this.value||"").match(/[^\.]+$/i)||[""])[0]}],d.each(i,function(e,i){a=n(t,i.name,l,i)}),a}}),1<String(f.accept).length&&(f.accept=f.accept.replace(/\W+/g,"|").replace(/^\W|\W$/g,""),f.rxAccept=new RegExp("\\.("+(f.accept||"")+")$","gi")),f.wrapID=f.instanceKey+"_wrap",f.E.wrap('<div class="MultiFile-wrap" id="'+f.wrapID+'"><div class="upload-button-wrap"> Upload Files</div><label class="info">Attach Resume & Cover Letter. Get FTP details to attach files over 10MB (max 4)</label></div>'),f.wrapper=d("#"+f.wrapID),f.e.name=f.e.name||"file"+i+"[]",f.list||(f.wrapper.append('<div class="MultiFile-list" id="'+f.wrapID+'_list"></div>'),f.list=d("#"+f.wrapID+"_list")),f.list=d(f.list),f.addSlave=function(m,p){var e;f.n++,m.MultiFile=f,0<p&&(m.id=m.name=""),0<p&&(m.id=f.generateID(p)),m.name=String(f.namePattern.replace(/\$name/gi,d(f.clone).attr("name")).replace(/\$id/gi,d(f.clone).attr("id")).replace(/\$g/gi,i).replace(/\$i/gi,p)),0<f.max&&f.files.length>f.max&&(e=m.disabled=!0),f.current=f.slaves[p]=m,(m=d(m)).val("").attr("value","")[0].value="",m.addClass("MultiFile-applied"),m.change(function(e,i,t){d(this).blur();var c=this,l=f.files||[],a=this.files||[{name:this.value,size:0,type:((this.value||"").match(/[^\.]+$/i)||[""])[0]}],n=[],o=0,s=f.total_size||0,u=[];d.each(a,function(e,i){n[n.length]=i}),f.trigger("FileSelect",this,f,n),d.each(a,function(e,i){function t(e){return e.replace("$ext",String(n.match(/[^\.]+$/i)||"")).replace("$file",n.match(/[^\/\\]+$/gi)).replace("$size",g(s)+" > "+g(f.maxfile))}var l,a,n=i.name,s=i.size;for(l in f.accept&&n&&!n.match(f.rxAccept)&&(u[u.length]=t(f.STRING.denied),f.trigger("FileInvalid",this,f,[i])),f.slaves)f.slaves[l]&&f.slaves[l]!=c&&(a=(f.slaves[l].value||"").replace(/^C:\\fakepath\\/gi,""),n!=a&&n!=a.substr(a.length-n.length)||(u[u.length]=t(f.STRING.duplicate),f.trigger("FileDuplicate",this,f,[i])));0<f.maxfile&&0<s&&s>f.maxfile&&(u[u.length]=t(f.STRING.toobig),f.trigger("FileTooBig",this,f,[i]));var r=f.trigger("FileValidate",this,f,[i]);r&&""!=r&&(u[u.length]=t(r)),o+=i.size}),s+=o,n.size=o,n.total=s,n.total_length=n.length+l.length,0<f.max&&l.length+a.length>f.max&&(u[u.length]=f.STRING.toomany.replace("$max",f.max),f.trigger("FileTooMany",this,f,n)),0<f.maxsize&&s>f.maxsize&&(u[u.length]=f.STRING.toomuch.replace("$size",g(s)+" > "+g(f.maxsize)),f.trigger("FileTooMuch",this,f,n));var r=d(f.clone).clone();if(r.addClass("MultiFile"),0<u.length)return f.error(u.join("\n\n")),f.n--,f.addSlave(r[0],p),m.parent().prepend(r),m.remove(),!1;f.total_size=s,(a=l.concat(n)).size=s,a.size_label=g(s),f.files=a,d(this).css({position:"absolute",top:"-3000px"}),m.after(r),f.addSlave(r[0],p+1),f.addToList(this,p,n),f.trigger("afterFileSelect",this,f,n)}),d(m).data("MultiFile",f),e&&d(m).attr("disabled","disabled").prop("disabled",!0)},f.addToList=function(s,a,e){f.trigger("FileAppend",s,f,e);var r=d("<span/>");d.each(e,function(e,t){var i=String(t.name||""),l=f.STRING,a=l.label||l.file||l.name,n=l.title||l.tooltip||l.selected,l='<img class="MultiFile-preview" style="'+f.previewCss+'"/>',l=d(('<span class="MultiFile-label" title="'+n+'"><span class="MultiFile-title">'+a+"</span>"+(f.preview||d(s).is(".with-preview")?l:"")+"</span>").replace(/\$(file|name)/gi,(i.match(/[^\/\\]+$/gi)||[i])[0]).replace(/\$(ext|extension|type)/gi,(i.match(/[^\.]+$/gi)||[""])[0]).replace(/\$(size)/gi,g(t.size||0)).replace(/\$(preview)/gi,l));l.find("img.MultiFile-preview").each(function(){var i=this,e=new FileReader;e.readAsDataURL(t),e.onload=function(e){i.src=e.target.result}}),1<e&&r.append(", "),r.append(l)});var i=d('<div class="MultiFile-label"></div>'),t=d('<a class="MultiFile-remove" href="#'+f.wrapID+'"><img src="/images/file-delete-icon.gif" alt="Delete" /></a>').click(function(){f.trigger("FileRemove",s,f,i),f.n--,f.current.disabled=!1,f.slaves[a]=null,d(s).remove(),d(this).parent().remove(),d(f.current).css({position:"",top:""}),d(f.current).reset().val("").attr("value","")[0].value="";var e,t=[];for(e in f.slaves){var i,l=f.slaves[e];null!=l&&null!=l&&(i=(l.files&&l.files.length?l.files:null)||[{name:this.value,size:0,type:((this.value||"").match(/[^\.]+$/i)||[""])[0]}],d.each(i,function(e,i){null!=i.name&&(t[t.length]=i)}))}return f.files=t,f.trigger("afterFileRemove",s,f,i),f.trigger("FileChange",s,f,f.files),!1});f.list.append(i.append(t," ",r)),f.trigger("afterFileAppend",s,f,e),f.trigger("FileChange",s,f,f.files)},f.MultiFile||f.addSlave(f.e,0),f.n++,f.E.data("MultiFile",f)})},d.extend(d.fn.MultiFile,{reset:function(){var e=d(this).data("MultiFile");return e&&e.list.find("a.MultiFile-remove").click(),d(this)},files:function(){var e=this.data("MultiFile");return e?e.files||[]:!console.log("MultiFile plugin not initialized")},size:function(){var e=this.data("MultiFile");return e?e.total_size||[]:!console.log("MultiFile plugin not initialized")},count:function(){var e=this.data("MultiFile");return e?e.files.length||[]:!console.log("MultiFile plugin not initialized")},disableEmpty:function(e){e=("string"==typeof e?e:"")||"mfD";var i=[];return d("input:file.MultiFile").each(function(){""==d(this).val()&&(i[i.length]=this)}),window.clearTimeout(d.fn.MultiFile.reEnableTimeout),d.fn.MultiFile.reEnableTimeout=window.setTimeout(d.fn.MultiFile.reEnableEmpty,500),d(i).each(function(){this.disabled=!0}).addClass(e)},reEnableEmpty:function(e){return d("input:file."+(e=("string"==typeof e?e:"")||"mfD")).removeClass(e).each(function(){this.disabled=!1})},intercepted:{},intercept:function(e,i,t){var l,a;if((t=t||[]).constructor.toString().indexOf("Array")<0&&(t=[t]),"function"==typeof e)return d.fn.MultiFile.disableEmpty(),a=e.apply(i||window,t),setTimeout(function(){d.fn.MultiFile.reEnableEmpty()},1e3),a;e.constructor.toString().indexOf("Array")<0&&(e=[e]);for(var n=0;n<e.length;n++)(l=e[n]+"")&&function(e){d.fn.MultiFile.intercepted[e]=d.fn[e]||function(){},d.fn[e]=function(){return d.fn.MultiFile.disableEmpty(),a=d.fn.MultiFile.intercepted[e].apply(this,arguments),setTimeout(function(){d.fn.MultiFile.reEnableEmpty()},1e3),a}}(l)}}),d.fn.MultiFile.options={accept:"",max:-1,maxfile:-1,maxsize:-1,namePattern:"$name",preview:!1,previewCss:"max-height:100px; max-width:100px;",STRING:{remove:"Remove:",denied:"You cannot select a $ext file.\nTry again...",file:"$file",selected:"File selected: $file",duplicate:"This file has already been selected:\n$file",toomuch:"The files selected exceed the maximum size permited ($size)",toomany:"Only $max files are allowed",toobig:"$file is too big (max $size)"},autoIntercept:["submit","ajaxSubmit","ajaxForm","validate","valid"],error:function(e){"undefined"!=typeof console&&console.log(e),alert(e)}},d.fn.reset=d.fn.reset||function(){return this.each(function(){try{this.reset()}catch(e){}})},d(function(){d("input[type=file].multi").MultiFile()})}(jQuery);