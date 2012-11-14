<?php
  if(isset($_COOKIE['adminMode']) && $_COOKIE['adminMode'] == 'true') {
    $adminMode = true;
   } else {
        if(isset($_POST['username']) && isset($_POST['pwd']) && authUser($_POST['username'], $_POST['pwd'])) {
        setcookie('adminMode','true');
        $adminMode = true;

        var_dump($_POST);
        echo '<br/>';
        var_dump($_COOKIE);

        } else {
          $adminMode = false;
          }
      };
      
  function authUser($username, $pwd) {
    if($username == "" || $pwd == "") {
      return false;
    } else {
        return true; // Dummy function
      }
  }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pt-PT">
<head>
	<title>erreeme - admin page login</title>
</head>
<body>
  <?php
    //set_include_path(get_include_path() . PATH_SEPARATOR . "/home/factorin/public_html/erreeme");
    if(!$adminMode) {
      include("auth.tpl");
      } else include("logout.html");
  ?>
</body>  