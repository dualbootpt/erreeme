<?php
	// http://www.raelcunha.com/template.php
	require("Template.class.php");
	require("menu.php");
	require("conteudo.php");
	
	// $menu = array(
	// "LINGUA" => "LINGUA",
	// "EMPRESA" => "EMPRESA",
	// "COLECCAO" => "COLEC&Ccedil&AtildeO",
	// "AMBIENTES" => "AMBIENTES",
	// "CONTACTOS" => "CONTACTOS",
	// "PARCERIAS" => "PARCERIAS"
	// );
	

	$menu = loadmenu($_GET['lang']);
	$rightsidetextblock = loadrightsidetextblock($_GET['lang'],'ambientes','RIGHTSIDETEXTBLOCK');
	
	$tpl = new Template("erreeme.ambientes.html");
	$tpl->LANGUAGE = $_GET['lang'];
	//$tpl->RIGHTSIDETEXTBLOCK = "H&aacute texturas que fazem os ambientes falar por si. Os nossos tapetes s&atildeo exemplo disso.";
	
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