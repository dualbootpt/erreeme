<?php
  function httpPostRequest($url,$params) {
    $data = http_build_query($params); // Similar to urlencode()
    $httpOptions = array(
                      "method" => "POST",
                      "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                      "content" => $data
                   );
    $options = array(
                  "http" => $httpOptions
               );
    $ctxStream  = stream_context_create($options);
    $fp = fopen($url,'r',false,$ctxStream); // Contexts allow using fopen & fread on http and other kinds of streams.
    
    //fpassthru($fp); // Reads file until the EOF and ECHOes averything
    
    $response = stream_get_contents($fp); // Reads the stream into a STRING
    fclose($fp);  
    return $response;
  }

  function getDbConfig($dbname) {
    $params = array(
                  "dbname" => $dbname
              );
    //$resultStr = httpPostRequest('http://erreeme.dualboot.pt/dbaccess.php',$params);    $resultStr = httpPostRequest('http://factorinfo.com/erreeme/site/dbaccess.php',$params);
    $credentials = explode(",",$resultStr);
    return array(
                  "url" => "localhost",
                  "username" => $credentials[0],
                  "pwd" => $credentials[1],
                  "dbname" => "erreeme_erreeme"
                 );
  }
  
  $dbConfig = getDbConfig("erreeme");
  //var_dump($dbConfig);
  
  $mysqli = new mysqli($dbConfig["url"],$dbConfig["username"],$dbConfig["pwd"],$dbConfig["dbname"]);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	} else {
      echo "Successfuly connected to db: " . $dbConfig["url"] . "::" . $dbConfig["dbname"];
	}
?>