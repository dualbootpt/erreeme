$(document).ready(
	function() {
		var bannerslideshow = new Array();
		bannerslideshow['{ID}']=[
		<!-- BEGIN BLOCK_SLIDES -->
		"{PATH}",
		<!-- END BLOCK_SLIDES -->
		];
		
		//"img/ambientes/TapeteVI.jpg",
		//"img/ambientes/TapeteVII.jpg",
		//"img/ambientes/TapeteVIII.jpg"
		
		var i=0;
		// Define the time interval between slide change - miliseconds
		var timeInterval = 15000;
		var timer; // Will store the timeou object.
		var midpoint, bannerHeight, bannerWidth, arrowHeight, totalBanners, allWidth;
	
		initslideshow("bannerslideshow",bannerslideshow['{ID}'],0);
	
		bannerHeight=$(".bannerswindow").height();
		bannerWidth=$(".bannerswindow").width();
		rightArrowPos=bannerWidth-$(".arrows").width();
		arrowHeight=$(".arrows").height();
		midpoint=(bannerHeight-arrowHeight)/2;
		$(".arrows").css({'margin-top':midpoint});	
		$("#next_right").css('margin-left',rightArrowPos);
		
		if(bannerslideshow['{ID}'].length > 1) {	
			timer = window.setInterval(next,timeInterval);
			//clearInterval(timer);
		}
		
		$("#next_right").click(
			function(){
				i=(i+1)%bannerslideshow['{ID}'].length;
				nextbanner(bannerslideshow['{ID}'],i);
			}
		)
		
		$("#next_left").click(
			function() {
				i--;
				i = (i < 0) ? bannerslideshow['{ID}'].length-1 : i;
				nextbanner(bannerslideshow['{ID}'],i);
			}
		)
		
		$(".arrows").mouseover(
			function(){
				$(this).css({'opacity':'1'});
			}
		)
		$(".arrows").mouseleave(
			function(){
				$(this).css({'opacity':'.5'});
			}
		)
		$("#bannerslideshow").click(
			function(){
				clearInterval(timer);
			}
		)
		$("#selzoom").click(
		function(){
			initslideshow("imgzoom",bannerslideshow['{ID}'],i);
			$(".topblock").toggle();
			$(".header").toggle();
			$(".zoom").toggle();
		}
		)
		$(".zoom").click(
			function(){
				$(".topblock").toggle();
				$(".header").toggle();
				$(".zoom").toggle();
			}
		)
	}
)

	function initslideshow(sel,slideshow,pos){
		url = slideshow[pos];
		//console.log(typeof(sel)+' - '+sel+'\' - '+url);
		$("#bannerslideshow").attr('len',slideshow.length);
		elem = document.getElementById(sel);
		if(elem) {
			elem.src=url;
		}
		return(url);
	}

	function nextbanner(slideshow,pos) {
		//console.log('--> ',pos);
		$("#bannerslideshow").hide();
		$("#bannerslideshow").attr('src',slideshow[pos]);

		$("#bannerslideshow").attr('pos',pos);
		$("#bannerslideshow").fadeIn(2000);
	}
	function next() {
		//console.log('pos: ',$('#bannerslideshow').attr('pos'));
		//console.log('len: ',$('#bannerslideshow').attr('len'));
		$("#bannerslideshow").fadeOut(2000,function(){$("#next_right").trigger('click')});
		//$("#next_right").trigger('click');
	}