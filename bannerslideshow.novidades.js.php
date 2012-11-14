<?php
	require("Template.class.php");
	require("conteudo.php");

	$tpl = new Template("bannerslideshow.novidades.js");
	$coleccao = getcoleccao('novidades');
	
	foreach($coleccao as $elem => $row) {
		$bannerslideshow = getslideshow($row['bannerslideshow']);
		//$tpl->BANNERS = "'img/coleccao/Chic_compo_72.jpg','img/coleccao/Mood mix_compo_72.jpg'";
		$banners = "";
		foreach($bannerslideshow as $path) {
			$banners = $banners."'".$path."',";
		}
		$tpl->BANNERS = $banners;
		$tpl->QUALIDADES = $elem;
		$tpl->block("BLOCK_BANNERSLIDESHOW");
	}	
	
	// javascript header
	header('Content-type: text/javascript');
	// Date in the past
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	// always modified
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	// HTTP/1.1
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	
	$tpl->show();
?>