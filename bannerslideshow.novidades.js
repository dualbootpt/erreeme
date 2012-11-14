$(document).ready(
	function() {
		var bannerslideshow = new Array();
		<!-- BEGIN BLOCK_BANNERSLIDESHOW -->
		bannerslideshow['{QUALIDADES}'] = [{BANNERS}];
		<!-- END BLOCK_BANNERSLIDESHOW -->
		
        var editmode={EDITMODE};
		var i=0;
		var quali = "";
		// Define the time interval between slide change - miliseconds
		var timer; // Will store the timeou object.
		var midpoint, bannerHeight, bannerWidth, arrowHeight, totalBanners, allWidth;

		positionVbannerButtons();
		$(window).bind('resize',positionVbannerButtons);
		bannerHeight=$(".bannerswindow").height();
		bannerWidth=$(".bannerswindow").width();
		rightArrowPos=bannerWidth-$(".arrows").width();
		arrowHeight=$(".arrows").height();
		midpoint=(bannerHeight-arrowHeight)/2;
		$(".arrows").css({'margin-top':midpoint});	
		$("#next_right").css('margin-left',rightArrowPos);
		
		$("#next_right").click(
			function(){
				i=(i+1)%bannerslideshow[quali].length;
				nextbanner(bannerslideshow[quali],i);
			}
		)
		$("#next_left").click(
			function() {
				i--;
				i = (i < 0) ? bannerslideshow[quali].length-1 : i;
				nextbanner(bannerslideshow[quali],i);
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
		$(".coleccao .qualidades img, .coleccao .leftside img").click(
			function(){
                quali = $(this).attr('bannerslide');
                if(quali=="edit"){
                    editmode = true;
                 } else {
                    mostraColeccao(editmode,quali,bannerslideshow,15000);
                    }
			}
		)		
	}
)

	function initslideshow(sel,slideshow,pos){
		$("#bannerslideshow").attr('len',slideshow.length);
		elem = document.getElementById(sel);
		if(elem) {
			elem.setAttribute("src",slideshow[pos].src);
            elem.setAttribute("key",slideshow[pos].key);
		}
	}
	function nextbanner(slideshow,pos) {
        if(slideshow.length > 1){
            $("#bannerslideshow").hide();
            $("#bannerslideshow").attr('src',slideshow[pos].src);
            $("#bannerslideshow").attr('key',slideshow[pos].key);
            $("#bannerslideshow").attr('pos',pos);
            $("#bannerslideshow").fadeIn(2000);
        }
	}
	function next() {
		$("#bannerslideshow").fadeOut(2000,function(){$("#next_right").trigger('click')});
	}
	function positionVbannerButtons(){
		var dist = ($(".Vbanner").offset()).left + $(".Vbanner").width()/2;
		$(".leftside #down, .leftside #up").css('left',dist);
	}
	function mostraColeccao(editmode,quali,slideshow,timeInterval){
		if(quali) {
			$(".coleccao .textblock").hide();
			$(".coleccao .qualidades").hide();
			$(".coleccao .rightside").hide();
			$(".coleccao .leftside").css('display','inline-block');
            $(".coleccao .rightside2").css('display','inline-block');
			$(".coleccao .bannerswindow").css('display','inline-block');
			$(".coleccao .leftside img").css('opacity','1');
			$(".coleccao .Vbanner img").filter(function(index){return $(this).attr("bannerslide")==quali;}).css('opacity','.5');
			positionVbannerButtons();
            $('#bannerslideshow').attr('bannerslide',quali);
            if(slideshow[quali].length > 0){
                initslideshow("bannerslideshow",slideshow[quali],0);
            }
			if(!editmode && slideshow[quali].length > 1 && timeInterval != 0) {
				timer = window.setInterval(next,timeInterval);
			}			
		}
	}	