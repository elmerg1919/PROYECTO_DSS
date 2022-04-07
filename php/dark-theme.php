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
    } 
}
