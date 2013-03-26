Tworpus.Controller = (function(app) {

	var stats = null,
	tweets = null,
	inHintBox = false,

	init = function() {
		tweets = new Array();
		//askForStats();
		initUI(null);
		$('#hintbox').hide();
	},

	askForStats = function() {
		$('.info_text').html("<span class='loading'>loading . . .</span>");
		if(stats == null) {
			$.ajax({
  				type: "POST",
  				url: 'http://tools.mi.ur.de/tworpus/api.php',
  				data: {query: "getstats"},
  				success: initUI
			});
		} else initUI(null);
	},

	initUI = function(data) {
		if(data != null) {
			var obj = jQuery.parseJSON(data);
			stats = jQuery.parseJSON(data);
		}
		//var output = "Tworpus is a free online tool helping you to get a corpus with as many tweets you need for your research. You decide on <span class='hint language'>language</span>, <span class='hint origin'>origin</span>, <span class='hint timespan'>timespan</span> and <span class='hint size'>size</span> of your sample. The tweets are fetched within twitter's <a class=\"external_link\" href=\"https://dev.twitter.com/pages/api_terms\" target=\"_blank\">rules of the road</a>. We only gather tweet ids and non personal meta information. The tweets itself are recreated on the fly with your own twitter account. Go to <a href='generate.php' class='internal_link'>generate</a> to build your own twitter corpus!";
		//output += " <br /><br /> Currently you can access <span class='hint'>" + stats.result.tweetcount + "</span> tweets in <span class='hint'>" + stats.result.tweetsbycountries.length + "</span> languages. The oldest tweet is from <span class='hint tweet' id=" + stats.result.idoffirsttweet + ">" + (new Date(stats.result.timeoffirsttweet*1000)) + "</span> and the latest one is from from <span class='hint tweet' id=" + stats.result.idoflasttweet + ">" + (new Date(stats.result.timeoflasttweet*1000)) + "</span>.";
		//$('.info_text').html(output);

		$('.hint').mouseenter(function(e) {
			$('#hintbox').css({top: e.pageY+20, left: e.pageX+20 });
			if(($(this)).hasClass('language')) {
				showLanguageHint();
			} else if(($(this)).hasClass('origin')) {
				showOriginHint();
			} else if(($(this)).hasClass('tweet')) {
				showTweetHint(($(this)).attr('id'));
			}
			$('#hintbox').fadeIn();
		});

		$('.hint').mouseout(function(e) {
			hideHintBox();
		});

	},

	hideHintBox = function() {
		$('#hintbox').hide();
		$('#hinttext').html('');
		$('#spinner').show();
	},

	showLanguageHint = function() {
		$('#spinner').hide();
		$('#hinttext').html('<h1>Languages</h1><p class="text">Each twitter account is marked with a prefered language showing which language the user tweets in. Be careful. This is a user setting and maybe is incorrent. We currently ar working on a linguistic approach to mark the tweets languages from the text itself!</p>');
	},

	showOriginHint = function() {
		$('#spinner').hide();
		$('#hinttext').html('<h1>Origin</h1><p class="text">Every twitter user can give a home loaction in his profil. This is a free text setting. Another method to retrieve a tweets origin are geographic coordinates. Not many users choose to publish thoose.</p>');
	},

	showTweetHint = function(tweetid) {
		loadHintTweet(tweetid);
	},

	loadHintTweet = function(tweetid) {
		if(tweets.hasOwnProperty(tweetid)) {
			showHintTweet(tweets[tweetid]);
		} else { 
			console.log('ajax');
			$.getJSON("https://api.twitter.com/1/statuses/show.json?id=" + tweetid + "&callback=?", showHintTweet);
		}
	},

	showHintTweet = function(tweet_json) {
		if(!tweets.hasOwnProperty(tweet_json.id_str)) {
			tweets[tweet_json.id_str] =  tweet_json;
		}		
		$('#spinner').hide();
		$('#hinttext').html('<p class="date">' + tweet_json.created_at + '</p><h1>' + tweet_json.user.screen_name + '</h1><p class="text">' + tweet_json.text + '</p>');
	}

	return {
		init : init
	};

}(Tworpus));
