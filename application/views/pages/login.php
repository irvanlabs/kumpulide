<!DOCTYPE html>
<html>
<head>
<title>test</title>
</head>
<body>
	<?= form_open("login"); ?>
	<input type="text" name="username" placeholder="Username" >
	<br>
	<input type="email" name="email" placeholder="Email" >
	<br>
	<input type="password" name="password" placeholder="Password" >
	<br>
	<button type="submit" >👉 Login!</button>
	<?= form_close(); ?>
	<hr>
	<?php include $path."views/pages/register.php"; ?>
</body>
</html>