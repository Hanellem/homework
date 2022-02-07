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
			<form action="php/edit_password.php" method="POST" class="form">
				<img src="image/avatar.jpg" alt="avatar">
				
				<p>NAME - <?= $name ?></p>
				<p>EMAIL - <?= $email ?></p>
				<p>TELEPHONE - <?= $tel ?></p>

				
				<input type="password" placeholder="Действующий пароль" name="password" class="input input-profile" required>
				<input type="password" placeholder="Новый пароль" name="new_password" class="input input-profile" required>
				<input type="password" placeholder="Повторите пароль" name="password_confirm" class="input input-profile" required>
				


				<button type="submit" class="btn btn-profile">Сохранить изменения</button>
				<!-- Решил вывести ошибки здесь, сразу удаляем что-бы не было пустое поле -->
				<?php 
					if ($_SESSION['message']){
						echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';						
					}
					unset($_SESSION['message']);
						
				?>
			</form>		
		</div>
	</section>
			

</body>
</html>
