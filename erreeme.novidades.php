<?php
    require_once("utils.php");
	require_once("menu.php");
	require_once("conteudo.php");

	$menu = loadmenu($_GET['lang']);
  
    $rightsidetextblock = loadtextblock($_GET['lang'],'novidades','RIGHTSIDETEXTBLOCK');
    
	$tpl = new Template("erreeme.novidades.html");
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
	$coleccao = getcoleccao('novidades');
	
	$tpl = new Template("erreeme.novidades.html");
  
  if( editMode() ) {
    $tpl->BANNERSLIDESHOW = "edit";
    $tpl->PATH = "img/coleccao/EDIT.png";
    $tpl->KEY = "edit";
    $tpl->CSSID = "id='insertColeccao'";
    // Don't display the EDIT option on the vertical banner.
    //$tpl->block("BLOCK_COLECCAOVBANNER"); 
    $tpl->block("BLOCK_COLECCAOQUALID");
  }
	foreach($coleccao as $elem => $row) {
        $tpl->BANNERSLIDESHOW = $row['bannerslideshow'];
		$tpl->PATH = $row['path'];
        $tpl->KEY = $row['autoid'];
		$tpl->block("BLOCK_COLECCAOVBANNER");
		$tpl->block("BLOCK_COLECCAOQUALID");
	}	
	$tpl->LANGUAGE = $_GET['lang'];
	
	$tpl->RIGHTSIDETEXTBLOCK = $rightsidetextblock["text"];
  
	$tpl->PREVIEWRIGHTSIDETEXTBLOCK = $rightsidetextblock["previewtext"];
	
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
                                    "<a class='editRightsidetextblock' pageid='novidades' value='edit'> edit |</a>".
                                    "<a class='editRightsidetextblock' pageid='novidades' value='save'> save |</a>".
                                    "<a class='editRightsidetextblock' pageid='novidades' value='cancel'> cancel </a>".
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