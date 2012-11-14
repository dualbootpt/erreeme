<?php
    require_once("utils.php");
	require_once("menu.php");
	require_once("conteudo.php");

	$menu = loadmenu($_GET['lang']);
  
    $topblocktextblock = loadtextblock($_GET['lang'],'parcerias','TOPBLOCKTEXTBLOCK');
    
	$tpl = new Template("erreeme.parcerias.html");
	$tpl->LANGUAGE = $_GET['lang'];
	
    if(editMode()){
        if($topblocktextblock["text"]==""){
            $topblocktextblock["text"] = $topblocktextblock["previewtext"];
        } else if($topblocktextblock["previewtext"]=="") {
        $topblocktextblock["previewtext"] = $topblocktextblock["text"];
        }
    }
    
	if($_GET['preview'] != 'true'){
        $tpl->TOPBLOCKTEXTBLOCK = $topblocktextblock["text"];
    } else {
        $tpl->TOPBLOCKTEXTBLOCK = $topblocktextblock["previewtext"];
        }
  
    if($topblocktextblock["previewtext"] != "") {
        $tpl->PREVIEWTOPBLOCKTEXTBLOCK = $topblocktextblock["previewtext"];  
    } else {
            $tpl->PREVIEWTOPBLOCKTEXTBLOCK = $topblocktextblock["text"];  
        }
	
	$tpl->TOPBLOCKTEXTBLOCK = $topblocktextblock["text"];
  
	$tpl->PREVIEWTOPBLOCKTEXTBLOCK = $topblocktextblock["previewtext"];  
	
	$tpl->LINGUA = $menu["LINGUA"];
	$tpl->EMPRESA = $menu["EMPRESA"];
	$tpl->COLECCAO = $menu["COLECCAO"];
	$tpl->AMBIENTES = $menu["AMBIENTES"];
	$tpl->CONTACTOS = $menu["CONTACTOS"];
	$tpl->NOVIDADES = $menu["NOVIDADES"];   
	$tpl->PARCERIAS = $menu["PARCERIAS"];
	
  if( editMode() ) {
    $tpl->EDITMODE = "preview";
    $tpl->INCLUDECSS = "<link rel='stylesheet' type='text/css' media='all' href='editmode.css'/>";
    if( $_GET['preview'] <> 'true' ) {
      $tpl->EDITMODELINK =  "<div class='editmode'><a>edit</a></div>" ;
    } else {
        $tpl->EDITMODELINK =  "<div>".
                                    "<a class='editRightsidetextblock' pageid='parcerias' value='edit'> edit |</a>".
                                    "<a class='editRightsidetextblock' pageid='parcerias' value='save'> save |</a>".
                                    "<a class='editRightsidetextblock' pageid='parcerias' value='cancel'> cancel </a>".
                              "</div>" ;
    }
    $tpl->AUTOKEY = "key='".$topblocktextblock["autoid"]."'";
    $tpl->PREVIEWAUTOKEY = "key='".$topblocktextblock["autoid"]."'";
  } else {
        $tpl->EDITMODE ="";
        $tpl->INCLUDECSS = "";
        $tpl->EDITMODELINK = "";
        $tpl->AUTOKEY = "";
        }
  
	$tpl->show();
?>