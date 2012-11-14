<?php
function loadmenu($lang) {
    require_once("dbconfig.php");

    $menu = array();

    $row = array(
        "option"=>"",
        "text"=>""
    );
	
  $dbConfig = getDbConfig("erreeme");
  
  $mysqli = new mysqli($dbConfig["url"],$dbConfig["username"],$dbConfig["pwd"],$dbConfig["dbname"]);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	
	$qrystringmenu = $mysqli->prepare("SELECT `option`, text FROM `LANG_MENU` where lang=? and menu='mainmenu'");
	if(!$qrystringmenu) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} else if(!$qrystringmenu->bind_param("s",$lang)) {
				echo "Binding parameters failed: (" . $qrystringmenu->errno . ") " . $qrystringmenu->error;
			} if(!$qrystringmenu->bind_result($row['option'], $row['text'])) {
					echo "Binding results failed: (" . $qrystringmenu->errno . ") " . $qrystringmenu->error;
				}
	$qrystringmenu->execute();
	$qrystringmenu->store_result();
	
	if($qrystringmenu->num_rows) {
		while( $qrystringmenu->fetch() ) {
			$menu[$row['option']] = $row['text'];
		}
	}
	
	$qrystringmenu->close();
	
	return $menu;
}
?>