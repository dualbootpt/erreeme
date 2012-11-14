<?php
session_id('editmodeid');
session_start();

require_once("dbconfig.php");

spl_autoload_register('myAutoloader');

function myAutoloader($classname){
    if(file_exists($filename = 'model/'.$classname.'.class.php')){
        require_once $filename;
    } else if(file_exists($filename = 'model/'.$classname.'.php')){
        require_once $filename;
    } else if(file_exists($filename = $classname.'.class.php')){
        require_once $filename;
    } else if(file_exists($filename = $classname.'.php')){
        require_once $filename;
    }
}
/*
Indica se o site está em modo de edicao.
Retuns TRUE or FALSE
*/
function editMode() {
    if($_SESSION['edit'] == 'true'){
        return(true);
    } else {
        return(false);  
    }
}

function authUser($username, $pwd) {
    $dbConfig = getDbConfig("erreeme");
  
    $db = new PDO('mysql:host='.$dbConfig["url"].';dbname='.$dbConfig["dbname"].';charset=UTF-8', $dbConfig["username"], $dbConfig["pwd"]);    
    $auth = new AuthModel();
    $auth->setUser($username);
    $auth->setPwd($pwd);
    if(!$auth->existsInDatabase($db)) {
        $_SESSION['edit'] = 'false';
        return false;
    } else {
        $_SESSION['edit'] = 'true';
        return true;
        }
}

function changepwd($username, $npwd){
    $dbConfig = getDbConfig("erreeme");
  
    $db = new PDO('mysql:host='.$dbConfig["url"].';dbname='.$dbConfig["dbname"].';charset=UTF-8', $dbConfig["username"], $dbConfig["pwd"]);    
    $auth = new AuthModel();
    $auth->setUser($username);
    $auth->setPwd($npwd);
    $auth->updateInsertToDatabase($db);
    return true;
}
?>