<?php
	// http://www.raelcunha.com/template.php
	require("Template.class.php");
	require("menu.php");
	require("conteudo.php");

	$menu = loadmenu($_GET['lang']);
	$rightsidetextblock = loadrightsidetextblock($_GET['lang'],'novidades','RIGHTSIDETEXTBLOCK');
	$coleccao = getcoleccao('novidades');
	
	$tpl = new Template("erreeme.novidades.html");
	foreach($coleccao as $elem => $row) {
		$tpl->ELEM = $elem;
		$tpl->PATH = $row['path'];
		$tpl->block("BLOCK_COLECCAOVBANNER");
		$tpl->block("BLOCK_COLECCAOQUALID");
	}	
	$tpl->LANGUAGE = $_GET['lang'];
	//$tpl->RIGHTSIDETEXTBLOCK = "Os nossos padr&otildees de qualidade, resultam da utiliza&ccedil&atildeo dos melhores materiais como,	seda, mohair, linho e l&atilde, na produ&ccedil&atildeo dos nossos tapetes. O conforto, a inova&ccedil&atildeo e a supera&ccedil&atildeo, s&atildeo fatores decisivos na nossa atua&ccedil&atildeo.";
	
	$tpl->RIGHTSIDETEXTBLOCK = $rightsidetextblock;
	
	$tpl->LINGUA = $menu["LINGUA"];
	$tpl->EMPRESA = $menu["EMPRESA"];
	$tpl->COLECCAO = $menu["COLECCAO"];
	$tpl->AMBIENTES = $menu["AMBIENTES"];
	$tpl->CONTACTOS = $menu["CONTACTOS"];
	$tpl->NOVIDADES = $menu["NOVIDADES"];  
	$tpl->PARCERIAS = $menu["PARCERIAS"];
	
	$tpl->show();
?>