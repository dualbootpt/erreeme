<?php
	// javascript header
	header('Content-type: text/javascript');
	// Date in the past
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	// always modified
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	// HTTP/1.1
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	
	//require("Template.class.php");
    require_once("utils.php");
	require_once("conteudo.php");
    
	$tpl = new Template("bannerslideshow.coleccao.js");
	$coleccao = getcoleccao('coleccao');
	
    if(editMode()){
        $tpl->EDITMODE = 'true';
    } else {
        $tpl->EDITMODE = 'false';
    }    
    
	foreach($coleccao as $elem => $row) {
		$bannerslideshow = getslideshow($row['bannerslideshow']);
		$banners = "";
		foreach($bannerslideshow as $slide) {
			$banners = $banners."{src:'".$slide['path']."', key:'".$slide['autoid']."'},";      
		}
		$tpl->BANNERS = $banners;
		$tpl->QUALIDADES = $row['bannerslideshow'];
		$tpl->block("BLOCK_BANNERSLIDESHOW");
	}	

	$tpl->show();
?>