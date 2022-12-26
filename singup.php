<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
	$data = $_POST;
	if (isset($data['do_singup']))
	{
		//register here
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}
		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}
		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Введите правильно второй пароль';
		}
		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Попробуйте снова. Введите правильно логин или пароль';
		}

		if ( empty($errors) )
		{
		//ok
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color: black; width: 14%; height: 10%; position: absolute; top: 2%; left: 43%; margin: 0; background-color:green; font-size:100%;"><span style="position:absolute; top:40%;">Успешно! Подождите 5 секунд!</span></div>';
			header('Refresh: 5; URL=/');
		} else
		{
			echo '<div style="color: black; width: 14%; height: 10%; position: absolute; top: 2%; left: 43%; margin: 0; background-color:red; font-size:100%;"><span style="position:absolute; top:40%;">'.array_shift($errors).'</span></div>';

		}

	}
?>


<form id="singup" action="singup.php" method="POST">
<h1>Логин</h1>
<p><input type="text" name="login" value="<?php echo @$data['login'];?>"></p>
<h1>Пароль</h1>
<p><input type="password" name="password" value="<?php echo @$data['password'];?>"></p>
<h1>Пароль еще раз</h1>
<p><input type="password" name="password_2" value="<?php echo @$data['password_2'];?>"></p>
<p><button type="submit" name="do_singup">Зарегистрироваться</button></p>
</form>
</body>
</html>