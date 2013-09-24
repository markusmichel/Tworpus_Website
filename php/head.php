<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/web.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.2.custom.min.css">
<title>Tworpus</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

<script src="js/libs/html5slider.js"></script>
<script src="js/libs/jquery-1.7.2.min.js"></script>
<script src="js/libs/jquery.smooth-scroll.min.js"></script>
<script src="js/libs/date.js"></script>
<script src="js/libs/jquery-ui-1.10.2.custom.min.js"></script>
<script src="js/libs/jquery-ui-timepicker-addon.js"></script>

<script>

function initUI(page) {
	setActiveMenuItem(page);
	enableDatePicker();
	clearPage();
}

function setActiveMenuItem(page) {
	$('nav .'+page).addClass('active selected');
}

function clearPage() {
	$('.result').html('');
}

function enableDatePicker() {
	$('#time_selection_start').datetimepicker();
	$('#time_selection_end').datetimepicker();
}

function scrollToDiv(id){
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
	
	var langs = "";
	var size = 0;
	var retweeted = 0;
	var favoured = 0;
	var start_date = "-1";
	var end_date = "-1";
	
	var min_chars = $('.min').val();
	var max_chars = $('.max').val();
	
	if($('#time_selection_start').val() != "") {
		start_date = Date.parse($('#time_selection_start').val()).getTime();
	}
	
	if($('#time_selection_end').val() != "") {
		end_date = Date.parse($('#time_selection_end').val()).getTime();
	}
	
	$('#language_step').find('.lang').each(function(i) {
		if($(this).is(':checked')) {
		langs = langs + $(this).val() + ",";
		}
	});
	
	size = $('.size').val();

	langs = langs.substring(0, langs.length - 1);
	
	$.ajax({
		   type: "POST",
		   url: 'php/api.php',
		   data: {query: "getsample", langs: langs, size: size, retweeted: retweeted, favoured: favoured, start: start_date, end: end_date, min_chars: min_chars, max_chars: max_chars},
		   success: showSample
	});
}

function showSample(data) {
	$('.waiting').fadeOut(400).addClass('hidden');
	$('.result').delay(400).fadeIn(400).html('<a href="' + data + '" target="_blank" style="text-decoration:underline">download your corpora (link will be valid for 24 hours)</a>')
	
}

</script>

</head>