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
	cleanup();
	$lang_array = explode(",", $_POST['langs']);
	$langs = "";
	$tmp = "";
	$size = $_POST['size'];
	$retweeted = $_POST['retweeted'];
	$favoured = $_POST['favoured'];
	$start_date = $_POST['start'];
	$end_date = $_POST['end'];
	$min_chars = $_POST['min_chars'];
	$max_chars = $_POST['max_chars'];
	
	if($end_date == "-1") {
		$end_date = time()*1000;
	}
	
	foreach ($lang_array as &$value) {
		$tmp = getLangId($value);
		$langs = $langs.$tmp.",";
	}

	$langs = substr_replace($langs ,"",-1);
	
	
	$filename = randomstring(10);
	$file = '../results/'.$filename.'.csv';
	$f = fopen($file, 'w');
	
	$sql = mysql_query("SELECT _id AS id, _userid AS userid, _tweetlang AS lang, (SELECT _langcode FROM langs WHERE _id = _tweetlang) AS tweetlang, _charcount AS chars, _wordcount AS words, FLOOR(1 + RAND() * x.m_id) 'rand_ind' FROM tweets, (SELECT MAX(t._id) 'm_id' FROM tweets t) x WHERE tweets._tweetlang IN (".$langs.") AND tweets._timestamp BETWEEN ".$start_date." AND ".$end_date." AND tweets._charcount BETWEEN ".$min_chars." AND ".$max_chars." ORDER BY rand_ind LIMIT ".$size."");
	
	while($row = mysql_fetch_object($sql)){
		fwrite($f, $row->userid.",".$row->id.",".$row->tweetlang.",".$row->chars.",".$row->words."\r\n");
	}
	
	fclose($f);
	
	print 'results/'.$filename.'.csv';
}

function getLangId($code) {
	$sql = mysql_query("SELECT _id FROM langs WHERE _langcode LIKE '".$code."'");
	$result = mysql_fetch_assoc($sql);
 	return $result['_id'];
}


function randomstring($length = 6) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	srand((double)microtime()*1000000);
	$i = 0; 
	while ($i < $length) {
		$num = rand() % strlen($chars);
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}

function cleanup() {
	$DIR = '../results/';
	if ($handle = opendir($DIR)) {
		while (false !== ($file = readdir($handle))) {
			if ( filemtime($DIR.$file) <= time()-60*60*24 ) {
				unlink($DIR.$file);
			}
		}
		closedir($handle);
	}
}



?>