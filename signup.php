<?php
 require "db.php";

 $data = $_POST;
 if( isset($data['do_signup']) )
 {
 	//здесь регистрируем

    $errors = array();
 	if( trim($data['login']) == '' )
 		{
 			$errors[] = 'Введите ваш логин!';
 } 
 if( trim($data['email']) == '' )
 	{
 			$errors[] = 'Введите ваш Email';
 } 
 if( trim($data['password']) == '' )
 	{
 			$errors[] = 'Введите пароль';
 }
   if( trim($data['password_2']) != $data['password'] )
   	{
 			$errors[] = 'Повторный пароль введен не верно!';
 }
 if( empty($errors) )
 {
 	//все хорошо, регистрируем
 	$user = R::dispense('users');
 	$user->login = $data['login'];
 	$user->email = $data['email'];
 	$user->password = $data['password'];
 } else
 {
 	echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
 }
}
?>


<form action="/signup.php" method="POST">
	<p>
		<p><strong>Ваш логин</strong>:</p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>
	<p>
		<p><strong>Ваш email</strong>:</p>
		<input type="email" name="email"  value="<?php echo @$data['email']; ?>">
	</p>
	<p>
		<p><strong>Ваш пароль</strong>:</p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	<p>
		<p><strong>Введите ваш пароль еще раз</strong>:</p>
		<input type="password" name="password" value="<?php echo @$data['password_2']; ?>">
	</p>

	<p>
		<button type="submit" name="do_signup">Зарегистрироваться</button>
	</p>
</form>
