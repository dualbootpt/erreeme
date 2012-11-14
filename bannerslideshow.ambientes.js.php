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
  require_once("utils.php");
	require_once("conteudo.php");

	$tpl = new Template("bannerslideshow.ambientes.js");
	$slideshow = getslideshow("ambientes");
	
    if(editMode()){
        $tpl->EDITMODE = 'true';
    } else {
        $tpl->EDITMODE = 'false';
    }    
    
	$tpl->ID = "ambientes";
	
	foreach($slideshow as $slide) {
		$tpl->PATH = $slide['path'];
        $tpl->DBKEY = $slide["autoid"];    
		$tpl->block("BLOCK_SLIDES");
	}
	
	$tpl->show();
?>