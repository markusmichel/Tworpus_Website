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
<h1>Create your own Twitter corpus</h1>
It just takes two easy steps to create a tailored Twitter corpus.
<div class="start" onclick="scrollToDiv('language_step')">Start</div>
</div>

<div id="language_step" class="step">
<h2>1. Language</h2>
Select those languages you want to have in your sample:
<div class="form language_selection">
<span class="checkbox_selection"><input type="checkbox" class="lang en" value="en"> English</span>
<span class="checkbox_selection"><input type="checkbox" class="lang es" value="es"> Spanish</span>
<span class="checkbox_selection"><input type="checkbox" class="lang pt" value="pt"> Portuguese</span>
<span class="checkbox_selection"><input type="checkbox" class="lang fr" value="fr"> French</span>
<span class="checkbox_selection"><input type="checkbox" class="lang tr" value="tr"> Turkish</span>
<span class="checkbox_selection"><input type="checkbox" class="lang it" value="it"> Italian</span>
<span class="checkbox_selection"><input type="checkbox" class="lang nl" value="nl"> Dutch</span>
<span class="checkbox_selection"><input type="checkbox" class="lang de" value="de"> German</span>
</div>

<div class="buttons">
<div class="button back" onclick="scrollToDiv('start_step')">Back</div>
<div class="button" onclick="scrollToDiv('sample_step')">Next</div>
</div>
</div>

<div id="sample_step" class="step">
<h2>2. Sample</h2>
Select the sample size of you corpus and define time span and length of the respective tweet data.
<div class="form sample_selection">
<span class="time_selection">Tweets from:  <input type="text" name="time_selection_start" id="time_selection_start" value="" class="" />
 until: <input type="text" name="time_selection_end" id="time_selection_end" value="" class="" /></span><br />
<span class="range_selection">Sample size: <input type="range" class="extra size" min="10000" max="1000000" step="10000" value="10000" onchange="$('.slider_value').html(addCommas(this.value));"></input>
<span class="slider_value">10.000</span><br />
<span class="range_selection">Min characters in tweets: <input type="range" class="extra chars min" min="1" max="140" step="1" value="1" onchange="$('.min_char_value').html(addCommas(this.value));" ></input>
<span class="min_char_value">1</span><br />
<span class="range_selection">Max characters in tweets: <input type="range" class="extra chars max" min="1" max="140" step="1" value="140" onchange="$('.max_char_value').html(addCommas(this.value));" ></input>
<span class="max_char_value">140</span>

</div>
<div class="buttons">
<div class="button back" onclick="scrollToDiv('language_step')">Back</div>
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