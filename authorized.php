	<?php
	require "db1.php";
	if (isset($_POST['send'])) {
		if(trim($_POST['name']) == "" || trim($_POST['message']) == "" || trim($_POST['subject']))
		{
			$err = "Заполните все поля!";
		} else {
			$koments = R::dispense('koments');
			$koments->name = $_POST['name'];
			$koments->email = $_POST['email'];
			$koments->message = $_POST['message'];
			$koments->date = date("Y.m.d h:m:s");


			R::store($koments);
			

		}
	}

	
	?>	
	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>урок по созданию коментариев на сайте</title>
	</head>
	<body><form action="" method="post" class="form">
	<input type="text" name="name" placeholder="Имя"><br><br>
	<input type="email" name="email" placeholder="Email"><br><br>
	<textarea type="text" name="message" placeholder="Коментарий"></textarea>
	<div style="clear:both"><br><br></div>
	<input type="submit" name="send">
	<?= '<div style="color: red">'.$err.'</div>' ?>
	</form> 
	<?php $komen = mysqli_query($con, "SELECT * FROM `koments` ORDER BY `id`")?> 
	<?php while($kom = mysqli_fetch_assoc($komen)) { 
	?>
	<div class="koment">
		<img src="12.png" width="40" height="40">
		<div class="name"><?= $kom['name']?>
	</div>
		<div class="i">
			<?= $kom['date'] ?> <i class="fa fa-clock-o"></i>
	</div> <br>
	<div class="message"><?= $kom['message'] ?>
	  		
	</div>
<?php } ?>

</body>
</html>