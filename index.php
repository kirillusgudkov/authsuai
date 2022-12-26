<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Авторизация</title>
</head>
<body>
<?php
require('db.php');
?>
<?php if( isset($_SESSION['logged_user']) ) :
?> 
<div style="color: black; width: 15%; height: 20%; position: absolute; top: 2%; left: 43%; margin: 0; background-color:green; font-size:100%;"><span style="position:absolute; top:40%; left:25%;">Авторизованы!<br> Привет, <span style="color:white;"><?php echo $_SESSION['logged_user']->login;?></span> <a href="/logout.php"><hr>Выйти</a></span></div>

<?php else : ?>
<h1 class="	animate-charcter">Авторизация</h1>
<div>
<a href="/login.php">Вход</a>
<a href="/singup.php">Регистрация</a>
</div>
<?php endif; ?>
</body>
</html>