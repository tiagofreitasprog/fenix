<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Coming Soon ...</title>
	<link rel="shortcut icon" type="image/png" href="favicon-32x32.png"/>
	<link rel="stylesheet" type="text/css" href="widgetLeague.css">
	<link rel="stylesheet" type="text/css" href="widgetLeagueInfo.css">
	<script src="jquery.js"></script>
	<script src="jqueryGlobals.js"></script>
    <script src="jquery.widgetLeague.js" type="text/javascript"></script>
</head>
<body>
	<header>
		<div class="menuBar">
			<img class="logo-img-size" src="img/Logo-Test.png">
			<p class="backButton">back</p>
		</div>
	</header>
	<section id="widgetLeague"></section>
</body>

<script type="text/javascript">

	$(document).ready(function() {
	 	$('#widgetLeague').unbind().removeData().html('').widgetLeague({
            'Widgetkey': sessionStorage.getItem('Widgetkey'),
            'league_id': sessionStorage.getItem('leagueInfoKey'),
            'league_name': sessionStorage.getItem('leagueInfoName'),
            'leagueLogo': sessionStorage.getItem('leagueInfoLogo'),
            'widgetWidth': '100%'
        });
	});

	// Added click function to header close window
	$('.backButton').click(function() {
	    window.close();
	}); 

</script>
</html>