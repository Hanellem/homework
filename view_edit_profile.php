<?php

session_start();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$tel = $_SESSION['tel']; 
$password = $_SESSION['password'];


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
		<form action="edit_profile.php" method="POST" class="form">
				<img src="../image/avatar.jpg" alt="avatar">
				<p>ID - <?= $id ?></p>
				<p>NAME - <?= $name ?></p>
				<p>EMAIL - <?= $email ?></p>
				<p>TELEPHONE - <?= $tel ?></p>

				<input type="text" placeholder="Ф.И.О." value="<?= $name ?>" name="name" class="input" required>
				<input type="email" placeholder="E-mail" value="<?= $email ?>" name="email" class="input" required>
				<input type="telephone" placeholder="Телефон" value="<?= $tel ?>" name="tel" class="input" required>
				<input type="password" placeholder="Пароль" value="<?= $password ?>" name="password" class="input" required>


				<button type="submit" class="btn btn-profile">Сохранить изменения</button>
		</fprm>		
		</div>
	</section>
			

</body>
</html>
