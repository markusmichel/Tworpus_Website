<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/web.css">
<title>Tworpus</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<script src="js/libs/jquery-1.7.2.min.js"></script>
<script src="js/libs/jquery.smooth-scroll.min.js"></script>


<script>
function setActiveMenuItem(page) {
	$('nav .'+page).addClass('active selected');
	$('.result').html('');
}

function scrollToDiv(id){
	console.log('scrolling to #'+id);
	$.smoothScroll({
		scrollElement: $('#content'),
		scrollTarget: '#'+id
	});
	return false;
}

/** http://stackoverflow.com/questions/2646385/add-a-thousands-separator-to-a-total-with-javascript-or-jquery */
function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function buildCorpus() {
	scrollToDiv('building_step');
	$('.waiting').fadeOut(400).delay(500).removeClass('hidden').delay(400).fadeIn(500);
	
	console.log("sending to server");
	
	var langs = "";
	var size = 0;
	var retweeted = 0;
	var favoured = 0;
	
	$('#language_step').find('.lang').each(function(i) {
		if($(this).is(':checked')) {
		langs = langs + $(this).val() + ",";
		}
	});
	
	size = $('.size').val();
	
	if($('.retweeted').is(':checked')) {
		retweeted = 1;
	}
	
	if($('favoured').is(':checked')) {
		favoured = 1;
	}

	langs = langs.substring(0, langs.length - 1);
	
	$.ajax({
		   type: "POST",
		   url: 'php/api.php',
		   data: {query: "getsample", langs: langs, size: size, retweeted: retweeted, favoured: favoured},
		   success: showSample
	});
}

function showSample(data) {
	console.log(data);
	
	$('.waiting').fadeOut(400).addClass('hidden');
	
	$('.result').delay(400).fadeIn(400).html('<a href="' + data + '" target="_blank" style="text-decoration:underline">download your corpora</a>')
	
}

</script>

</head>