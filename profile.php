<?php
session_start();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Open+Sans&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

	<section id="mail" class="mail">
		<div class="container">
		<form action="view_edit_profile.php" method="POST" class="form ">
				<img src="image/avatar.jpg" alt="avatar">
				
				<p>NAME - <?= $_SESSION['name'] ?></p>
				<p>EMAIL - <?= $_SESSION['email'] ?></p>
				<p>TELEPHONE - <?= $_SESSION['tel'] ?></p>
				<p>ПАРОЛЬ - <?= $_SESSION['password'] ?></p>


				<button type="submit" class="btn btn-profile">Редактировать профиль</button>
				<br>
				<a href="view_edit_password.php" class="btn btn-profile forgot-password">Изменить пароль!<br>Серьёзно думаешь им надо твой акк?)))</a>
		</form>		
		</div>
	</section>
			

</body>
</html>