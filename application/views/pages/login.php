<!DOCTYPE html>
<html>
<head>
<title>KumpulIDE - <?= $title; ?></title>
</head>
<body>
	<?= form_open("login"); ?>
	<input type="text" name="username" placeholder="Username" >
	<br>
	<input type="text" name="email" placeholder="Email" >
	<br>
	<input type="password" name="password" placeholder="Password" >
	<br>
	<?= $captcha['image']; ?>
	<br>
	<input type="text" name="captcha" placeholder="are you robot?" >
	<br>
	<button type="submit" >👉 Login!</button>
	<?= form_close(); ?>
</body>
</html>