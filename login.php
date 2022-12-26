<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
	$data = $_POST;
	if (isset($data['do_login']))
	{
		$errors=array();
		$user = R::findOne( 'users', 'login = ?', array($data['login']) );
		if($user)
		{
		//login exist
			if ( password_verify($data['password'], $user->password) )
			{
				$_SESSION['logged_user'] = $user;
				echo '<div style="color: green;">OK<a href="index.php">Main page</a></div><hr>';
				header('Location: /');
			} else
			{
				$errors[] = 'Неверный пароль или пользователя не существует';
			}
			
		} else
		{
			$errors[] = 'Пользователь с таким логином не существует';
		}
		
		if ( ! empty($errors) )
		{
			echo '<div style="color: black; width: 14%; height: 10%; position: absolute; top: 2%; left: 43%; margin: 0; background-color:red; font-size:100%;"><span style="position:absolute; top:40%;">'.array_shift($errors).'</span></div>';
		}
		
	}
	
?>
<form action="login.php" method="POST">
<h1>Логин</h1>
<p><input type="text" name="login" value="<?php echo @$data['login'];?>"></p>
<h1>Пароль</h1>
<p><input type="password" name="password" value="<?php echo @$data['password'];?>"></p>
<p><button type="submit" name="do_login">Login</button></p>
</form>
</body>
</html>