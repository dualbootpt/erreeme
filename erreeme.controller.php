<?php
  session_id('editmodeid');
  session_start();
  
  require_once("dbconfig.php");
  require_once 'utils.php';
  
  $dbConfig = getDbConfig("erreeme");
    
  $db = new PDO('mysql:host='.$dbConfig["url"].';dbname='.$dbConfig["dbname"].';charset=UTF-8', $dbConfig["username"], $dbConfig["pwd"]);
  switch($_POST["op"]) {
    case "preview" :
        updatePreviewtext($db, $_POST["record"], $_POST["record"]["key"]);
    break;
    case "save" :
        saveContent($db, $_POST["record"], $_POST["record"]["key"]);
    break;
    case "reset" :
        deletePreviewtext($db, $_POST["record"]["key"]);
    break;
    case "insertSlide" :
        insertSlide($db, $_POST["record"]);
    break;
    case "removeSlide" :
        removeSlide($db, $_POST["record"]["key"]);
    break;
    case "removeColeccao" :
        removeColeccao($db, $_POST["record"]["key"]);
    break;
    case "insertColeccao" :
        insertColeccao($db, $_POST["record"]);
    break;
    case "logout" :
        logout();
    break;
    case "login" :
        login($_POST["record"]['user'], $_POST["record"]['pwd']);
    break;
    case "newpwd" :
        newpwd($_POST["record"]['user'], $_POST["record"]['pwd'], $_POST["record"]['npwd1']);
    break;
  }

  function newpwd($username, $pwd, $npwd) {
    if(authUser($username, md5($pwd))){
        $res = changepwd($username, md5($npwd));
        echo json_encode($res);
    } else {
        echo json_encode('false');
    }
}  
    
  function login($username, $pwd) {
    $res=authUser($username, md5($pwd));
    echo json_encode($res);
}  
  
function logout() {
    session_destroy();
}  
  
  /**
   *
   * @param type $db PDO database handler
   * @param type $record data Record
   */
function insertColeccao($db, $record){
    $coleccao = new ColeccoesModel();
    $coleccao->setBannerslideshow('Qualidade'.$record['groupid']);
    $coleccao->setElem($record['groupid']);
    $coleccao->setId($record['pageid']);
    $coleccao->setSequence(500);
    $coleccao->setPath($record['src']);
    $coleccao->insertIntoDatabase($db);
}
  /**
   *
   * @param type $db PDO database handler
   * @param type $key Record key
   */
function removeColeccao($db, $key){
    $coleccao = new ColeccoesModel();
    $coleccao->setAutoid($key);
    $coleccao->deleteFromDatabase($db);
}  
  
  /**
   *
   * @param type $db PDO database handler
   * @param type $record Array with data
   */
function insertSlide($db, $record){
    $slideshow = new BannerslideshowModel();
    $slideshow->setSequence(100);
    $slideshow->setGroupid($record["groupid"]);
    $slideshow->setPath($record["src"]);
    echo $slideshow->insertIntoDatabase($db);
}

function removeSlide($db, $key){
    $slideshow = new BannerslideshowModel();
    $slideshow->setAutoid($key);
    echo $slideshow->deleteFromDatabase($db);
}

function updatePreviewtext($db, $record, $key){
    $content = new LangContentModel();
    $content->setAutoid($key);
    $content->setText(base64_encode(""));
    $content->setPreviewtext(base64_encode($record['text']));
    $content->setBlockid($record['blockid']);
    $content->setPageid($record['pageid']);
    $content->setLang($record['lang']);  
    if($content->existsInDatabase($db)){
        $content->updateToDatabase($db);
    } else {
            $content->setAutoid(null);
            $content->insertIntoDatabase($db);
        }
  }
  
function deletePreviewtext($db, $key){
    $content = new LangContentModel();
    $result = $content->findById($db, $key);
    $result->setPreviewtext("");
    $result->updateToDatabase($db);
  }
  
function saveContent($db, $record, $key){
    $content = new LangContentModel();
    $content->setAutoid($key);
    $content->setText(base64_encode($record['text']));
    $content->setPreviewtext(base64_encode($record['text']));
    $content->setBlockid($record['blockid']);
    $content->setPageid($record['pageid']);
    $content->setLang($record['lang']);
    if($content->existsInDatabase($db)){
        $content->updateToDatabase($db);
    } else {
            $content->setAutoid(null);
            $content->insertIntoDatabase($db);
        }
  }
?>