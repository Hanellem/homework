<?php
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$tel = $_SESSION['tel'];
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
				
				<p>NAME - <?= $name ?></p>
				<p>EMAIL - <?= $email ?></p>
				<p>TELEPHONE - <?= $tel ?></p>

				<button type="submit" class="btn btn-profile">Редактировать профиль</button>
				
				<a href="view_edit_password.php" class="btn btn-profile forgot-password">Изменить пароль!?<br>Серьёзно думаешь им надо твой акк?)))</a>
		</form>		
		</div>
	</section>
			

</body>
</html>