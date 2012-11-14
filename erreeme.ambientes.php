<?php
  require_once("utils.php");
	require_once("menu.php");
	require_once("conteudo.php");

	$menu = loadmenu($_GET['lang']);
  
    $rightsidetextblock = loadtextblock($_GET['lang'],'ambientes','RIGHTSIDETEXTBLOCK');
    
	$tpl = new Template("erreeme.ambientes.html");
	$tpl->LANGUAGE = $_GET['lang'];
	
    if(editMode()){
        if($rightsidetextblock["text"]==""){
            $rightsidetextblock["text"] = $rightsidetextblock["previewtext"];
        } else if($rightsidetextblock["previewtext"]=="") {
        $rightsidetextblock["previewtext"] = $rightsidetextblock["text"];
        }
    }
    
	if($_GET['preview'] != 'true'){
        $tpl->RIGHTSIDETEXTBLOCK = $rightsidetextblock["text"];
    } else {
        $tpl->RIGHTSIDETEXTBLOCK = $rightsidetextblock["previewtext"];
        }
  
    if($rightsidetextblock["previewtext"] != "") {
        $tpl->PREVIEWRIGHTSIDETEXTBLOCK = $rightsidetextblock["previewtext"];  
    } else {
            $tpl->PREVIEWRIGHTSIDETEXTBLOCK = $rightsidetextblock["text"];  
        } 
	
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
                                    "<a class='editRightsidetextblock' pageid='ambientes' value='edit'> edit |</a>".
                                    "<a class='editRightsidetextblock' pageid='ambientes' value='save'> save |</a>".
                                    "<a class='editRightsidetextblock' pageid='ambientes' value='cancel'> cancel </a>".
                              "</div>" ;
    }
    $tpl->AUTOKEY = "key='".$rightsidetextblock["autoid"]."'";
    $tpl->PREVIEWAUTOKEY = "key='".$rightsidetextblock["autoid"]."'";
  } else {
        $tpl->EDITMODE ="";
        $tpl->INCLUDECSS = "";
        $tpl->EDITMODELINK = "";
        $tpl->AUTOKEY = "";
        }
  
	$tpl->show();
?>