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
		<form action="php/edit_profile.php" method="POST" class="form">
				<img src="image/avatar.jpg" alt="avatar">
				
				<p>NAME - <?= $name ?></p>
				<p>EMAIL - <?= $email ?></p>
				<p>TELEPHONE - <?= $tel ?></p>

				<input type="text" placeholder="Ф.И.О." value="<?= $name ?>" name="name" class="input input-profile" required>
				<input type="email" placeholder="E-mail" value="<?= $email ?>" name="email" class="input input-profile" required>
				<input type="telephone" placeholder="Телефон" value="<?= $tel ?>" name="tel" class="input input-profile" required>
				


				<button type="submit" class="btn btn-profile">Сохранить изменения</button>

				<?php 
					if ($_SESSION['message']){
						echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';						
					}
					unset($_SESSION['message']);
						
				?>
		</fprm>		
		</div>
	</section>
			

</body>
</html>
