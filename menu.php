<?php
function loadmenu($lang) {
	$menu = array();

	$row = array(
		"option"=>"",
		"text"=>""
	);
	
	$mysqli = new mysqli('localhost','factorin_erreeme','#erreeme!','factorin_erreeme');
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
	//echo $qrystringmenu->num_rows;
	
	if($qrystringmenu->num_rows) {
		while( $qrystringmenu->fetch() ) {
			$menu[$row['option']] = $row['text'];
		}
	}
	
	$qrystringmenu->close();
	
	return $menu;
}
?>