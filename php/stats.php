<div id="stats">
<h1>Tworpus Stats</h1>
<h2>current status</h2>
<span class="value"><?php echo getCurrentStatus(); ?></span>
<h2>archived tweets</h2>
<span class="value"><?php echo (number_format(getTweetCount(), 0, '','.')); echo "</span> tweets <br /> in <span class='value'>"; echo  getLanguageCount(); echo "</span> languages"?></span>
<h2>timespan</h2>
from <span class="value"><?php echo getFirstTweetDate(); ?></span><br />until <span class="value"><?php echo getLastTweetDate(); ?></span>
<h2>Tweets by languages</h2>
<span class="value"><?php echo (number_format(getTweetCountForLanguage('en'), 0, '','.'));?></span> (en)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('es'), 0, '','.'));?></span> (es)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('pt'), 0, '','.'));?></span> (pt)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('fr'), 0, '','.'));?></span> (fr)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('tr'), 0, '','.'));?></span> (tr)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('it'), 0, '','.'));?></span> (it)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('nl'), 0, '','.'));?></span> (nl)<br />
<span class="value"><?php echo (number_format(getTweetCountForLanguage('de'), 0, '','.'));?></span> (de)<br />
</div>
