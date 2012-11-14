<?php
function loadrightsidetextblock($lang,$pageid,$blockid) {
	$rightsidetextblock="";
	
	$mysqli = new mysqli('localhost','factorin_erreeme','#erreeme!','factorin_erreeme');
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	
	$qryresult = $mysqli->prepare("SELECT `text` FROM `LANG_CONTENT` where lang=? and pageid=? and blockid=?");
	if(!$qryresult) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} else if(!$qryresult->bind_param("sss",$lang,$pageid,$blockid)) {
				echo "Binding parameters failed: (" . $qryresult->errno . ") " . $qryresult->error;
			} if(!$qryresult->bind_result($rightsidetextblock)) {
					echo "Binding results failed: (" . $qryresult->errno . ") " . $qryresult->error;
				}
	$qryresult->execute();
	$qryresult->store_result();
	//echo $qryresult->num_rows;
	
	if($qryresult->num_rows) {
		$qryresult->fetch();
		}

	$qryresult->close();
	
	return $rightsidetextblock;
}

function getcoleccao($id) { // Returns an mysqli_result object
	$elem = "";
	$path = "";
	$res = array();
	
	$mysqli = new mysqli('localhost','factorin_erreeme','#erreeme!','factorin_erreeme');
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	
	$qryresult = $mysqli->prepare("SELECT `elem`, `path` , `bannerslideshow` FROM `COLECCOES` where id=? ORDER BY `sequence`");
	if(!$qryresult) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} else if(!$qryresult->bind_param("s",$id)) {
				echo "Binding parameters failed: (" . $qryresult->errno . ") " . $qryresult->error;
			} if(!$qryresult->bind_result($elem,$path,$bannerslideshow)) {
					echo "Binding results failed: (" . $qryresult->errno . ") " . $qryresult->error;
				}
	$qryresult->execute();
	$qryresult->store_result();
	//echo $qryresult->num_rows;
	
	while($qryresult->fetch()) {
		$res[$elem] = array('path' => $path,
						'bannerslideshow' => $bannerslideshow
					  );
	}

	$qryresult->close();
	
	return $res;
}

function getslideshow($id) { // Returns an mysqli_result object
	$sequence = "";
	$path = "";
	$res = array();
	
	$mysqli = new mysqli('localhost','factorin_erreeme','#erreeme!','factorin_erreeme');
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	
	$qryresult = $mysqli->prepare("SELECT `sequence`, `path` FROM `BANNERSLIDESHOW` where groupid=? ORDER BY `sequence`");
	if(!$qryresult) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} else if(!$qryresult->bind_param("s",$id)) {
				echo "Binding parameters failed: (" . $qryresult->errno . ") " . $qryresult->error;
			} if(!$qryresult->bind_result($sequence,$path)) {
					echo "Binding results failed: (" . $qryresult->errno . ") " . $qryresult->error;
				}
	$qryresult->execute();
	$qryresult->store_result();
	//echo $qryresult->num_rows;
	
	while($qryresult->fetch()) {
		array_push($res,$path);
	}

	$qryresult->close();
	
	return $res;
}
?>