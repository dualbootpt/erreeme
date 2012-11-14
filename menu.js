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
			window.location.assign("erreeme.empresa.php?lang="+$(this).attr('id'));
		}
	);
	$(".leftside #down").click(
		function(){
			if($(".Vbanner img:visible").length > 5) {
				$(".Vbanner img:visible:first").toggle();
			}
		}	
	);
	$(".leftside #up").click(
		function(){
			$(".Vbanner img:not(':visible'):last").toggle();
		}
	);
  $('.editmode').click(
        function() {
            $('.preview').hide();
            $('.texteditor').show();
        }
    );
});