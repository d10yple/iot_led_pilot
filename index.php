<?php

	require 'php/post_script.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Led Controller</title>
		<link rel="stylesheet" type="text/css" href="css/main-style.css"/>
	</head>
	<body>
		<div class="main-wrapper">
			<div class="title">
				<span>Wanna control the light..?</span>
			</div>		
			<div class="subtitle">
				<span>good to know that it's currently <span style="<?php if(!$led_status) {echo "color:white";} ?>" class="status <?php if($led_status) {echo "on-green";} else {echo "off-red";} ?>"><?php  if($led_status) {echo "on";} else {echo "off";}?></span></span>
			</div>	
			<div class="buttons-container">
				<form action="" method="POST">
					<button type="submit" name="submit" value="on" class="button yellow">
						<img class="icon" src="assets/svg/flash_on.svg" width="30px" alt="">
						Bring it on!!
					</button>
				</form>
				<div class="separator">
					<span>or</span>
				</div>
				<form action="" method="POST">
					<button type="submit" name="submit" value="off" class="button">
						<img class="icon" src="assets/svg/flash_off.svg" width="30px" alt="">
						No i'm fine..
					</button>
				</form>
			</div>
		</div>
	</body>
</html>
