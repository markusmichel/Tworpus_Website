<!DOCTYPE html>
<html lang="en">

<?php include_once('php/functions.php') ;?>
<?php include 'php/head.php'; ?>

<body onload="initUI('index')">

<?php include 'php/header.php'; ?>
<?php include 'php/nav.php'; ?>
<?php include 'php/socialmediabar.php'; ?>
<?php include 'php/stats.php'; ?>


<section>
<div id="content">
<h1>What is Tworpus?</h1>
As millions of people using twitter every day the number of user generated tweets grows large every second. Linguistic research on this data may answer thousands of interesting questions on social, politicial or historicial events and  opinions. This potential can only be used when researcher are able to get those tweets they are interested in. We are crawling augmenting and archiving tweet metadata that allow us to recreate those tweeets you need for your research. You decide on language, size, date and topic of your sample. And we allow you to fetch those tweets from <a href="http://twitter.com">twitter.com</a><br />
<h2>How does it work?</h2>
Twitter allows everybody to listen to a continious sample of tweets, approximately 1% of all tweets (~100 tweets per second). We are processing those tweets and store all the data we are allowed to: time, length, language, users origin, etc. What we can not do is to store and distribute the tweet itself. 
<h2>How to get your corpus?</h2>
You can filter our archived tweets by  using the metadata we collected: Select 'english' tweets from 'last christmas' which where 'retweeted' by more than 10 people. Our system creates a list with all relevant tweets. Download and use this list with our desktop client and all the tweets will be fetched from twitter and stored on your computer.
</div>
</section>


<?php include 'php/footer.php'; ?>



</body>
</html>