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
	$topblocktextblock = loadrightsidetextblock($_GET['lang'],'parcerias','TOPBLOCKTEXTBLOCK');
	
	$tpl = new Template("erreeme.parcerias.html");
	$tpl->LANGUAGE = $_GET['lang'];
	//$tpl->TOPBLOCKTEXTBLOCK = "Estamos constantemente &agrave procura de novos parceiros de neg&oacutecio, para continuar a levar aos nossos clientes um servi&ccedilo completo e de qualidade. <p> Se estiver interessado em colaborar connosco, por favor <a href=\"mailto:geral@erreeme.pt\">contacte-nos</a>.";
	
	$tpl->TOPBLOCKTEXTBLOCK = $topblocktextblock;
	
	$tpl->LINGUA = $menu["LINGUA"];
	$tpl->EMPRESA = $menu["EMPRESA"];
	$tpl->COLECCAO = $menu["COLECCAO"];
	$tpl->AMBIENTES = $menu["AMBIENTES"];
	$tpl->CONTACTOS = $menu["CONTACTOS"];
	$tpl->NOVIDADES = $menu["NOVIDADES"];   
	$tpl->PARCERIAS = $menu["PARCERIAS"];
	
	$tpl->show();
?>