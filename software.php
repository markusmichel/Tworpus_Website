<!DOCTYPE html>
<html lang="en">

<?php include_once('php/functions.php') ;?>
<?php include 'php/head.php'; ?>

<body onload="initUI('software')">

<?php include 'php/header.php'; ?>
<?php include 'php/nav.php'; ?>
<?php include 'php/socialmediabar.php'; ?>
<?php include 'php/stats.php'; ?>



<section>
<div id="content">
<h1>Get our tools and sources</h1>
<span class="info">
For detailed information on how the different tools work please refer to our <a href="http://link.springer.com/chapter/10.1007/978-3-642-40722-2_3">Tworpus paper</a>.</span>
<h2>Crawler</h2>
The crawler application we are using to retrieve tweets is based on a JAVA implementation of Twitter’s REST API. It can be used as a standalone JAVA application that automatically loads a config-file when executed. The project is available via <a href="https://github.com/alexanderbazo/Tworpus_Crawler">github</a>.
<h2>Website</h2>
The web frontend to search in the database and to build personal corpora is also available via <a href="https://github.com/alexanderbazo/Tworpus_Website">github</a>.
<h2>Desktop client</h2>
You can download the desktop client to restore your Twitter corpus with a corpus file from this website. The tool is available as an app for <a href="downloads/Tworpus.zip" target="_blank">OS X</a> and for other operating systems as a <a href="downloads/Tworpus.jar" target="_blank">JAVA executable</a>.
</div>
</section>

<?php include 'php/footer.php'; ?>


</body>
</html>