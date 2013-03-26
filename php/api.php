<?php

include_once("db_connect.php");

if(isset($_POST['query'])) {
		$query = $_POST['query'];
		parseQuery($query);
} else {
		returnError("NO QUERY");
}

function parseQuery($query) {
	if($query == "getstats") {
		getStats();
	} else if ($query == "getsample") {
		getSample();
	} else {
		returnError("UNKNOWN QUERY");
	}
}

function getSample() {
	returnArray(getSampleForPresentation());
}

function getStats() {
	$tweet_count = gettotaltweetcount(); 
	$time_of_first_tweet = getTimestampForFirstTweet();
	$time_of_last_tweet = getTimestampForLastTweet();
	$id_of_first_tweet = getIdForFirstTweet();
	$id_of_last_tweet = getIdForLastTweet();
	$tweets_by_countries = getTotalTweetsByCountries();
	$most_used_hashtags = getTenMostUsedHashTags();

	returnValues("\"tweetcount\" : \"".$tweet_count."\", \"timeoffirsttweet\" : \"".$time_of_first_tweet."\", \"timeoflasttweet\" : \"".$time_of_last_tweet."\", \"idoffirsttweet\" : \"".$id_of_first_tweet."\", \"idoflasttweet\" : \"".$id_of_last_tweet."\", \"tweetsbycountries\" : ".$tweets_by_countries.", \"mostusedhashtags\" : ".$most_used_hashtags);
}

function gettotaltweetcount() {
	$sql = mysql_query("SELECT tweets FROM stats");
	$result = mysql_fetch_assoc($sql); 
	return $result['tweets'];
}

function getTimestampForFirstTweet() {
	$sql = mysql_query("SELECT first_tweet_timestamp AS time FROM stats");
	$result = mysql_fetch_assoc($sql); 
	return $result['time'];
}

function getTimestampForLastTweet() {
	$sql = mysql_query("SELECT last_tweet_timestamp AS time FROM stats");
	$result = mysql_fetch_assoc($sql); 
	return $result['time'];
}

function getIdForFirstTweet() {
	$sql = mysql_query("SELECT _id AS id FROM tweets WHERE _timestamp = (SELECT first_tweet_timestamp AS time FROM stats)*1000");
	$result = mysql_fetch_assoc($sql); 
	return $result['id'];
}

function getIdForLastTweet() {
	$sql = mysql_query("SELECT _id AS id FROM tweets WHERE _timestamp = (SELECT last_tweet_timestamp AS time FROM stats)*1000");
	$result = mysql_fetch_assoc($sql); 
	return $result['id'];
}

function getTotalTweetsByCountries() {
	return "";
}

function getTenMostUsedHashTags() {
	return "";
}

function getTenMostUsedLocations() {
	return "";
}

function getSampleForPresentation() {
	$sql = mysql_query("SELECT tweets._id AS id FROM tweets INNER JOIN langs ON langs._langcode LIKE 'en' WHERE tweets._lang = langs._id AND _timestamp/1000 > UNIX_TIMESTAMP('2013-01-13 18:30:00') AND _timestamp/1000 < UNIX_TIMESTAMP('2013-01-13 18:40:00') AND _isretweeted = 1 ORDER BY RAND() LIMIT 100");
	$return = array();
	while($result = mysql_fetch_assoc($sql)) {
    	$return[] = $result;
	}
	return json_encode($return);
}


function returnArray($result) {
	print "{\"status\": \"ok\", \"result\": ".$result."}";
}

function returnValues($result) {
	print "{\"status\": \"ok\", \"result\": {".$result."}}";
}

function returnSingleValue($result) {
	print "{\"status\": \"ok\", \"result\": \"".$result."\"}";
}

function returnError($error) {
	print "{\"status\": \"error\", \"type\": \"".$error."\"}";
}


?>