$(document).ready(
	function() {
		var bannerslideshow=["img/frontpage/TapeteXI.jpg",
							 "img/frontpage/TapeteIV.jpg",
							 "img/frontpage/TapeteVIII.jpg"
							];
		var i=0;
		var midpoint, bannerHeight, bannerWidth, arrowHeight, totalBanners, allWidth;
	
		initslideshow("bannerslideshow",bannerslideshow,0);
	
		bannerHeight=$("#bannerslideshow").height();
		bannerWidth=$("#bannerslideshow").width();
		rightArrowPos=bannerWidth-$(".arrows").width();
		arrowHeight=$(".arrows").height();
		midpoint=(bannerHeight-arrowHeight)/2;
		$(".arrows").css({'margin-top':midpoint});	
		$("#next_right").css('margin-left',rightArrowPos);
	
		$("#next_left").click(
			function(){
				i=(i+1)%bannerslideshow.length;
				nextbanner(bannerslideshow,i);
			}
		)
		
		$("#next_right").click(
			function() {
				i--;
				i = (i < 0) ? bannerslideshow.length-1 : i;
				nextbanner(bannerslideshow,i);
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
	}
)

	function initslideshow(sel,slideshow,pos){
		url = slideshow[pos];
		//alert(typeof(sel)+' - '+sel+'\' - '+url);
		elem = document.getElementById(sel);
		if(elem) {
			elem.src=url;
		}
		return(url);
	}

	function nextbanner(slideshow,pos) {
		url = slideshow[pos];
		$("#bannerslideshow").attr('src',url);
	}