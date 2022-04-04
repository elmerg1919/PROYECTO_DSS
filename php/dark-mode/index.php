<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Color scheme</title>
	<link rel="stylesheet" href="styles.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<?php
if (isset($_COOKIE["theme"])) {
	if ($_COOKIE["theme"] == "dark") {
		echo "
		<style>
		*{
			background-color: #1b1d1e;
			color: #fff;
		}
		.switch{
			border: 2px solid #fff;
			background-color: #f2f2f2;
		}
		.topnav{
			border-bottom: 2px solid #fff;
		}
		</style>";
	} else {
		echo "
		<style>
		*{
			background-color: #f1f1f1;
			color: #1b1d1e;
		}
		</style>";
	}
}
?>

<body>
	<div class="topnav">
		<a href="#">
			<p>Home</p>
		</a>
		<a href="#">
			<p>About</p>
		</a>
		<a href="#">
			<p>Contact</p>
		</a>
		<a href="#">
			<p>YouTube</p>
		</a>
		<a href="#"><label class="switch">
				<input class="btn btn-dark" type="checkbox" id="toggleTheme" <?php
																				if (isset($_COOKIE["theme"])) {
																					if ($_COOKIE["theme"] == "dark") {
																						echo "checked";
																					}
																				} ?>></label></a>

	</div>

	<div class="row">
		<div class="col p-2">
			<h2>Praesent Necus</h2>
			<p>In ut quam vitae odio lacinia tincidunt. Nam commodo suscipit quam. Nam adipiscing. Aliquam lobortis. Cras ultricies mi eu turpis hendrerit fringilla.</p>
			<button type="button" class="show-col">Read More</button>
		</div>
		<div class="col p-2">
			<p>Praesent ut ligula non mi varius sagittis. Praesent venenatis metus at tortor pulvinar varius. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Praesent venenatis metus at tortor pulvinar varius.</p>
			<button type="button" class="close-col">Close</button>
		</div>
	</div>

	<div class="row">
		<div class="col p-2">
			<h2>Praesent Necus</h2>
			<p>In ut quam vitae odio lacinia tincidunt. Nam commodo suscipit quam. Nam adipiscing. Aliquam lobortis. Cras ultricies mi eu turpis hendrerit fringilla.</p>
			<button type="button" class="show-col">Read More</button>
		</div>
		<div class="col p-2">
			<p>Praesent ut ligula non mi varius sagittis. Praesent venenatis metus at tortor pulvinar varius. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Praesent venenatis metus at tortor pulvinar varius.</p>
			<button type="button" class="close-col">Close</button>
		</div>
	</div>

	<a href="a.php">PAGINA</a>

	<script>
		$("#toggleTheme").on('change', function() {
			if ($(this).is(':checked')) {
				$(this).attr('value', 'true');
				document.cookie = "theme=dark";
				location.reload();
			} else {
				$(this).attr('value', 'false');
				document.cookie = 'theme=light';
				location.reload();
			}
		});
	</script>

</body>

</html>