<!DOCTYPE html>
<html lang="en">

<?php include_once('php/functions.php') ;?>
<?php include 'php/head.php'; ?>

<body onload="initUI('generator')">

<?php include 'php/header.php'; ?>
<?php include 'php/nav.php'; ?>
<?php include 'php/socialmediabar.php'; ?>
<?php include 'php/stats.php'; ?>

<section>
<div id="content">
<div id="start_step" class="step">
<h1>Build your on Twitter corpus</h1>
We will guide you through the creation of your personal twitter corpora. Just follow these three easy steps.
<div class="start" onclick="scrollToDiv('language_step')">Start</div>
</div>

<div id="language_step" class="step">
<h2>1. Language</h2>
Select those languages you want to have in your sample:
<div class="form language_selection">
<span class="checkbox_selection"><input type="checkbox" class="lang en" value="en"> english</span>
<span class="checkbox_selection"><input type="checkbox" class="lang es" value="es"> spanish</span>
<span class="checkbox_selection"><input type="checkbox" class="lang pt" value="pt"> portuguese</span>
<span class="checkbox_selection"><input type="checkbox" class="lang fr" value="fr"> french</span>
<span class="checkbox_selection"><input type="checkbox" class="lang tr" value="tr"> turkish</span>
<span class="checkbox_selection"><input type="checkbox" class="lang it" value="it"> italian</span>
<span class="checkbox_selection"><input type="checkbox" class="lang nl" value="nl"> dutch</span>
<span class="checkbox_selection"><input type="checkbox" class="lang de" value="de"> german</span>
</div>

<div class="buttons">
<div class="button back" onclick="scrollToDiv('start_step')">Back</div>
<div class="button" onclick="scrollToDiv('sample_step')">Next</div>
</div>
</div>

<div id="sample_step" class="step">
<h2>2. Sample</h2>
Define the time range and maximal size of your sample (possible there will be less tweets that match all your criterias):
<div class="form sample_selection">
<span class="time_selection">Tweets from:  <input type="text" name="time_selection_start" id="time_selection_start" value="" class="" />
 until: <input type="text" name="time_selection_end" id="time_selection_end" value="" class="" /></span><br />
<span class="range_selection">Sample size: <input type="range" class="extra size" min="10000" max="1000000" step="10000" value="10000" onchange="$('.slider_value').html(addCommas(this.value));"/>
<span class="slider_value">10.000</span><br />
<span class="range_selection">Min characters in tweets: <input type="range" class="extra chars min" min="1" max="140" step="1" value="1" onchange="$('.min_char_value').html(addCommas(this.value));"/>
<span class="min_char_value">1</span><br />
<span class="range_selection">Max characters in tweets: <input type="range" class="extra chars max" min="1" max="140" step="1" value="140" onchange="$('.max_char_value').html(addCommas(this.value));"/>
<span class="max_char_value">140</span>

</div>
<div class="buttons">
<div class="button back" onclick="scrollToDiv('language_step')">Back</div>
<div class="button" onclick="scrollToDiv('meta_step')">Next</div>
</div>
</div>

<div id="meta_step" class="step">
<h2>3. Metadata</h2>
Not implemented ;(
<div class="buttons">
<div class="button back" onclick="scrollToDiv('sample_step')">Back</div>
<div class="button" onclick="buildCorpus()">Build Corpus</div>
</div>
</div>

<div id="building_step" class="step">
<div class="waiting hidden">We are building your corpus ...</div>
<div class="result"></div>
</div>

									
</div>
</section>

<?php include 'php/footer.php'; ?>


</body>

</html>