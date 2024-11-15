;(function($) {	
	/* global variables */
	var scrollbarNumber = 0;
	var xScrollDistance = 0;
	var yScrollDistance = 0;
	var scrollIntervalTime = 10;
	var scrollbarDistance = 0;	
	var isTouch = 'ontouchstart' in window;
	var supportsOrientationChange = 'onorientationchange' in window;
	var isWebkit = false;
	var has3DTransform = false;
	var isIe7 = false;
	var isIe8 = false;
	var isIe9 = false;
	var isIe = false;
	var isGecko = false;
	var grabOutCursor = 'pointer';
	var grabInCursor = 'pointer';
	var onChangeEventLastFired = new Array();
	var autoSlideTimeouts = new Array();
	var iosSliders = new Array();
	var iosSliderSettings = new Array();
	var isEventCleared = new Array();
	var slideTimeouts = new Array();
	var activeChildOffsets = new Array();
	var activeChildInfOffsets = new Array();
	var infiniteSliderOffset = new Array();
	var sliderMin = new Array();
	var sliderMax = new Array();
	var sliderAbsMax = new Array();
	var touchLocks = new Array();	
	/* private functions */
	var helpers = {    
        showScrollbar: function(settings, scrollbarClass) {			
			if(settings.scrollbarHide) {
				$('.' + scrollbarClass).css({
					opacity: settings.scrollbarOpacity,
					filter: 'alpha(opacity:' + (settings.scrollbarOpacity * 100) + ')'
				});
			}		
		},		
		hideScrollbar: function(settings, scrollTimeouts, j, distanceOffsetArray, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber) {			
			if(settings.scrollbar && settings.scrollbarHide) {					
				for(var i = j; i < j+25; i++){					
					scrollTimeouts[scrollTimeouts.length] = helpers.hideScrollbarIntervalTimer(scrollIntervalTime * i, distanceOffsetArray[j], ((j + 24) - i) / 24, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber, settings);					
				}			
			}			
		},		
		hideScrollbarInterval: function(newOffset, opacity, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber, settings) {	
			scrollbarDistance = (newOffset * -1) / (sliderMax[sliderNumber]) * (stageWidth - scrollMargin - scrollBorder - scrollbarWidth);			
			helpers.setSliderOffset('.' + scrollbarClass, scrollbarDistance);			
			$('.' + scrollbarClass).css({
				opacity: settings.scrollbarOpacity * opacity,
				filter: 'alpha(opacity:' + (settings.scrollbarOpacity * opacity * 100) + ')'
			});			
		},		
		slowScrollHorizontalInterval: function(node, slideNodes, newOffset, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, activeChildOffset, originalOffsets, childrenOffsets, infiniteSliderWidth, numberOfSlides, sliderNumber, centeredSlideOffset, endOffset, settings) {
			if(settings.infiniteSlider) {				
				if(newOffset <= (sliderMax[sliderNumber] * -1)) {
					var scrollerWidth = $(node).width();
					if(newOffset <= (sliderAbsMax[sliderNumber] * -1)) {						
						var sum = originalOffsets[0] * -1;
						$(slideNodes).each(function(i) {							
							helpers.setSliderOffset($(slideNodes)[i], sum + centeredSlideOffset);
							if(i < childrenOffsets.length) {
								childrenOffsets[i] = sum * -1;
							}
							sum = sum + $(this).outerWidth(true);							
						});						
						newOffset = newOffset + childrenOffsets[0] * -1;
						sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
						sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
						infiniteSliderOffset[sliderNumber] = 0;						
					} else {						
						var lowSlideNumber = 0;
						var lowSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
						$(slideNodes).each(function(i) {							
							if(helpers.getSliderOffset(this, 'x') < lowSlideOffset) {
								lowSlideOffset = helpers.getSliderOffset(this, 'x');
								lowSlideNumber = i;
							}							
						});						
						var tempOffset = sliderMin[sliderNumber] + scrollerWidth;
						helpers.setSliderOffset($(slideNodes)[lowSlideNumber], tempOffset);						
						sliderMin[sliderNumber] = childrenOffsets[1] * -1 + centeredSlideOffset;
						sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
						childrenOffsets.splice(0, 1);
						childrenOffsets.splice(childrenOffsets.length, 0, tempOffset * -1 + centeredSlideOffset);
						infiniteSliderOffset[sliderNumber]++;						
					}					
				}				
				if((newOffset >= (sliderMin[sliderNumber] * -1)) || (newOffset >= 0)) {					
					var scrollerWidth = $(node).width();					
					if(newOffset >= 0) {
						var sum = originalOffsets[0] * -1;
						$(slideNodes).each(function(i) {							
							helpers.setSliderOffset($(slideNodes)[i], sum + centeredSlideOffset);
							if(i < childrenOffsets.length) {
								childrenOffsets[i] = sum * -1;
							}
							sum = sum + $(this).outerWidth(true);							
						});
						
						newOffset = newOffset - childrenOffsets[0] * -1;
						sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
						sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
						infiniteSliderOffset[sliderNumber] = numberOfSlides;						
						while(((childrenOffsets[0] * -1 - scrollerWidth + centeredSlideOffset) > 0)) {
							var highSlideNumber = 0;
							var highSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
							$(slideNodes).each(function(i) {								
								if(helpers.getSliderOffset(this, 'x') > highSlideOffset) {
									highSlideOffset = helpers.getSliderOffset(this, 'x');
									highSlideNumber = i;
								}								
							});
							var tempOffset = sliderMin[sliderNumber] - $(slideNodes[highSlideNumber]).outerWidth(true);
							helpers.setSliderOffset($(slideNodes)[highSlideNumber], tempOffset);							
							childrenOffsets.splice(0, 0, tempOffset * -1 + centeredSlideOffset);
							childrenOffsets.splice(childrenOffsets.length-1, 1);
							sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
							sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
							infiniteSliderOffset[sliderNumber]--;
							activeChildOffsets[sliderNumber]++;							
						}
					} 					
					if(newOffset < 0) {					
						var highSlideNumber = 0;
						var highSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
						$(slideNodes).each(function(i) {							
							if(helpers.getSliderOffset(this, 'x') > highSlideOffset) {
								highSlideOffset = helpers.getSliderOffset(this, 'x');
								highSlideNumber = i;
							}							
						});	
						var tempOffset = sliderMin[sliderNumber] - $(slideNodes[highSlideNumber]).outerWidth(true);
						helpers.setSliderOffset($(slideNodes)[highSlideNumber], tempOffset);						
						childrenOffsets.splice(0, 0, tempOffset * -1 + centeredSlideOffset);
						childrenOffsets.splice(childrenOffsets.length-1, 1);
						sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
						sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
						infiniteSliderOffset[sliderNumber]--;						
					}				
				}				
			}
			var slideChanged = false;
			var newChildOffset = helpers.calcActiveOffset(settings, newOffset, childrenOffsets, stageWidth, infiniteSliderOffset[sliderNumber], numberOfSlides, activeChildOffset, sliderNumber);
			var tempOffset = (newChildOffset + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;			
			if(settings.infiniteSlider) {								
				if(tempOffset != activeChildInfOffsets[sliderNumber]) {
					slideChanged = true;
				}					
			} else {			
				if(newChildOffset != activeChildOffsets[sliderNumber]) {
					slideChanged = true;
				}			
			}			
			if(slideChanged) {				
				var args = new helpers.args(settings, node, $(node).children(':eq(' + tempOffset + ')'), tempOffset, endOffset, true);
				$(node).parent().data('args', args);				
				if(settings.onSlideChange != '') {				
					settings.onSlideChange(args);				
				}			
			}			
			activeChildOffsets[sliderNumber] = newChildOffset;
			activeChildInfOffsets[sliderNumber] = tempOffset;			
			newOffset = Math.floor(newOffset);			
			helpers.setSliderOffset(node, newOffset);
			if(settings.scrollbar) {				
				scrollbarDistance = Math.floor((newOffset * -1 - sliderMin[sliderNumber] + centeredSlideOffset) / (sliderMax[sliderNumber] - sliderMin[sliderNumber] + centeredSlideOffset) * (scrollbarStageWidth - scrollMargin - scrollbarWidth));
				var width = scrollbarWidth - scrollBorder;				
				if(newOffset >= (sliderMin[sliderNumber] * -1 + centeredSlideOffset)) {
					width = scrollbarWidth - scrollBorder - (scrollbarDistance * -1);					
					helpers.setSliderOffset($('.' + scrollbarClass), 0);					
					$('.' + scrollbarClass).css({
						width: width + 'px'
					});				
				} else if(newOffset <= ((sliderMax[sliderNumber] * -1) + 1)) {					
					width = scrollbarStageWidth - scrollMargin - scrollBorder - scrollbarDistance;					
					helpers.setSliderOffset($('.' + scrollbarClass), scrollbarDistance);					
					$('.' + scrollbarClass).css({
						width: width + 'px'
					});					
				} else {					
					helpers.setSliderOffset($('.' + scrollbarClass), scrollbarDistance);					
					$('.' + scrollbarClass).css({
						width: width + 'px'
					});				
				}				
			}			
		},		
		slowScrollHorizontal: function(node, slideNodes, scrollTimeouts, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, currentEventNode, snapOverride, centeredSlideOffset, settings) {			
			var distanceOffsetArray = new Array();
			var xScrollDistanceArray = new Array();
			var nodeOffset = helpers.getSliderOffset(node, 'x');
			var snapDirection = 0;
			var maxSlideVelocity = 25 / 1024 * stageWidth;
			var changeSlideFired = false;
			frictionCoefficient = settings.frictionCoefficient;
			elasticFrictionCoefficient = settings.elasticFrictionCoefficient;
			snapFrictionCoefficient = settings.snapFrictionCoefficient;				
			if((xScrollDistance > 5) && settings.snapToChildren && !snapOverride) {
				snapDirection = 1;
			} else if((xScrollDistance < -5) && settings.snapToChildren && !snapOverride) {
				snapDirection = -1;
			}			
			if(xScrollDistance < (maxSlideVelocity * -1)) {
				xScrollDistance = maxSlideVelocity * -1;
			} else if(xScrollDistance > maxSlideVelocity) {
				xScrollDistance = maxSlideVelocity;
			}			
			if(!($(node)[0] === $(currentEventNode)[0])) {
				snapDirection = snapDirection * -1;
				xScrollDistance = xScrollDistance * -2;
			}			
			var tempInfiniteSliderOffset = infiniteSliderOffset[sliderNumber];			
			if(settings.infiniteSlider) {			
				var tempSliderMin = sliderMin[sliderNumber];
				var tempSliderMax = sliderMax[sliderNumber];			
			}			
			var tempChildrenOffsets = new Array();
			var tempSlideNodeOffsets = new Array();
			for(var i = 0; i < childrenOffsets.length; i++) {				
				tempChildrenOffsets[i] = childrenOffsets[i];				
				if(i < slideNodes.length) {
					tempSlideNodeOffsets[i] = helpers.getSliderOffset($(slideNodes[i]), 'x');
				}				
			}			
			while((xScrollDistance > 1) || (xScrollDistance < -1)) {				
				xScrollDistance = xScrollDistance * frictionCoefficient;
				nodeOffset = nodeOffset + xScrollDistance;
				if(((nodeOffset > (sliderMin[sliderNumber] * -1)) || (nodeOffset < (sliderMax[sliderNumber] * -1))) && !settings.infiniteSlider) {
					xScrollDistance = xScrollDistance * elasticFrictionCoefficient;
					nodeOffset = nodeOffset + xScrollDistance;
				}				
				if(settings.infiniteSlider) {					
					if(nodeOffset <= (tempSliderMax * -1)) {						
						var scrollerWidth = $(node).width();							
						var lowSlideNumber = 0;
						var lowSlideOffset = tempSlideNodeOffsets[0];
						for(var i = 0; i < tempSlideNodeOffsets.length; i++) {							
							if(tempSlideNodeOffsets[i] < lowSlideOffset) {
								lowSlideOffset = tempSlideNodeOffsets[i];
								lowSlideNumber = i;
							}							
						}						
						var newOffset = tempSliderMin + scrollerWidth;
						tempSlideNodeOffsets[lowSlideNumber] = newOffset;						
						tempSliderMin = tempChildrenOffsets[1] * -1 + centeredSlideOffset;
						tempSliderMax = tempSliderMin + scrollerWidth - stageWidth;
						tempChildrenOffsets.splice(0, 1);
						tempChildrenOffsets.splice(tempChildrenOffsets.length, 0, newOffset * -1 + centeredSlideOffset);
						tempInfiniteSliderOffset++;						
					}					
					if(nodeOffset >= (tempSliderMin * -1)) {						
						var scrollerWidth = $(node).width();						
						var highSlideNumber = 0;
						var highSlideOffset = tempSlideNodeOffsets[0];
						for(var i = 0; i < tempSlideNodeOffsets.length; i++) {							
							if(tempSlideNodeOffsets[i] > highSlideOffset) {
								highSlideOffset = tempSlideNodeOffsets[i];
								highSlideNumber = i;
							}							
						}
						var newOffset = tempSliderMin - $(slideNodes[highSlideNumber]).outerWidth(true);
						tempSlideNodeOffsets[highSlideNumber] = newOffset;						
						tempChildrenOffsets.splice(0, 0, newOffset * -1 + centeredSlideOffset);
						tempChildrenOffsets.splice(tempChildrenOffsets.length-1, 1);
						tempSliderMin = tempChildrenOffsets[0] * -1 + centeredSlideOffset;
						tempSliderMax = tempSliderMin + scrollerWidth - stageWidth;
						tempInfiniteSliderOffset--;					
					}
						
				}				
				distanceOffsetArray[distanceOffsetArray.length] = nodeOffset;
				xScrollDistanceArray[xScrollDistanceArray.length] = xScrollDistance;
			}
			var slideChanged = false;
			var newChildOffset = helpers.calcActiveOffset(settings, nodeOffset, tempChildrenOffsets, stageWidth, tempInfiniteSliderOffset, numberOfSlides, activeChildOffsets[sliderNumber], sliderNumber);
			var tempOffset = (newChildOffset + tempInfiniteSliderOffset + numberOfSlides)%numberOfSlides;
			if(settings.snapToChildren) {			
				if(settings.infiniteSlider) {				
					if(tempOffset != activeChildInfOffsets[sliderNumber]) {
						slideChanged = true;
					}						
				} else {				
					if(newChildOffset != activeChildOffsets[sliderNumber]) {
						slideChanged = true;
					}				
				}
				if((snapDirection < 0) && !slideChanged) {				
					newChildOffset++;					
					if((newChildOffset >= childrenOffsets.length) && !settings.infinteSlider) newChildOffset = childrenOffsets.length - 1;					
				} else if((snapDirection > 0) && !slideChanged) {				
					newChildOffset--;					
					if((newChildOffset < 0) && !settings.infinteSlider) newChildOffset = 0;					
				}			
			}
			if(settings.snapToChildren || (((nodeOffset > (sliderMin[sliderNumber] * -1)) || (nodeOffset < (sliderMax[sliderNumber] * -1))) && !settings.infiniteSlider)) {				
				nodeOffset = helpers.getSliderOffset(node, 'x');
				distanceOffsetArray.splice(0, distanceOffsetArray.length);				
				while((nodeOffset < (tempChildrenOffsets[newChildOffset] - 0.5)) || (nodeOffset > (tempChildrenOffsets[newChildOffset] + 0.5))) {					
					nodeOffset = ((nodeOffset - (tempChildrenOffsets[newChildOffset])) * snapFrictionCoefficient) + (tempChildrenOffsets[newChildOffset]);
					distanceOffsetArray[distanceOffsetArray.length] = nodeOffset;					
				}
				distanceOffsetArray[distanceOffsetArray.length] = tempChildrenOffsets[newChildOffset];	
			}
			var jStart = 1;
			if((distanceOffsetArray.length%2) != 0) {
				jStart = 0;
			}			
			var lastTimeoutRegistered = 0;
			var count = 0;			
			for(var j = 0; j < scrollTimeouts.length; j++) {
				clearTimeout(scrollTimeouts[j]);
			}			
			var endOffset = (newChildOffset + tempInfiniteSliderOffset + numberOfSlides)%numberOfSlides;
			var lastCheckOffset = 0;
			for(var j = jStart; j < distanceOffsetArray.length; j = j + 2) {				
				if((j == jStart) || (Math.abs(distanceOffsetArray[j] - lastCheckOffset) > 1) || (j >= (distanceOffsetArray.length - 2))) {				
					lastCheckOffset	= distanceOffsetArray[j];					
					scrollTimeouts[scrollTimeouts.length] = helpers.slowScrollHorizontalIntervalTimer(scrollIntervalTime * j, node, slideNodes, distanceOffsetArray[j], scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, newChildOffset, originalOffsets, childrenOffsets, infiniteSliderWidth, numberOfSlides, sliderNumber, centeredSlideOffset, endOffset, settings);				
				}			
			}			
			var slideChanged = false;
			var tempOffset = (newChildOffset + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;			
			if(settings.infiniteSlider) {				
				if(tempOffset != activeChildInfOffsets[sliderNumber]) {
					slideChanged = true;
				}					
			} else {			
				if(newChildOffset != activeChildOffsets[sliderNumber]) {
					slideChanged = true;
				}		
			}				
			if(settings.onSlideComplete != '') {
				scrollTimeouts[scrollTimeouts.length] = helpers.onSlideCompleteTimer(scrollIntervalTime * (j + 1), settings, node, $(node).children(':eq(' + tempOffset + ')'), tempOffset, sliderNumber);				
			}			
			slideTimeouts[sliderNumber] = scrollTimeouts;			
			helpers.hideScrollbar(settings, scrollTimeouts, j, distanceOffsetArray, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber);				
		},		
		onSlideComplete: function(settings, node, slideNode, newChildOffset, sliderNumber) {			
			var isChanged = (onChangeEventLastFired[sliderNumber] != newChildOffset) ? true : false;
			var args = new helpers.args(settings, $(node), slideNode, newChildOffset, newChildOffset, isChanged);
			$(node).parent().data('args', args);				
			if(settings.onSlideComplete != '') {				
				settings.onSlideComplete(args);			
			}			
			onChangeEventLastFired[sliderNumber] = newChildOffset;		
		},		
		getSliderOffset: function(node, xy) {			
			var sliderOffset = 0;
			if(xy == 'x') {
				xy = 4;
			} else {
				xy = 5;
			}			
			if(has3DTransform && !isIe7 && !isIe8) {				
				var transforms = new Array('-webkit-transform', '-moz-transform', 'transform');				
				for(var i = 0; i < transforms.length; i++) {					
					if($(node).css(transforms[i]) != undefined) {						
						if($(node).css(transforms[i]).length > 0) {						
							var transformArray = $(node).css(transforms[i]).split(',');							
							break;							
						}					
					}				
				}				
				sliderOffset = parseInt(transformArray[xy], 10);					
			} else {			
				sliderOffset = parseInt($(node).css('left'), 10);			
			}			
			return sliderOffset;		
		},		
		setSliderOffset: function(node, sliderOffset) {			
			if(has3DTransform && !isIe7 && !isIe8) {				
				$(node).css({
					'webkitTransform': 'matrix(1,0,0,1,' + sliderOffset + ',0)',
					'MozTransform': 'matrix(1,0,0,1,' + sliderOffset + ',0)',
					'transform': 'matrix(1,0,0,1,' + sliderOffset + ',0)'
				});			
			} else {
				$(node).css({
					left: sliderOffset + 'px'
				});			
			}						
		},		
		setBrowserInfo: function() {			
			if(navigator.userAgent.match('WebKit') != null) {
				isWebkit = true;
				grabOutCursor = '-webkit-grab';
				grabInCursor = '-webkit-grabbing';
			} else if(navigator.userAgent.match('Gecko') != null) {
				isGecko = true;
				grabOutCursor = 'move';
				grabInCursor = '-moz-grabbing';
			} else if(navigator.userAgent.match('MSIE 7') != null) {
				isIe7 = true;
				isIe = true;
			} else if(navigator.userAgent.match('MSIE 8') != null) {
				isIe8 = true;
				isIe = true;
			} else if(navigator.userAgent.match('MSIE 9') != null) {
				isIe9 = true;
				isIe = true;
			}			
		},		
		has3DTransform: function() {			
			var has3D = false;			
			var testElement = $('<div />').css({
				'webkitTransform': 'matrix(1,1,1,1,1,1)',
				'MozTransform': 'matrix(1,1,1,1,1,1)',
				'transform': 'matrix(1,1,1,1,1,1)'
			});			
			if(testElement.attr('style') == '') {
				has3D = false;
			} else if(testElement.attr('style') != undefined) {
				has3D = true;
			}			
			return has3D;			
		},		
		getSlideNumber: function(slide, sliderNumber, numberOfSlides) {			
			return (slide - infiniteSliderOffset[sliderNumber] + numberOfSlides) % numberOfSlides;		
		}, 
        calcActiveOffset: function(settings, offset, childrenOffsets, stageWidth, infiniteSliderOffset, numberOfSlides, activeChildOffset, sliderNumber) {								
			var isFirst = false;
			var arrayOfOffsets = new Array();
			var newChildOffset;
			for(var i = 0; i < childrenOffsets.length; i++) {				
				if((childrenOffsets[i] <= offset) && (childrenOffsets[i] > (offset - stageWidth))) {				
					if(!isFirst && (childrenOffsets[i] != offset)) {						
						arrayOfOffsets[arrayOfOffsets.length] = childrenOffsets[i-1];						
					}					
					arrayOfOffsets[arrayOfOffsets.length] = childrenOffsets[i];					
					isFirst = true;						
				}			
			}			
			if(arrayOfOffsets.length == 0) {
				arrayOfOffsets[0] = childrenOffsets[childrenOffsets.length - 1];
			}			
			var distance = stageWidth;
			var closestChildOffset = 0;			
			for(var i = 0; i < arrayOfOffsets.length; i++) {				
				var newDistance = Math.abs(offset - arrayOfOffsets[i]);				
				if(newDistance < distance) {
					closestChildOffset = arrayOfOffsets[i];
					distance = newDistance;
				}				
			}			
			for(var i = 0; i < childrenOffsets.length; i++) {				
				if(closestChildOffset == childrenOffsets[i]) {					
					newChildOffset = i;					
				}				
			}			
			return newChildOffset;	
		},		
		changeSlide: function(slide, node, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings) {
			helpers.autoSlidePause(sliderNumber);			
			for(var j = 0; j < scrollTimeouts.length; j++) {
				clearTimeout(scrollTimeouts[j]);
			}			
			var steps = Math.ceil(settings.autoSlideTransTimer / 10) + 1;
			var startOffset = helpers.getSliderOffset(node, 'x');
			var endOffset = childrenOffsets[slide];
			var offsetDiff = endOffset - startOffset;			
			if(settings.infiniteSlider) {				
				slide = (slide - infiniteSliderOffset[sliderNumber] + numberOfSlides * 2)%numberOfSlides;				
				var appendArray = false;
				if((slide == 0) && (numberOfSlides == 2)) {					
					slide = numberOfSlides;
					childrenOffsets[slide] = childrenOffsets[slide-1] - $(slideNodes).eq(0).outerWidth(true);
					appendArray = true;					
				}				
				endOffset = childrenOffsets[slide];
				offsetDiff = endOffset - startOffset;				
				var offsets = new Array(childrenOffsets[slide] - $(node).width(), childrenOffsets[slide] + $(node).width());				
				if(appendArray) {
					childrenOffsets.splice(childrenOffsets.length-1, 1);
				}				
				for(var i = 0; i < offsets.length; i++) {					
					if(Math.abs(offsets[i] - startOffset) < Math.abs(offsetDiff)) {
						offsetDiff = (offsets[i] - startOffset);
					}				
				}				
			}			
			var stepArray = new Array();
			var t;
			var nextStep;
			helpers.showScrollbar(settings, scrollbarClass);
			for(var i = 0; i <= steps; i++) {
				t = i;
				t /= steps;
				t--;
				nextStep = startOffset + offsetDiff*(Math.pow(t,5) + 1);				
				stepArray[stepArray.length] = nextStep;				
			}			
			var lastCheckOffset = 0;
			for(var i = 0; i < stepArray.length; i++) {				
				if((i == 0) || (Math.abs(stepArray[i] - lastCheckOffset) > 1) || (i >= (stepArray.length - 2))) {
					lastCheckOffset	= stepArray[i];					
					scrollTimeouts[i] = helpers.slowScrollHorizontalIntervalTimer(scrollIntervalTime * (i + 1), node, slideNodes, stepArray[i], scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, slide, originalOffsets, childrenOffsets, infiniteSliderWidth, numberOfSlides, sliderNumber, centeredSlideOffset, slide, settings);
				}				
				if((i == 0) && (settings.onSlideStart != '')) {
					var tempOffset = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;						
					settings.onSlideStart(new helpers.args(settings, node, $(node).children(':eq(' + tempOffset + ')'), tempOffset, slide, false));
				}					
			}
			var slideChanged = false;
			var tempOffset = (slide + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;			
			if(settings.infiniteSlider) {				
				if(tempOffset != activeChildInfOffsets[sliderNumber]) {
					slideChanged = true;
				}					
			} else {			
				if(slide != activeChildOffsets[sliderNumber]) {
					slideChanged = true;
				}			
			}				
			if(slideChanged && (settings.onSlideComplete != '')) {
				scrollTimeouts[scrollTimeouts.length] = helpers.onSlideCompleteTimer(scrollIntervalTime * (i + 1), settings, node, $(node).children(':eq(' + tempOffset + ')'), tempOffset, sliderNumber);
			}			
			slideTimeouts[sliderNumber] = scrollTimeouts;			
			helpers.hideScrollbar(settings, scrollTimeouts, i, stepArray, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber);			
			helpers.autoSlide(node, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);			
		},		
		autoSlide: function(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings) {			
			if(!settings.autoSlide) return false;			
			helpers.autoSlidePause(sliderNumber);
			autoSlideTimeouts[sliderNumber] = setTimeout(function() {
				if(!settings.infiniteSlider && (activeChildOffsets[sliderNumber] > childrenOffsets.length-1)) {
					activeChildOffsets[sliderNumber] = activeChildOffsets[sliderNumber] - numberOfSlides;
				}				
				var nextSlide = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides + 1)%numberOfSlides;
				helpers.changeSlide(nextSlide, scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);				
				helpers.autoSlide(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);				
			}, settings.autoSlideTimer + settings.autoSlideTransTimer);			
		},		
		autoSlidePause: function(sliderNumber) {			
			clearTimeout(autoSlideTimeouts[sliderNumber]);
		},		
		isUnselectable: function(node, settings) {
			if(settings.unselectableSelector != '') {
				if($(node).closest(settings.unselectableSelector).size() == 1) return true;
			}			
			return false;
		},
		/* timers */
		slowScrollHorizontalIntervalTimer: function(scrollIntervalTime, node, slideNodes, step, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, slide, originalOffsets, childrenOffsets, infiniteSliderWidth, numberOfSlides, sliderNumber, centeredSlideOffset, endOffset, settings) {		
			var scrollTimeout = setTimeout(function() {
				helpers.slowScrollHorizontalInterval(node, slideNodes, step, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, slide, originalOffsets, childrenOffsets, infiniteSliderWidth, numberOfSlides, sliderNumber, centeredSlideOffset, endOffset, settings);
			}, scrollIntervalTime);			
			return scrollTimeout;		
		},		
		onSlideCompleteTimer: function(scrollIntervalTime, settings, node, slideNode, slide, scrollbarNumber) {			
			var scrollTimeout = setTimeout(function() {
				helpers.onSlideComplete(settings, node, slideNode, slide, scrollbarNumber);
			}, scrollIntervalTime);			
			return scrollTimeout;		
		},		
		hideScrollbarIntervalTimer: function(scrollIntervalTime, newOffset, opacity, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber, settings) {
			var scrollTimeout = setTimeout(function() {
				helpers.hideScrollbarInterval(newOffset, opacity, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, sliderNumber, settings);
			}, scrollIntervalTime);		
			return scrollTimeout;		
		},						
		args: function(settings, node, activeSlideNode, newChildOffset, targetSlideOffset, isChanged) {
			this.settings = settings;
			this.data = $(node).parent().data('iosslider');
			this.slideChanged = isChanged;
			this.sliderObject = node;
			this.sliderContainerObject = $(node).parent();
			this.currentSlideObject = activeSlideNode;
			this.currentSlideNumber = newChildOffset + 1;
			this.targetSlideObject = $(node).children(':eq(' + targetSlideOffset + ')');
			this.targetSlideNumber = targetSlideOffset + 1;
			this.currentSliderOffset = helpers.getSliderOffset(node, 'x') * -1;			
			try {
				if($(node).parent().data('args') == undefined) {
					this.prevSlideNumber = settings.startAtSlide;
				} else if($(node).parent().data('args').prevSlideNumber == this.currentSlideNumber) {
					this.prevSlideNumber = $(node).parent().data('args').currentSlideNumber;					
				} else {
					this.prevSlideNumber = $(node).parent().data('args').prevSlideNumber;
				}				
				this.prevSlideObject = $(node).children(':eq(' + this.prevSlideNumber + ')');
			} catch(e) {}
		},		
		preventDrag: function(event) {
			event.preventDefault();
		},		
		preventClick: function(event) {
			event.stopImmediatePropagation();
			return false;
		},		
		enableClick: function() {
			return true;
		}        
    }    
    helpers.setBrowserInfo();    
    var methods = {		
		init: function(options, node) {			
			has3DTransform = helpers.has3DTransform();			
			var settings = $.extend(true, {
				'elasticPullResistance': 0.6, 		
				'frictionCoefficient': 0.92,
				'elasticFrictionCoefficient': 0.6,
				'snapFrictionCoefficient': 0.92,
				'snapToChildren': false,
				'snapSlideCenter': false,
				'startAtSlide': 1,
				'scrollbar': false,
				'scrollbarDrag': false,
				'scrollbarHide': true,
				'scrollbarLocation': 'top',
				'scrollbarContainer': '',
				'scrollbarOpacity': 0.4,
				'scrollbarHeight': '4px',
				'scrollbarBorder': '0',
				'scrollbarMargin': '5px',
				'scrollbarBackground': '#000',
				'scrollbarBorderRadius': '100px',
				'scrollbarShadow': '0 0 0 #000',
				'scrollbarElasticPullResistance': 0.9,
				'desktopClickDrag': false,
				'keyboardControls': false,
				'tabToAdvance': false,
				'responsiveSlideContainer': true,
				'responsiveSlides': true,
				'navSlideSelector': '',
				'navPrevSelector': '',
				'navNextSelector': '',
				'autoSlideToggleSelector': '',
				'autoSlide': false,
				'autoSlideTimer': 20000,
				'autoSlideTransTimer': 750,
				'infiniteSlider': false,
				'stageCSS': {
					position: 'relative',
					top: '0',
					left: '0',
					overflow: 'hidden',
					zIndex: 1
				},
				'unselectableSelector': '',
				'onSliderLoaded': '',
				'onSliderUpdate': '',
				'onSliderResize': '',
				'onSlideStart': '',
				'onSlideChange': '',
				'onSlideComplete': ''
			}, options);			
			if(node == undefined) {
				node = this;
			}			
			return $(node).each(function(i) {				
				scrollbarNumber++;
				var sliderNumber = scrollbarNumber;
				var scrollTimeouts = new Array();
				iosSliderSettings[sliderNumber] = settings;
				sliderMin[sliderNumber] = 0;
				sliderMax[sliderNumber] = 0;
				var minTouchpoints = 0;
				var xCurrentScrollRate = new Array(0, 0);
				var yCurrentScrollRate = new Array(0, 0);
				var scrollbarBlockClass = 'scrollbarBlock' + scrollbarNumber;
				var scrollbarClass = 'scrollbar' + scrollbarNumber;
				var scrollbarNode;
				var scrollbarBlockNode;
				var scrollbarStageWidth;
				var scrollbarWidth;
				var containerWidth;
				var containerHeight;
				var centeredSlideOffset = 0;
				var stageNode = $(this);
				var stageWidth;
				var stageHeight;
				var slideWidth;
				var scrollMargin;
				var scrollBorder;
				var lastTouch;
				var isFirstInit = true;
				var newChildOffset = -1;
				var webkitTransformArray = new Array();
				var childrenOffsets;
				var originalOffsets = new Array();
				var scrollbarStartOpacity = 0;
				var xScrollStartPosition = 0;
				var yScrollStartPosition = 0;
				var currentTouches = 0;
				var scrollerNode = $(this).children(':first-child');
				var slideNodes;
				var slideNodeWidths;
				var slideNodeOuterWidths;
				var numberOfSlides = $(scrollerNode).children().not('script').size();
				var xScrollStarted = false;
				var lastChildOffset = 0;
				var isMouseDown = false;
				var currentSlider = undefined;
				var sliderStopLocation = 0;
				var infiniteSliderWidth;
				infiniteSliderOffset[sliderNumber] = 0;
				var shortContent = false;
				onChangeEventLastFired[sliderNumber] = -1;
				var isAutoSlideToggleOn = false;
				iosSliders[sliderNumber] = stageNode;
				isEventCleared[sliderNumber] = false;
				var currentEventNode;
				var intermediateChildOffset = 0;
				var tempInfiniteSliderOffset = 0;
				var preventXScroll = false;
				var snapOverride = false;
				var scrollerWidth;
				var clickEvent = isTouch ? 'touchstart.iosSliderEvent' : 'click.iosSliderEvent';
				var anchorEvents;
				var onclickEvents;
				var allScrollerNodeChildren;
				touchLocks[sliderNumber] = false;
				slideTimeouts[sliderNumber] = new Array();
				if(settings.scrollbarDrag) {
					settings.scrollbar = true;
					settings.scrollbarHide = false;
				}
				var $this = $(this);
				var data = $this.data('iosslider');	
				if(data != undefined) return true;           		
           		$(this).find('img').bind('dragstart.iosSliderEvent', function(event) { event.preventDefault(); });
				if(settings.infiniteSlider) {
					settings.scrollbar = false;
				}						
				if(settings.scrollbar) {					
					if(settings.scrollbarContainer != '') {
						$(settings.scrollbarContainer).append("<div class = '" + scrollbarBlockClass + "'><div class = '" + scrollbarClass + "'></div></div>");
					} else {
						$(scrollerNode).parent().append("<div class = '" + scrollbarBlockClass + "'><div class = '" + scrollbarClass + "'></div></div>");
					}			
				}				
				if(!init()) return true;				
				$(this).find('a').bind('mousedown', helpers.preventDrag);
				$(this).find("[onclick]").bind('click', helpers.preventDrag).each(function() {					
					$(this).data('onclick', this.onclick);				
				});				
				var newChildOffset = helpers.calcActiveOffset(settings, helpers.getSliderOffset($(scrollerNode), 'x'), childrenOffsets, stageWidth, infiniteSliderOffset[sliderNumber], numberOfSlides, undefined, sliderNumber);
				var tempOffset = (newChildOffset + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;				
				var args = new helpers.args(settings, scrollerNode, $(scrollerNode).children(':eq(' + tempOffset + ')'), tempOffset, tempOffset, false);
				$(stageNode).data('args', args);
				if(settings.onSliderLoaded != '') {
					settings.onSliderLoaded(args);					
				}				
				onChangeEventLastFired[sliderNumber] = tempOffset;
				function init() {					
					helpers.autoSlidePause(sliderNumber);					
					anchorEvents = $(scrollerNode).find('a');
					onclickEvents = $(scrollerNode).find('[onclick]');
					allScrollerNodeChildren = $(scrollerNode).find('*');					
					$(stageNode).css('width', '');
					$(stageNode).css('height', '');
					$(scrollerNode).css('width', '');
					slideNodes = $(scrollerNode).children().not('script').get();
					slideNodeWidths = new Array();
					slideNodeOuterWidths = new Array();					
					$(slideNodes).css('width', '');					
					sliderMax[sliderNumber] = 0;
					childrenOffsets = new Array();
					containerWidth = $(stageNode).parent().width();
					stageWidth = $(stageNode).outerWidth(true);					
					if(settings.responsiveSlideContainer) {
						stageWidth = ($(stageNode).outerWidth(true) > containerWidth) ? containerWidth : $(stageNode).outerWidth(true);
					}
					$(stageNode).css({
						position: settings.stageCSS.position,
						top: settings.stageCSS.top,
						left: settings.stageCSS.left,
						overflow: settings.stageCSS.overflow,
						zIndex: settings.stageCSS.zIndex,
						'webkitPerspective': 1000,
						'webkitBackfaceVisibility': 'hidden',
						width: stageWidth
					});					
					$(settings.unselectableSelector).css({
						cursor: 'default'
					});						
					for(var j = 0; j < slideNodes.length; j++) {						
						slideNodeWidths[j] = $(slideNodes[j]).width();
						slideNodeOuterWidths[j] = $(slideNodes[j]).outerWidth(true);
						var newWidth = slideNodeOuterWidths[j];						
						if(settings.responsiveSlides) {
							if(slideNodeOuterWidths[j] > stageWidth) {								
								newWidth = stageWidth + (slideNodeOuterWidths[j] - slideNodeWidths[j]) * -1;								
							} else {
								newWidth = slideNodeWidths[j];								
							}							
							$(slideNodes[j]).css({
								width: newWidth
							});					
						}
						$(slideNodes[j]).css({
							'webkitBackfaceVisibility': 'hidden',
							position: 'absolute',
							top: 0
						});						
						childrenOffsets[j] = sliderMax[sliderNumber] * -1;						
						sliderMax[sliderNumber] = sliderMax[sliderNumber] + newWidth + (slideNodeOuterWidths[j] - slideNodeWidths[j]);					
					}					
					if(settings.snapSlideCenter) {
						centeredSlideOffset = (stageWidth - slideNodeOuterWidths[0]) * 0.5;						
						if(settings.responsiveSlides && (slideNodeOuterWidths[0] > stageWidth)) {
							centeredSlideOffset = 0;
						}
					}					
					sliderAbsMax[sliderNumber] = sliderMax[sliderNumber] * 2;					
					for(var j = 0; j < slideNodes.length; j++) {						
						helpers.setSliderOffset($(slideNodes[j]), childrenOffsets[j] * -1 + sliderMax[sliderNumber] + centeredSlideOffset);						
						childrenOffsets[j] = childrenOffsets[j] - sliderMax[sliderNumber];					
					}					
					if(!settings.infiniteSlider && !settings.snapSlideCenter) {					
						for(var i = 0; i < childrenOffsets.length; i++) {							
							if(childrenOffsets[i] <= ((sliderMax[sliderNumber] * 2 - stageWidth) * -1)) {
								break;
							}							
							lastChildOffset = i;							
						}						
						childrenOffsets.splice(lastChildOffset + 1, childrenOffsets.length);
						childrenOffsets[childrenOffsets.length] = (sliderMax[sliderNumber] * 2 - stageWidth) * -1;					
					}					
					for(var i = 0; i < childrenOffsets.length; i++) {
						originalOffsets[i] = childrenOffsets[i];
					}					
					if(isFirstInit) {
						settings.startAtSlide = (iosSliderSettings[sliderNumber].startAtSlide > childrenOffsets.length) ? childrenOffsets.length : iosSliderSettings[sliderNumber].startAtSlide;
						if(settings.infiniteSlider) {
							settings.startAtSlide = (iosSliderSettings[sliderNumber].startAtSlide - 1 + numberOfSlides)%numberOfSlides;
							activeChildOffsets[sliderNumber] = (iosSliderSettings[sliderNumber].startAtSlide);
						} else {
							settings.startAtSlide = ((iosSliderSettings[sliderNumber].startAtSlide - 1) < 0) ? childrenOffsets.length-1 : iosSliderSettings[sliderNumber].startAtSlide;	
							activeChildOffsets[sliderNumber] = (iosSliderSettings[sliderNumber].startAtSlide-1);
						}
						activeChildInfOffsets[sliderNumber] = activeChildOffsets[sliderNumber];
					}					
					sliderMin[sliderNumber] = sliderMax[sliderNumber] + centeredSlideOffset;					
					$(scrollerNode).css({
						position: 'relative',
						cursor: grabOutCursor,
						'webkitPerspective': '0',
						'webkitBackfaceVisibility': 'hidden',
						width: sliderMax[sliderNumber] + 'px'
					});					
					scrollerWidth = sliderMax[sliderNumber];
					sliderMax[sliderNumber] = sliderMax[sliderNumber] * 2 - stageWidth + centeredSlideOffset * 2;
					shortContent = (scrollerWidth < stageWidth) ? true : false;
					if(shortContent) {						
						$(scrollerNode).css({
							cursor: 'default'
						});						
					}					
					containerHeight = $(stageNode).parent().outerHeight(true);
					stageHeight = $(stageNode).height();					
					if(settings.responsiveSlideContainer) {
						stageHeight = (stageHeight > containerHeight) ? containerHeight : stageHeight;
					}					
					$(stageNode).css({
						height: stageHeight
					});
					helpers.setSliderOffset(scrollerNode, childrenOffsets[activeChildOffsets[sliderNumber]]);					
					if(settings.infiniteSlider && !shortContent) {						
						var currentScrollOffset = helpers.getSliderOffset($(scrollerNode), 'x');
						var count = (infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides * -1;
						while(count < 0) {								
							var lowSlideNumber = 0;
							var lowSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
							$(slideNodes).each(function(i) {								
								if(helpers.getSliderOffset(this, 'x') < lowSlideOffset) {
									lowSlideOffset = helpers.getSliderOffset(this, 'x');
									lowSlideNumber = i;
								}							
							});							
							var newOffset = sliderMin[sliderNumber] + scrollerWidth;
							helpers.setSliderOffset($(slideNodes)[lowSlideNumber], newOffset);							
							sliderMin[sliderNumber] = childrenOffsets[1] * -1 + centeredSlideOffset;
							sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
							childrenOffsets.splice(0, 1);
							childrenOffsets.splice(childrenOffsets.length, 0, newOffset * -1 + centeredSlideOffset);
							count++;							
						}						
						while(((childrenOffsets[0] * -1 - scrollerWidth + centeredSlideOffset) > 0) && settings.snapSlideCenter && isFirstInit) {							
							var highSlideNumber = 0;
							var highSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
							$(slideNodes).each(function(i) {
								
								if(helpers.getSliderOffset(this, 'x') > highSlideOffset) {
									highSlideOffset = helpers.getSliderOffset(this, 'x');
									highSlideNumber = i;
								}								
							});
							var newOffset = sliderMin[sliderNumber] - slideNodeOuterWidths[highSlideNumber];
							helpers.setSliderOffset($(slideNodes)[highSlideNumber], newOffset);							
							childrenOffsets.splice(0, 0, newOffset * -1 + centeredSlideOffset);
							childrenOffsets.splice(childrenOffsets.length-1, 1);
							sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
							sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
							infiniteSliderOffset[sliderNumber]--;
							activeChildOffsets[sliderNumber]++;							
						}					
					}					
					helpers.setSliderOffset(scrollerNode, childrenOffsets[activeChildOffsets[sliderNumber]]);					
					if(!isTouch && !settings.desktopClickDrag) {						
						$(scrollerNode).css({
							cursor: 'default'
						});						
					}					
					if(settings.scrollbar) {						
						$('.' + scrollbarBlockClass).css({ 
							margin: settings.scrollbarMargin,
							overflow: 'hidden',
							display: 'none'
						});						
						$('.' + scrollbarBlockClass + ' .' + scrollbarClass).css({ 
							border: settings.scrollbarBorder
						});						
						scrollMargin = parseInt($('.' + scrollbarBlockClass).css('marginLeft')) + parseInt($('.' + scrollbarBlockClass).css('marginRight'));
						scrollBorder = parseInt($('.' + scrollbarBlockClass + ' .' + scrollbarClass).css('borderLeftWidth'), 10) + parseInt($('.' + scrollbarBlockClass + ' .' + scrollbarClass).css('borderRightWidth'), 10);
						scrollbarStageWidth = (settings.scrollbarContainer != '') ? $(settings.scrollbarContainer).width() : stageWidth;
						scrollbarWidth = (scrollbarStageWidth - scrollMargin) / numberOfSlides;		
						if(!settings.scrollbarHide) {
							scrollbarStartOpacity = settings.scrollbarOpacity;
						}						
						$('.' + scrollbarBlockClass).css({ 
							position: 'absolute',
							left: 0,
							width: scrollbarStageWidth - scrollMargin + 'px',
							margin: settings.scrollbarMargin
						});						
						if(settings.scrollbarLocation == 'top') {
							$('.' + scrollbarBlockClass).css('top', '0');
						} else {
							$('.' + scrollbarBlockClass).css('bottom', '0');
						}						
						$('.' + scrollbarBlockClass + ' .' + scrollbarClass).css({ 
							borderRadius: settings.scrollbarBorderRadius,
							background: settings.scrollbarBackground,
							height: settings.scrollbarHeight,
							width: scrollbarWidth - scrollBorder + 'px',
							minWidth: settings.scrollbarHeight,
							border: settings.scrollbarBorder,
							'webkitPerspective': 1000,
							'webkitBackfaceVisibility': 'hidden',
							'position': 'relative',
							opacity: scrollbarStartOpacity,
							filter: 'alpha(opacity:' + (scrollbarStartOpacity * 100) + ')',
							boxShadow: settings.scrollbarShadow
						});						
						helpers.setSliderOffset($('.' + scrollbarBlockClass + ' .' + scrollbarClass), Math.floor((childrenOffsets[activeChildOffsets[sliderNumber]] * -1 - sliderMin[sliderNumber] + centeredSlideOffset) / (sliderMax[sliderNumber] - sliderMin[sliderNumber] + centeredSlideOffset) * (scrollbarStageWidth - scrollMargin - scrollbarWidth)));		
						$('.' + scrollbarBlockClass).css({
							display: 'block'
						});						
						scrollbarNode = $('.' + scrollbarBlockClass + ' .' + scrollbarClass);
						scrollbarBlockNode = $('.' + scrollbarBlockClass);					
					}					
					if(settings.scrollbarDrag && !shortContent) {
						$('.' + scrollbarBlockClass + ' .' + scrollbarClass).css({
							cursor: grabOutCursor
						});
					}
					if(settings.infiniteSlider) {
						infiniteSliderWidth = (sliderMax[sliderNumber] + stageWidth) / 3;
					}
					if(settings.navSlideSelector != '') {
						$(settings.navSlideSelector).each(function(j) {						
							$(this).css({
								cursor: 'pointer'
							});
							$(this).unbind(clickEvent).bind(clickEvent, function() {
								helpers.changeSlide(j, scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);						
							});						
						});								
					}						
					if(settings.navPrevSelector != '') {
						
						$(settings.navPrevSelector).css({
							cursor: 'pointer'
						});						
						$(settings.navPrevSelector).unbind(clickEvent).bind(clickEvent, function() {							
							var slide = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;											
							if((slide > 0) || settings.infiniteSlider) {
								helpers.changeSlide(slide - 1, scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
							}
						});					
					}					
					if(settings.navNextSelector != '') {						
						$(settings.navNextSelector).css({
							cursor: 'pointer'
						});						
						$(settings.navNextSelector).unbind(clickEvent).bind(clickEvent, function() {							
							var slide = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;							
							if((slide < childrenOffsets.length-1) || settings.infiniteSlider) {
								helpers.changeSlide(slide + 1, scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
							}
						});					
					}					
					if(settings.autoSlide && !shortContent) {						
						if(settings.autoSlideToggleSelector != '') {						
							$(settings.autoSlideToggleSelector).css({
								cursor: 'pointer'
							});							
							$(settings.autoSlideToggleSelector).unbind(clickEvent).bind(clickEvent, function() {								
								if(!isAutoSlideToggleOn) {								
									helpers.autoSlidePause(sliderNumber);
									isAutoSlideToggleOn = true;									
									$(settings.autoSlideToggleSelector).addClass('on');									
								} else {									
									helpers.autoSlide(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);									
									isAutoSlideToggleOn = false;									
									$(settings.autoSlideToggleSelector).removeClass('on');									
								}							
							});						
						}						
						if(!isAutoSlideToggleOn && !shortContent) {
							helpers.autoSlide(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
						}	
						if(!isTouch) {							
							$(stageNode).bind('mouseenter.iosSliderEvent', function() {
								helpers.autoSlidePause(sliderNumber);
							});							
							$(stageNode).bind('mouseleave.iosSliderEvent', function() {
								if(!isAutoSlideToggleOn && !shortContent) {
									helpers.autoSlide(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
								}
							});						
						} else {							
							$(stageNode).bind('touchend.iosSliderEvent', function() {							
								if(!isAutoSlideToggleOn && !shortContent) {
									helpers.autoSlide(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
								}							
							});						
						}					
					}					
					$(stageNode).data('iosslider', {
						obj: $this,
						settings: settings,
						scrollerNode: scrollerNode,
						slideNodes: slideNodes,
						numberOfSlides: numberOfSlides,
						centeredSlideOffset: centeredSlideOffset,
						sliderNumber: sliderNumber,
						originalOffsets: originalOffsets,
						childrenOffsets: childrenOffsets,
						sliderMax: sliderMax[sliderNumber],
						scrollbarClass: scrollbarClass,
						scrollbarWidth: scrollbarWidth, 
						scrollbarStageWidth: scrollbarStageWidth,
						stageWidth: stageWidth, 
						scrollMargin: scrollMargin, 
						scrollBorder: scrollBorder, 
						infiniteSliderOffset: infiniteSliderOffset[sliderNumber], 
						infiniteSliderWidth: infiniteSliderWidth						
					});					
					isFirstInit = false;					
					return true;				
				}				
				if(iosSliderSettings[sliderNumber].responsiveSlides || iosSliderSettings[sliderNumber].responsiveSlideContainer) {					
					var orientationEvent = supportsOrientationChange ? 'orientationchange' : 'resize';					
					$(window).bind(orientationEvent + '.iosSliderEvent', function() {							
						if(!init()) return true;						
						var args = $(stageNode).data('args');				
						if(settings.onSliderResize != '') {
					    	settings.onSliderResize(args);
					    }						
					});					
				}				
				if((settings.keyboardControls || settings.tabToAdvance) && !shortContent) {
					$(document).bind('keydown.iosSliderEvent', function(e) {						
						if((!isIe7) && (!isIe8)) {
							var e = e.originalEvent;
						}						
						if((e.keyCode == 37) && settings.keyboardControls) {							
							e.preventDefault();							
							var slide = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;
							if((slide > 0) || settings.infiniteSlider) {
								helpers.changeSlide(slide - 1, scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
							} 								
						} else if(((e.keyCode == 39) && settings.keyboardControls) || ((e.keyCode == 9) && settings.tabToAdvance)) {							
							e.preventDefault();							
							var slide = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;								
							if((slide < childrenOffsets.length-1) || settings.infiniteSlider) {
								helpers.changeSlide(slide + 1, scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, centeredSlideOffset, settings);
							}								
						}					
					});					
				}					
				if(isTouch || settings.desktopClickDrag) {					
					var touchStartEvent = isTouch ? 'touchstart.iosSliderEvent' : 'mousedown.iosSliderEvent';
					var touchSelection = $(scrollerNode);
					var touchSelectionMove = $(scrollerNode);
					var preventDefault = null;
					var isUnselectable = false;					
					if(settings.scrollbarDrag) {					
						touchSelection = touchSelection.add(scrollbarNode);
						touchSelectionMove = touchSelectionMove.add(scrollbarBlockNode);						
					}					
					$(touchSelection).bind(touchStartEvent, function(e) {						
						if(touchLocks[sliderNumber] || shortContent) return true;						
						isUnselectable = helpers.isUnselectable(e.target, settings);						
						if(isUnselectable) return true;						
						currentEventNode = ($(this)[0] === $(scrollbarNode)[0]) ? scrollbarNode : scrollerNode;						
						if((!isIe7) && (!isIe8)) {
							var e = e.originalEvent;
						}
						helpers.autoSlidePause(sliderNumber);						
						allScrollerNodeChildren.unbind('.disableClick');						
						if(!isTouch) {							
							if (window.getSelection) {
								if (window.getSelection().empty) {
									window.getSelection().empty();
								} else if (window.getSelection().removeAllRanges) {
									window.getSelection().removeAllRanges();
								}
							} else if (document.selection) {
								document.selection.empty();
							}							
							eventX = e.pageX;
							eventY = e.pageY;							
							isMouseDown = true;
							currentSlider = scrollerNode;
							$(this).css({
								cursor: grabInCursor
							});							
						} else {						
							eventX = e.touches[0].pageX;
							eventY = e.touches[0].pageY;
						}						
						xCurrentScrollRate = new Array(0, 0);
						yCurrentScrollRate = new Array(0, 0);
						xScrollDistance = 0;
						xScrollStarted = false;						
						for(var j = 0; j < scrollTimeouts.length; j++) {
							clearTimeout(scrollTimeouts[j]);
						}						
						var scrollPosition = helpers.getSliderOffset(scrollerNode, 'x');
						if(scrollPosition > (sliderMin[sliderNumber] * -1 + centeredSlideOffset + scrollerWidth)) {							
							scrollPosition = sliderMin[sliderNumber] * -1 + centeredSlideOffset + scrollerWidth;
							helpers.setSliderOffset($('.' + scrollbarClass), scrollPosition);							
							$('.' + scrollbarClass).css({
								width: (scrollbarWidth - scrollBorder) + 'px'
							});							
						} else if(scrollPosition < (sliderMax[sliderNumber] * -1)) {						
							scrollPosition = sliderMax[sliderNumber] * -1;
							helpers.setSliderOffset($('.' + scrollbarClass), (scrollbarStageWidth - scrollMargin - scrollbarWidth));							
							$('.' + scrollbarClass).css({
								width: (scrollbarWidth - scrollBorder) + 'px'
							});							
						} 						
						var scrollbarSubtractor = ($(this)[0] === $(scrollbarNode)[0]) ? (sliderMin[sliderNumber]) : 0;						
						xScrollStartPosition = (helpers.getSliderOffset(this, 'x') - eventX - scrollbarSubtractor) * -1;
						yScrollStartPosition = (helpers.getSliderOffset(this, 'y') - eventY) * -1;
						xCurrentScrollRate[1] = eventX;
						yCurrentScrollRate[1] = eventY;						
						snapOverride = false;
					});					
					var touchMoveEvent = isTouch ? 'touchmove.iosSliderEvent' : 'mousemove.iosSliderEvent';					
					$(touchSelectionMove).bind(touchMoveEvent, function(e) {
						if((!isIe7) && (!isIe8)) {
							var e = e.originalEvent;
						}						
						if(touchLocks[sliderNumber] || shortContent) return true;						
						if(isUnselectable) return true;
						var edgeDegradation = 0;
						if(!isTouch) {							
							if (window.getSelection) {
								if (window.getSelection().empty) {
									window.getSelection().empty();
								} else if (window.getSelection().removeAllRanges) {
									window.getSelection().removeAllRanges();
								}
							} else if (document.selection) {
								document.selection.empty();
							}							
						}						
						if(isTouch) {
							eventX = e.touches[0].pageX;
							eventY = e.touches[0].pageY;
						} else {
							eventX = e.pageX;
							eventY = e.pageY;							
							if(!isMouseDown) {
								return false;
							}							
							if(!isIe) {
								if((typeof e.webkitMovementX != 'undefined' || typeof e.webkitMovementY != 'undefined') && e.webkitMovementY === 0 && e.webkitMovementX === 0) {
									return false;
								}
							}							
						}						
						xCurrentScrollRate[0] = xCurrentScrollRate[1];
						xCurrentScrollRate[1] = eventX;
						xScrollDistance = (xCurrentScrollRate[1] - xCurrentScrollRate[0]) / 2;						
						yCurrentScrollRate[0] = yCurrentScrollRate[1];
						yCurrentScrollRate[1] = eventY;
						yScrollDistance = (yCurrentScrollRate[1] - yCurrentScrollRate[0]) / 2;						
						if(!xScrollStarted) {						
							var slide = (activeChildOffsets[sliderNumber] + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;
							var args = new helpers.args(settings, scrollerNode, $(scrollerNode).children(':eq(' + slide + ')'), slide, slide, false);
							$(stageNode).data('args', args);
							if(settings.onSlideStart != '') {
								settings.onSlideStart(args);
							}							
						}						
						if(((yScrollDistance > 3) || (yScrollDistance < -3)) && ((xScrollDistance < 3) && (xScrollDistance > -3)) && (isTouch) && (!xScrollStarted)) {
							preventXScroll = true;
						}						
						if(((xScrollDistance > 5) || (xScrollDistance < -5)) && (isTouch)) {						
							e.preventDefault();
							xScrollStarted = true;							
						} else if(!isTouch) {							
							xScrollStarted = true;							
						}						
						if(xScrollStarted && !preventXScroll) {							
							var scrollPosition = helpers.getSliderOffset(scrollerNode, 'x');
							var scrollbarSubtractor = ($(this)[0] === $(scrollbarBlockNode)[0]) ? (sliderMin[sliderNumber]) : centeredSlideOffset;
							var scrollbarMultiplier = ($(this)[0] === $(scrollbarBlockNode)[0]) ? ((sliderMin[sliderNumber] - sliderMax[sliderNumber] - centeredSlideOffset) / (scrollbarStageWidth - scrollMargin - scrollbarWidth)) : 1;
							var elasticPullResistance = ($(this)[0] === $(scrollbarBlockNode)[0]) ? settings.scrollbarElasticPullResistance : settings.elasticPullResistance;
							var snapCenteredSlideOffset = (settings.snapSlideCenter && ($(this)[0] === $(scrollbarBlockNode)[0])) ? 0 : centeredSlideOffset;
							var snapCenteredSlideOffsetScrollbar = (settings.snapSlideCenter && ($(this)[0] === $(scrollbarBlockNode)[0])) ? centeredSlideOffset : 0;
							if(isTouch) {
								if(currentTouches != e.touches.length) {
									xScrollStartPosition = (scrollPosition * -1) + eventX;
								}								
								currentTouches = e.touches.length;
							}							
							if(settings.infiniteSlider) {
								if(scrollPosition <= (sliderMax[sliderNumber] * -1)) {									
									var scrollerWidth = $(scrollerNode).width();									
									if(scrollPosition <= (sliderAbsMax[sliderNumber] * -1)) {										
										var sum = originalOffsets[0] * -1;
										$(slideNodes).each(function(i) {											
											helpers.setSliderOffset($(slideNodes)[i], sum + centeredSlideOffset);
											if(i < childrenOffsets.length) {
												childrenOffsets[i] = sum * -1;
											}
											sum = sum + $(this).outerWidth(true);											
										});										
										xScrollStartPosition = xScrollStartPosition - childrenOffsets[0] * -1;
										sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
										sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
										infiniteSliderOffset[sliderNumber] = 0;										
									} else {										
										var lowSlideNumber = 0;
										var lowSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
										$(slideNodes).each(function(i) {											
											if(helpers.getSliderOffset(this, 'x') < lowSlideOffset) {
												lowSlideOffset = helpers.getSliderOffset(this, 'x');
												lowSlideNumber = i;
											}											
										});										
										var newOffset = sliderMin[sliderNumber] + scrollerWidth;
										helpers.setSliderOffset($(slideNodes)[lowSlideNumber], newOffset);											
										sliderMin[sliderNumber] = childrenOffsets[1] * -1 + centeredSlideOffset;
										sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
										childrenOffsets.splice(0, 1);
										childrenOffsets.splice(childrenOffsets.length, 0, newOffset * -1 + centeredSlideOffset);
										infiniteSliderOffset[sliderNumber]++;										
									}									
								}								
								if((scrollPosition >= (sliderMin[sliderNumber] * -1)) || (scrollPosition >= 0)) {		
									var scrollerWidth = $(scrollerNode).width();									
									if(scrollPosition >= 0) {									
										var sum = originalOffsets[0] * -1;
										$(slideNodes).each(function(i) {											
											helpers.setSliderOffset($(slideNodes)[i], sum + centeredSlideOffset);
											if(i < childrenOffsets.length) {
												childrenOffsets[i] = sum * -1;
											}
											sum = sum + $(this).outerWidth(true);											
										});										
										xScrollStartPosition = xScrollStartPosition + childrenOffsets[0] * -1;
										sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
										sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
										infiniteSliderOffset[sliderNumber] = numberOfSlides;										
										while(((childrenOffsets[0] * -1 - scrollerWidth + centeredSlideOffset) > 0)) {				
											var highSlideNumber = 0;
											var highSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
											$(slideNodes).each(function(i) {												
												if(helpers.getSliderOffset(this, 'x') > highSlideOffset) {
													highSlideOffset = helpers.getSliderOffset(this, 'x');
													highSlideNumber = i;
												}												
											});				
											var newOffset = sliderMin[sliderNumber] - $(slideNodes[highSlideNumber]).outerWidth(true);
											helpers.setSliderOffset($(slideNodes)[highSlideNumber], newOffset);											
											childrenOffsets.splice(0, 0, newOffset * -1 + centeredSlideOffset);
											childrenOffsets.splice(childrenOffsets.length-1, 1);				
											sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
											sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;				
											infiniteSliderOffset[sliderNumber]--;
											activeChildOffsets[sliderNumber]++;											
										}
									} else {
										var highSlideNumber = 0;
										var highSlideOffset = helpers.getSliderOffset($(slideNodes[0]), 'x');
										$(slideNodes).each(function(i) {											
											if(helpers.getSliderOffset(this, 'x') > highSlideOffset) {
												highSlideOffset = helpers.getSliderOffset(this, 'x');
												highSlideNumber = i;
											}											
										});										
										var newOffset = sliderMin[sliderNumber] - $(slideNodes[highSlideNumber]).outerWidth(true);
										helpers.setSliderOffset($(slideNodes)[highSlideNumber], newOffset);	
										childrenOffsets.splice(0, 0, newOffset * -1 + centeredSlideOffset);
										childrenOffsets.splice(childrenOffsets.length-1, 1);
										sliderMin[sliderNumber] = childrenOffsets[0] * -1 + centeredSlideOffset;
										sliderMax[sliderNumber] = sliderMin[sliderNumber] + scrollerWidth - stageWidth;
										infiniteSliderOffset[sliderNumber]--;
									}								
								}								
							} else {								
								var scrollerWidth = $(scrollerNode).width();								
								if(scrollPosition > (sliderMin[sliderNumber] * -1 + centeredSlideOffset)) {
									edgeDegradation = (sliderMin[sliderNumber] + ((xScrollStartPosition - scrollbarSubtractor - eventX + snapCenteredSlideOffset) * -1 * scrollbarMultiplier) - scrollbarSubtractor) * elasticPullResistance * -1 / scrollbarMultiplier;									
								}								
								if(scrollPosition < (sliderMax[sliderNumber] * -1)) {									
									edgeDegradation = (sliderMax[sliderNumber] + snapCenteredSlideOffsetScrollbar + ((xScrollStartPosition - scrollbarSubtractor - eventX) * -1 * scrollbarMultiplier) - scrollbarSubtractor) * elasticPullResistance * -1 / scrollbarMultiplier;										
								}							
							}
							helpers.setSliderOffset(scrollerNode, ((xScrollStartPosition - scrollbarSubtractor - eventX - edgeDegradation) * -1 * scrollbarMultiplier) - scrollbarSubtractor + snapCenteredSlideOffsetScrollbar);							
							if(settings.scrollbar) {								
								helpers.showScrollbar(settings, scrollbarClass);
								scrollbarDistance = Math.floor((xScrollStartPosition - eventX - edgeDegradation - sliderMin[sliderNumber] + snapCenteredSlideOffset) / (sliderMax[sliderNumber] - sliderMin[sliderNumber] + centeredSlideOffset) * (scrollbarStageWidth - scrollMargin - scrollbarWidth) * scrollbarMultiplier);								
								var width = scrollbarWidth;								
								if(scrollPosition >= (sliderMin[sliderNumber] * -1 + snapCenteredSlideOffset + scrollerWidth)) {
									width = scrollbarWidth - scrollBorder - (scrollbarDistance * -1);									
									helpers.setSliderOffset($('.' + scrollbarClass), 0);									
									$('.' + scrollbarClass).css({
										width: width + 'px'
									});									
								} else if(scrollPosition <= ((sliderMax[sliderNumber] * -1) + 1)) {
									width = scrollbarStageWidth - scrollMargin - scrollBorder - scrollbarDistance;									
									helpers.setSliderOffset($('.' + scrollbarClass), scrollbarDistance);									
									$('.' + scrollbarClass).css({
										width: width + 'px'
									});									
								} else {								
									helpers.setSliderOffset($('.' + scrollbarClass), scrollbarDistance);									
								}								
							}							
							if(isTouch) {
								lastTouch = e.touches[0].pageX;
							}
							var slideChanged = false;
							var newChildOffset = helpers.calcActiveOffset(settings, (xScrollStartPosition - eventX - edgeDegradation) * -1, childrenOffsets, stageWidth, infiniteSliderOffset[sliderNumber], numberOfSlides, undefined, sliderNumber);
							var tempOffset = (newChildOffset + infiniteSliderOffset[sliderNumber] + numberOfSlides)%numberOfSlides;
							if(settings.infiniteSlider) {								
								if(tempOffset != activeChildInfOffsets[sliderNumber]) {
									slideChanged = true;
								}									
							} else {							
								if(newChildOffset != activeChildOffsets[sliderNumber]) {
									slideChanged = true;
								}							
							}							
							if(slideChanged) {								
								activeChildOffsets[sliderNumber] = newChildOffset;
								activeChildInfOffsets[sliderNumber] = tempOffset;
								snapOverride = true;								
								var args = new helpers.args(settings, scrollerNode, $(scrollerNode).children(':eq(' + tempOffset + ')'), tempOffset, tempOffset, true);
								$(stageNode).data('args', args);								
								if(settings.onSlideChange != '') {
									settings.onSlideChange(args);
								}								
							}							
						}						
					});					
					$(touchSelection).bind('touchend.iosSliderEvent', function(e) {						
						var e = e.originalEvent;						
						if(touchLocks[sliderNumber] || shortContent) return true;						
						if(isUnselectable) return true;						
						if(e.touches.length != 0) {							
							for(var j = 0; j < e.touches.length; j++) {								
								if(e.touches[j].pageX == lastTouch) {
									helpers.slowScrollHorizontal(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, currentEventNode, snapOverride, centeredSlideOffset, settings);
								}								
							}							
						} else {							
							helpers.slowScrollHorizontal(scrollerNode, slideNodes, scrollTimeouts, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, currentEventNode, snapOverride, centeredSlideOffset, settings);							
						}						
						preventXScroll = false;						
					});					
					if(!isTouch) {
						var eventObject = $(window);	
						if(isIe8 || isIe7) {
							var eventObject = $(document); 
						}						
						$(eventObject).bind('mouseup.iosSliderEvent' + sliderNumber, function(e) {							
							if(xScrollStarted) {
								anchorEvents.unbind('click.disableClick').bind('click.disableClick', helpers.preventClick);
							} else {
								anchorEvents.unbind('click.disableClick').bind('click.disableClick', helpers.enableClick);
							}							
							onclickEvents.each(function() {								
								this.onclick = function(event) {
									if(xScrollStarted) { 
										return false;
									}								
									$(this).data('onclick').call(this, event || window.event);
								}								
							});							
							if(parseFloat($().jquery) >= 1.8) {								
								allScrollerNodeChildren.each(function() {										
									var clickObject = $._data(this, 'events');									
									if(clickObject != undefined) {
										if(clickObject.click != undefined) {
											if(clickObject.click[0].namespace != 'iosSliderEvent') {												
												if(!xScrollStarted) { 
													return false;
												}											
												$(this).one('click.disableClick', helpers.preventClick);
											    var handlers = $._data(this, 'events').click;
											    var handler = handlers.pop();
											    handlers.splice(0, 0, handler);												
											}											
										}
									}									
								});							
							} else if(parseFloat($().jquery) >= 1.6) {							
								allScrollerNodeChildren.each(function() {										
									var clickObject = $(this).data('events');									
									if(clickObject != undefined) {
										if(clickObject.click != undefined) {
											if(clickObject.click[0].namespace != 'iosSliderEvent') {												
												if(!xScrollStarted) { 
													return false;
												}											
												$(this).one('click.disableClick', helpers.preventClick);
											    var handlers = $(this).data('events').click;
											    var handler = handlers.pop();
											    handlers.splice(0, 0, handler);												
											}											
										}
									}									
								});							
							} else {
							}							
							if(!isEventCleared[sliderNumber]) {							
								if(shortContent) return true;								
								$(touchSelection).css({
									cursor: grabOutCursor
								});								
								isMouseDown = false;								
								if(currentSlider == undefined) {
									return false;
								}
								helpers.slowScrollHorizontal(currentSlider, slideNodes, scrollTimeouts, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, originalOffsets, childrenOffsets, sliderNumber, infiniteSliderWidth, numberOfSlides, currentEventNode, snapOverride, centeredSlideOffset, settings);								
								currentSlider = undefined;							
							}							
							preventXScroll = false;							
						});						
					} 				
				}				
			});				
		},		
		destroy: function(clearStyle, node) {			
			if(node == undefined) {
				node = this;
			}			
			return $(node).each(function() {			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;				
				if(clearStyle == undefined) {
		    		clearStyle = true;
		    	}		    	
	    		helpers.autoSlidePause(data.sliderNumber);
		    	isEventCleared[data.sliderNumber] = true;
		    	$(window).unbind('.iosSliderEvent-' + data.sliderNumber);
		    	$(window).unbind('.iosSliderEvent');
		    	$(document).unbind('.iosSliderEvent-' + data.sliderNumber);
		    	$(document).unbind('keydown.iosSliderEvent');
		    	$(this).unbind('.iosSliderEvent');
	    		$(this).children(':first-child').unbind('.iosSliderEvent');
	    		$(this).children(':first-child').children().unbind('.iosSliderEvent');		    	
		    	if(clearStyle) {
	    			$(this).attr('style', '');
		    		$(this).children(':first-child').attr('style', '');
		    		$(this).children(':first-child').children().attr('style', '');		    		
		    		$(data.settings.navSlideSelector).attr('style', '');
		    		$(data.settings.navPrevSelector).attr('style', '');
		    		$(data.settings.navNextSelector).attr('style', '');
		    		$(data.settings.autoSlideToggleSelector).attr('style', '');
		    		$(data.settings.unselectableSelector).attr('style', '');
	    		}	    		
	    		if(data.settings.scrollbar) {
	    			$('.scrollbarBlock' + data.sliderNumber).remove();
	    		}	    		
	    		var scrollTimeouts = slideTimeouts[data.sliderNumber];	    		
	    		for(var i = 0; i < scrollTimeouts.length; i++) {
					clearTimeout(scrollTimeouts[i]);
				}	    		
	    		$this.removeData(['iosslider', 'args']);		    	
			});		
		},		
		update: function(node) {			
			if(node == undefined) {
				node = this;
			}			
			return $(node).each(function() {
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;				
				data.settings.startAtSlide = $this.data('args').currentSlideNumber;
				methods.destroy(false, this);				
				if((data.numberOfSlides != 1) && data.settings.infiniteSlider) {
				 	data.settings.startAtSlide = (activeChildOffsets[data.sliderNumber] + 1 + infiniteSliderOffset[data.sliderNumber] + data.numberOfSlides)%data.numberOfSlides;
				}
				methods.init(data.settings, this);				
				var args = new helpers.args(data.settings, data.scrollerNode, $(data.scrollerNode).children(':eq(' + (data.settings.startAtSlide - 1) + ')'), data.settings.startAtSlide - 1, data.settings.startAtSlide - 1, false);
				$(data.stageNode).data('args', args);				
				if(data.settings.onSliderUpdate != '') {
			    	data.settings.onSliderUpdate(args);
			    }		    	
			});		
		},		
		addSlide: function(slideNode, slidePosition) {
			return this.each(function() {				
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;				
				if(!data.settings.infiniteSlider) {				
					if(slidePosition <= data.numberOfSlides) {
						$(data.scrollerNode).children(':eq(' + (slidePosition - 1) + ')').before(slideNode);
					} else {
						$(data.scrollerNode).children(':eq(' + (slidePosition - 2) + ')').after(slideNode);
					}					
					if($this.data('args').currentSlideNumber >= slidePosition) {
						$this.data('args').currentSlideNumber++;
					}					
				} else {					
					if(slidePosition == 1) {
						$(data.scrollerNode).children(':eq(0)').before(slideNode);
					} else {
						$(data.scrollerNode).children(':eq(' + (slidePosition - 2) + ')').after(slideNode);
					}					
					if((infiniteSliderOffset[data.sliderNumber] < -1) && (true)) {
						activeChildOffsets[data.sliderNumber]--;
					}					
					if($this.data('args').currentSlideNumber >= slidePosition) {
						activeChildOffsets[data.sliderNumber]++;
					}					
				}					
				$this.data('iosslider').numberOfSlides++;				
				methods.update(this);			
			});		
		},		
		removeSlide: function(slideNumber) {		
			return this.each(function() {			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
				$(data.scrollerNode).children(':eq(' + (slideNumber - 1) + ')').remove();
				if(activeChildOffsets[data.sliderNumber] > (slideNumber - 1)) {
					activeChildOffsets[data.sliderNumber]--;
				}
				methods.update(this);			
			});		
		},		
		goToSlide: function(slide, node) {			
			if(node == undefined) {
				node = this;
			}			
			return $(node).each(function() {					
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;				
				slide = (slide > data.childrenOffsets.length) ? data.childrenOffsets.length - 1 : slide - 1;				
				helpers.changeSlide(slide, $(data.scrollerNode), $(data.slideNodes), slideTimeouts[data.sliderNumber], data.scrollbarClass, data.scrollbarWidth, data.stageWidth, data.scrollbarStageWidth, data.scrollMargin, data.scrollBorder, data.originalOffsets, data.childrenOffsets, data.sliderNumber, data.infiniteSliderWidth, data.numberOfSlides, data.centeredSlideOffset, data.settings);				
				activeChildOffsets[data.sliderNumber] = slide;
			});			
		},		
		lock: function() {			
			return this.each(function() {			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
				touchLocks[data.sliderNumber] = true;			
			});			
		},		
		unlock: function() {		
			return this.each(function() {			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
				touchLocks[data.sliderNumber] = false;			
			});		
		},		
		getData: function() {		
			return this.each(function() {			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;				
				return data;			
			});			
		}		
		/*autoSlide: function(boolean) {			
			helpers.autoSlidePause(data.sliderNumber);		
		},		
		autoSlidePlay: function() {		
			helpers.autoSlide($(data.scrollerNode), $(data.slideNodes), slideTimeouts[data.sliderNumber], data.scrollbarClass, data.scrollbarWidth, data.stageWidth, data.scrollbarStageWidth, data.scrollMargin, data.scrollBorder, data.originalOffsets, data.childrenOffsets, data.sliderNumber, data.infiniteSliderWidth, data.numberOfSlides, data.centeredSlideOffset, data.settings);			
		}*/	
	}	
	/* public functions */
	$.fn.iosSlider = function(method) {
		if(methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('invalid method call!');
		}	
    };
}) (jQuery);