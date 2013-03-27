<?php

include_once("db_connect.php");

if(isset($_POST['query'])) {
		$query = $_POST['query'];
		parseQuery($query);
} else {
		returnError("NO QUERY");
}

function parseQuery($query) {
	if ($query == "getsample") {
		getSample();
	} else {
		returnError("UNKNOWN QUERY");
	}
}

function getSample() {
	$lang_array = explode(",", $_POST['langs']);
	$langs = "";
	$tmp = "";
	$size = $_POST['size'];
	$retweeted = $_POST['retweeted'];
	$favoured = $_POST['favoured'];
	
	foreach ($lang_array as &$value) {
		$tmp = getLangId($value);
		$langs = $langs.$tmp.",";
	}

	$langs = substr_replace($langs ,"",-1);
	
	
	$file = 'corpus.txt';
	$f = fopen($file, 'w');
	
	$sql = mysql_query("SELECT _id AS id, _userid AS userid FROM tweets WHERE _tweetlang IN (".$langs.") AND _isfavourited = ".$favoured." AND _isretweeted = ".$retweeted." LIMIT ".$size."");
	
	while($row = mysql_fetch_object($sql)){
		fwrite($f, "https://twitter.com/".$row->id."/status/".$row->userid."\r\n");
	}
	
	fclose($f);
	
	print 'php/corpus.txt';
}

function getLangId($code) {
	$sql = mysql_query("SELECT _id FROM langs WHERE _langcode LIKE '".$code."'");
	$result = mysql_fetch_assoc($sql);
 	return $result['_id'];
}


?>