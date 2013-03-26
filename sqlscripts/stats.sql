DROP PROCEDURE IF EXISTS `update_stats`

DELIMITER //
CREATE PROCEDURE update_stats()
BEGIN 

SET @tweets := (SELECT COUNT(_id) FROM tweets);
SET @tags := (SELECT COUNT(_id) FROM tags);
SET @locations := (SELECT COUNT(_id) FROM locations);
SET @langs := (SELECT COUNT(DISTINCT _tweetlang) FROM tweets);
SET @userlangs := (SELECT COUNT(DISTINCT _userlang) FROM tweets);
SET @first_tweet := (SELECT _timestamp/1000 FROM tweets ORDER BY _timestamp ASC LIMIT 1);
SET @last_tweet := (SELECT _timestamp/1000 FROM tweets ORDER BY _timestamp DESC LIMIT 1);
SET @de := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'de');
SET @en := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'en');
SET @es := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'es');
SET @fr := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'fr');
SET @it := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'it');
SET @ja := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'ja');
SET @nl := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'nl');
SET @pt := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'pt');
SET @tr := (SELECT COUNT(tweets._id) AS count FROM langs, tweets WHERE tweets._tweetlang = langs._id AND langs._langcode = 'tr');
UPDATE stats SET tweets = @tweets, tags = @tags, locations = @locations, langs = @langs, userlangs = @userlangs, first_tweet_timestamp = @first_tweet, last_tweet_timestamp = @last_tweet, tweets_de = @de, tweets_en = @en, tweets_es = @es, tweets_fr = @fr, tweets_it = @it, tweets_ja = @ja, tweets_nl = @nl, tweets_pt = @pt, tweets_tr = @tr WHERE id = 1;

END//