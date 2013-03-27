<!DOCTYPE html>
<html lang="en">

<?php include_once('php/functions.php') ;?>
<?php include 'php/head.php'; ?>

<body onload="setActiveMenuItem('software')">

<?php include 'php/header.php'; ?>
<?php include 'php/nav.php'; ?>
<?php include 'php/socialmediabar.php'; ?>
<?php include 'php/stats.php'; ?>



<section>
<div id="content">
<h1>Get our tools and sources</h1>
<span class="info">...</span>
<h2>Crawler</h2>
The crawler application we are using to retriev tweets is based upon a java implementation of twitters REST API. It can be used as a standalone JAVA application which auto loads a config file on startup. The project is available via <a href="https://github.com/alexanderbazo/Tworpus_Crawler">github</a>.
<h2>Website</h2>
The web frontend to search in the database and to build personal corpora is available via <a href="https://github.com/alexanderbazo/Tworpus_Website">github</a>.
<h2>Desktop client</h2>
comming soon ...
</div>
</section>

<?php include 'php/footer.php'; ?>


</body>
</html>