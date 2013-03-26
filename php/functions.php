<?php
include_once("db_connect.php");

	function getCurrentStatus() {
		return "crawling tweets";
	}

	function getTweetCount() {
		$sql = mysql_query("SELECT tweets FROM stats");
		$result = mysql_fetch_assoc($sql);
		return $result['tweets'];
	}
	
	function getLanguageCount() {
		$sql = mysql_query("SELECT langs FROM stats");
		$result = mysql_fetch_assoc($sql);
		return $result['langs'];
	}
	
	function getTagCount() {
		$sql = mysql_query("SELECT tags FROM stats");
		$result = mysql_fetch_assoc($sql);
		return $result['tags'];
	}
	
	function getLocationCount() {
		$sql = mysql_query("SELECT locations FROM stats");
		$result = mysql_fetch_assoc($sql);
		return $result['locations'];
	}
	
	function getFirstTweetDate() {
		$sql = mysql_query("SELECT first_tweet_timestamp FROM stats");
		$result = mysql_fetch_assoc($sql);
		return date('d.n.Y H:m', $result['first_tweet_timestamp']);
	}
	
	function getLastTweetDate() {
		$sql = mysql_query("SELECT last_tweet_timestamp FROM stats");
		$result = mysql_fetch_assoc($sql);
		return date('d.n.Y H:m', $result['last_tweet_timestamp']);
	}
	
	function getTweetCountForLanguage($lang) {
		$sql = mysql_query("SELECT tweets_".$lang." as lang FROM stats");
		$result = mysql_fetch_assoc($sql);
		return $result['lang'];
	}
	
	
?>