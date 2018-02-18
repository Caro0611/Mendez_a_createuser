<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = trim($_POST['lvllist']);
		if(empty($lvllist)){
			$message = "please select a user level.";

		}else{
			$result = createUser($fname, $username, $password, $email, $lvllist);
			$message =$result;
		}

	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create user</title>
</head>
<body>
	<h2>Create user</h2>
	<?php if(empty($message)){echo $message;} ?>

<form action="admin_createuser.php" method="post">
	<label>First name: </label>
	<input type="text" name="fname" value="">
	<labe>username: </label>
	<input type="text" name="username" value="">
	<label>Pasword: </label>
	<input type="text" name="password" value="">
	<label>Email: </label>
	<input type="text" name="email" value="">
	<select name="lvllist">
		<option value="">Select User Level</option>
		<option value="2"> Web Admin</option>
		<option value="1">Web Master</option>
	</select>
	<input type="submit" name="submit" value="create user">
</form>

</body>
</html>
