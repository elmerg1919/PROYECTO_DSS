<?php
if (isset($_COOKIE["theme"])) {
	if ($_COOKIE["theme"] == "dark") {
		echo "
		<style>
		body{
			background-color: #1b1d1e;
			color: #fff;
		}
		.switch{
			border: 2px solid #272727;
			background-color: #f2f2f2;
		}
		.topnav{
			border-bottom: 2px solid #fff;
		}
		.contact{
			border: 1px solid #fff;
		}
		.cardtext{
			color: #000;
		}
		th, td{
			color: #fff;
		}
		.btn-dark{
			background-color: #fff;
			color: #000;
		}
		</style>";
	}
}
