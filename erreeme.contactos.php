<?php
    require_once("utils.php");
	require_once("menu.php");
	require_once("conteudo.php");

	$menu = loadmenu($_GET['lang']);
  
    $leftsidetextblock = loadtextblock($_GET['lang'],'contactos','LEFTSIDETEXTBLOCK');
    
	$tpl = new Template("erreeme.contactos.html");
	$tpl->LANGUAGE = $_GET['lang'];
	
    if(editMode()){
        if($leftsidetextblock["text"]==""){
            $leftsidetextblock["text"] = $leftsidetextblock["previewtext"];
        } else if($leftsidetextblock["previewtext"]=="") {
        $leftsidetextblock["previewtext"] = $leftsidetextblock["text"];
        }
    }
    
	if($_GET['preview'] != 'true'){
        $tpl->LEFTSIDETEXTBLOCK = $leftsidetextblock["text"];
    } else {
        $tpl->LEFTSIDETEXTBLOCK = $leftsidetextblock["previewtext"];
        }
  
    if($leftsidetextblock["previewtext"] != "") {
        $tpl->PREVIEWLEFTSIDETEXTBLOCK = $leftsidetextblock["previewtext"];  
    } else {
            $tpl->PREVIEWLEFTSIDETEXTBLOCK = $leftsidetextblock["text"];  
        }
    
    $registotextblock = loadtextblock($_GET['lang'],'contactos','REGISTO');        
        
    if(editMode()){
        if($registotextblock["text"]==""){
            $registotextblock["text"] = $registotextblock["previewtext"];
        } else if($registotextblock["previewtext"]=="") {
        $registotextblock["previewtext"] = $registotextblock["text"];
        }
    }
    
	if($_GET['preview'] != 'true'){
        $tpl->REGISTO = $registotextblock["text"];
    } else {
        $tpl->REGISTO = $registotextblock["previewtext"];
        }
  
    if($registotextblock["previewtext"] != "") {
        $tpl->PREVIEWREGISTO = $registotextblock["previewtext"];  
    } else {
            $tpl->PREVIEWREGISTO = $registotextblock["text"];  
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
                                    "<a class='editRightsidetextblock' pageid='contactos' value='edit'> edit |</a>".
                                    "<a class='editRightsidetextblock' pageid='contactos' value='save'> save |</a>".
                                    "<a class='editRightsidetextblock' pageid='contactos' value='cancel'> cancel </a>".
                              "</div>" ;
    };
    $tpl->TXTAUTOKEY = "key='".$leftsidetextblock["autoid"]."'";
    $tpl->REGAUTOKEY = "key='".$registo["autoid"]."'";
    $tpl->PREVIEWTXTAUTOKEY = "key='".$leftsidetextblock["autoid"]."'";
    $tpl->PREVIEWREGISTOAUTOKEY = "key='".$registo["autoid"]."'";
  } else {
        $tpl->EDITMODE = "";
        $tpl->INCLUDECSS = "";
        $tpl->EDITMODELINK = "";
        $tpl->TXTAUTOKEY = "";
        $tpl->REGAUTOKEY = "";
        $tpl->PREVIEWTXTAUTOKEY = "";
        $tpl->PREVIEWREGISTOAUTOKEY = "";
        };
        
	$tpl->show();
?>