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
	$leftsidetextblock = loadrightsidetextblock($_GET['lang'],'contactos','LEFTSIDETEXTBLOCK');
	$registo = loadrightsidetextblock($_GET['lang'],'contactos','REGISTO');
	
	$tpl = new Template("erreeme.contactos.html");
	$tpl->LANGUAGE = $_GET['lang'];
	//$tpl->LEFTSIDETEXTBLOCK = "Estamos perto de si. Para saber onde nos encontrar por favor envie-nos uma <a href=\"mailto:geral@erreeme.pt\">mensagem</a>. <p> Email: <a href=\"mailto://geral@erreeme.pt\">geral@erreeme.pt</a> <p> Rua Sargento Silva, 241 S. F&eacutelix da Marinha <p>	4410-103 Vila Nova de Gaia <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> Coordenadas GPS: 41 1 6.91 N 8 38 15.15 O";
	//$tpl->REGISTO = "Registe-se para receber a nossa newsletter.";
	
	$tpl->LEFTSIDETEXTBLOCK = $leftsidetextblock;
	$tpl->REGISTO = $registo;
	
	$tpl->LINGUA = $menu["LINGUA"];
	$tpl->EMPRESA = $menu["EMPRESA"];
	$tpl->COLECCAO = $menu["COLECCAO"];
	$tpl->AMBIENTES = $menu["AMBIENTES"];
	$tpl->CONTACTOS = $menu["CONTACTOS"];
	$tpl->NOVIDADES = $menu["NOVIDADES"];   
	$tpl->PARCERIAS = $menu["PARCERIAS"];
	
	$tpl->show();
?>