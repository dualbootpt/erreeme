$(document).ready(function(){
	$(".menu li a").mouseover(
		function() {
			$(this).css({'color':'#ffac7a'});
		}
	);
	$(".menu li a").mouseleave(
		function() {
			$(this).css({'color':'#978a7c'});
			$(".menu a.selected").css('color','#ffac7a');
		}
	);
	$(".menu li a").click(
		function(){
			//console.log($(this).parent().attr('id'));
			switch($(this).parent().attr('id')){
			case 'opthome':
				window.location.assign("erreeme.html");
			    return false;  // Prevent the browser from folowing the href link
				break;
			case 'optempresa':
				window.location.assign("erreeme.empresa.php?lang="+$(".mainframe").attr('lang'));
				return false;  // Prevent the browser from folowing the href link
				break;
			case 'optambientes':
				window.location.assign("erreeme.ambientes.php?lang="+$(".mainframe").attr('lang'));
				return false;  // Prevent the browser from folowing the href link
				break;
			case 'optcontactos':
				window.location.assign("erreeme.contactos.php?lang="+$(".mainframe").attr('lang'));
				return false;
				break;
			case 'optparcerias':
				window.location.assign("erreeme.parcerias.php?lang="+$(".mainframe").attr('lang'));
				return false;
				break;
			case 'optcoleccao':
				window.location.assign("erreeme.coleccao.php?lang="+$(".mainframe").attr('lang'));
				return false;
				break;
			case 'optnovidades':
				window.location.assign("erreeme.novidades.php?lang="+$(".mainframe").attr('lang'));
				return false;
				break;        
			}
		}
	);
	$(".language").click(
		function(){
			//console.log($(this).attr('id'));
			window.location.assign("erreeme.empresa.php?lang="+$(this).attr('id'));
		}
	);
	$(".amostras").mouseenter(
		function(){
			$(".amostraszoom").show();
			//console.log('Entrou');
		}
	);
	$(".amostras").mouseleave(
		function(){
			$(".amostraszoom").hide();
			//console.log('Saiu');
		}
	);	
	$(".amostras img").mouseenter(
		function(e){
			//console.log('entrou');
				cursor=getMousePosition(e);
				if($(this).attr('src') != $(".amostraszoom img").attr('src'))
					$(".amostraszoom img").attr('src',$(this).attr('src'));
				//console.log(cursor.x,' ; ',cursor.y);
				$(".amostraszoom").css('left',cursor.x-90);
				$(".amostraszoom").show();
				//console.log($(this).attr('src')+'('+cursor.x+','+cursor.y+')');
		}
	);
	$(".amostras img").click(
		function(e){
				cursor=getMousePosition(e);
				$(".amostraszoom img").attr('src',$(this).attr('src'));
				$(".amostraszoom").css('left',cursor.x-90);
				$(".amostraszoom").show();
				//console.log($(this).attr('src')+'('+cursor.x+','+cursor.y+')');
		}
	);	
	$(".amostras img").mouseleave(
		function(){
			//console.log('saiu');
			$(".amostraszoom").hide();
			entrou = false;
		}
	);
	$(".leftside #down").click(
		function(){
			//console.log($(".Vbanner img:visible").length);
			if($(".Vbanner img:visible").length > 5) {
				$(".Vbanner img:visible:first").toggle();
			}
			//console.log($(".Vbanner img:visible:first").attr('bannerslide'));
		}	
	);
	$(".leftside #up").click(
		function(){
			//console.log($(".Vbanner img:visible").length);
			$(".Vbanner img:not(':visible'):last").toggle();
			//console.log($(".Vbanner img:not(':visible'):last").attr('bannerslide'));
		}
	);
});