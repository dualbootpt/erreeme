<?php
require_once("dbconfig.php");

function loadtextblock($lang,$pageid,$blockid,$preview = false) {
  $dbConfig = getDbConfig("erreeme");
  
  $db = new PDO('mysql:host='.$dbConfig["url"].';dbname='.$dbConfig["dbname"].';charset=UTF-8', $dbConfig["username"], $dbConfig["pwd"]);
  
  $content = new LangContentModel();
  $content->setLang($lang);
  $content->setPageid($pageid);
  $content->setBlockid($blockid);
  $resultArray = $content->findByExample($db, $content);
  
  if(count($resultArray)){
    $rightsidetextblock = array();
    $rightsidetextblock['previewtext'] = trim(base64_decode($resultArray[0]->getPreviewtext()));
    $rightsidetextblock['autoid'] = $resultArray[0]->getAutoid();
    $rightsidetextblock["text"] = trim(base64_decode($resultArray[0]->getText()));
  } else {
      $rightsidetextblock = array(  'previewtext' => '',
                                    'text' => '',
                                    'autoid' => 0);
  }
  return $rightsidetextblock;
}

function getcoleccao($id) {
  $dbConfig = getDbConfig("erreeme");
  
  $db = new PDO('mysql:host='.$dbConfig["url"].';dbname='.$dbConfig["dbname"].';charset=UTF-8', $dbConfig["username"], $dbConfig["pwd"]);
  
  $coleccao = new ColeccoesModel();
  $coleccao->setId($id);
  $resultArray = $coleccao->findByExample($db, $coleccao, true, array('sequence'));
  
  $res = array();
  foreach ($resultArray as $value) {
      $res[$value->getElem()] = $value->toHash();
  }
  
  return $res;
}

function getslideshow($id) { // Returns an mysqli_result object
  $dbConfig = getDbConfig("erreeme");
  
  $db = new PDO('mysql:host='.$dbConfig["url"].';dbname='.$dbConfig["dbname"].';charset=UTF-8', $dbConfig["username"], $dbConfig["pwd"]);
  
  $slideshow = new BannerslideshowModel();
  $slideshow->setGroupid($id);
  $resultArray = $slideshow->findByExample($db, $slideshow, true, array('sequence'));
  
  $res = array();
  foreach ($resultArray as $value) {
      $res[] = $value->toHash();
  }
  
  return $res;
}
?>