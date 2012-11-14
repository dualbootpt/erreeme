<?php
//session_set_cookie_params(time()+600);
session_id('editmodeid');
session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pt-PT">
<head>
	<title>erreeme</title>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
	<meta http-equiv="Content-Style-Type" CONTENT="text/css">
	<meta http-equiv="Content-Script-Type" CONTENT="text/javascript">
	<meta name="keywords" content="erreeme, tapetes, tapeçarias, rugs, custom rugs">
	<meta name="robots" content="all">
	<link rel="shortcut icon" href="img/logos/erreeme.ico" type="image/x-icon">
	<!-- IMPORT STYLESHEETS																 -->
	<!-- media="all,print,handheld"                                                      -->
	<link rel="stylesheet" type="text/css" media="all" href="erreeme.css">
	<link rel="stylesheet" type="text/css" media="all" href="menu.css">
    <?php
        if($_SESSION[edit]=="true") {
            echo '<link rel="stylesheet" type="text/css" media="all" href="editmode.css">';
        }
    ?>
	<!-- IMPORT JAVASCRIPT																 -->
	<script src="jquery-1.7.1.min.js"></script>
	<!-- <script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script> -->
	<script src="menu.js"></script>
	<script src="editmode.js"></script>
	<!-- Google Chrome Applications TAB Specific                                          -->
	<!-- This group of meta-tags defines the way shortcuts for the URL are Named          -->
	<meta name="application-name" content="ERRE & EME">
	<meta name="description" content="Criação, fabrico e comercialização, nacional e internacional, de tapetes artesanais, a Erreeme Tapeçarias foi criada em 1988.">
	<link rel="icon" href="img/logos/erreeme32x32.png" sizes="32x32">
	<!-- application-url defines the URL that is opened when the link/shortcut is pressed -->
	<!-- <meta name="application-url" content="http://www.erreeme.com.pt"/>               -->
	<!--     END of Shortcut Definition                                                   -->
  
  <!-- Google Analytics -->
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30722745-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  </script>
  
</head>
<body>
<div class="mainframe"> <!-- BEGIN class="main>" -->
	<div class="center main">
        <h1>Erreeme, Custom Rugs</h1>        
		<div class="centerbody">
			<div class="languageselect">
				<img class="logo" alt="logotipo erreeme" src="img/logos/rm_logo_neg_escuro.png"/>
				<div class="lista">
                    <?php
                        echo 'editMode() = '.$_SESSION['edit'];
                    ?>
                    <form name="login">
                        user: <input id="user" name="user" type="text" value=""/> <br/>
                        pwd:<input id="pwd" name="pwd" type="password" value=""/> <br/>
                        <a id="login">login</a>
                        <div class="chgpwd">
                            new:<input id="npwd1" name="pwd" type="password" value=""/> <br/>
                            repita a nova pwd <br>
                            new:<input id="npwd2" name="pwd" type="password" value=""/> <br/>
                            <a id="newpwd">mudar pwd</a>                            
                            <br>
                            <a id="logout">logout</a>                            
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>