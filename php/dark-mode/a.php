<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
	<h3>HOLA</h3>

	<a href="index.php"><p>INDEX</p></a>

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