<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Coming Soon ...</title>
	<link rel="shortcut icon" type="image/png" href="favicon-32x32.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main-style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/widgetLiveScore.css') ?>">
	<script src="<?php echo base_url('js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('js/jqueryGlobals.js') ?> "></script>
	<script src="<?php echo base_url('js/jquery.widgetLiveScore.js') ?>" type="text/javascript"></script>
</head>
<body>
<div class="container container-with-errors">
	<section id="widgetLiveScore"></section>
</div>
</body>
<script type="text/javascript">

	$(document).ready(function() {
		$('#widgetLiveScore').widgetLiveScore({
			widgetWidth: '100%'
		});
	});

</script>
</html>