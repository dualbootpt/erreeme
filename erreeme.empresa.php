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
	$rightsidetextblock = loadrightsidetextblock($_GET['lang'],'empresa','RIGHTSIDETEXTBLOCK');
	
	$tpl = new Template("erreeme.empresa.html");
	$tpl->LANGUAGE = $_GET['lang'];
//	$tpl->RIGHTSIDETEXTBLOCK = "Exclusivamente dedicada &agrave cria&ccedil&atildeo, fabrico e comercializa&ccedil&atildeo, nacional e internacional, de tapetes artesanais, a <erreeme>Erreeme Tape&ccedilarias</erreeme> foi criada em 1988. Projetada para clientes exigentes e ambientes exclusivos, a <erreeme>Erreeme Tape&ccedilarias</erreeme> oferece uma gama de tapetes &uacutenicos que conjugam o design inovador e a excelente qualidade,	evidenciando-se a originalidade e a constante actualiza&ccedil&atildeo das tendencias. <p> A <erreeme>Erreeme Tape&ccedilarias</erreeme> afirma-se como uma empresa de ineg&aacutevel dinamismo, criadora de tapetes simultaneamente contemporâneos e intemporais, repletos de personalidade e sedu&ccedil&atildeo.	<p> Utilizamos os melhores materiais, como: seda, mohair, linho e l&atilde, para proporcionar o m&aacuteximo de bem-estar e conforto. A nossa produ&ccedil&atildeo obedece a um rigoroso controlo de todo o processo de fabrico e permite executar tapetes com diversas caracter&iacutesticas: <dl> - Diferentes densidades, texturas e <i>design</i> personalizado; <dl> - Tamanhos e formas &aacute medida; <dl> - Cores exclusivas e especiais; <dl> - Prazos de execu&ccedil&atildeo 3 a 4 semanas";
	
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