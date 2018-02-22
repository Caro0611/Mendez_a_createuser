<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_POST['fname'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);

		$email = trim($_POST['email']);
		$lvllist = trim($_POST['lvllist']);

		if(empty($lvllist)){
			$message = "please select a user level.";

		} else if(empty($username)){
			$message = "please fill 'username'.";
		}else if(empty($email)){
			$message = "please fill 'email'.";
		}else{
			$result = createUser($fname, $username, $email, $lvllist);
			$message =$result;
		}

	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/main.css">
<title>Create user</title>
</head>
<body>

	<?php if(isset($message)){echo $message;} ?>
<div id="container2">
	<h2 class="title">Create user</h2>
<form action="admin_createuser.php" method="post">
	<label class="hidden">First name: </label>
	<input type="text" name="fname" placeholder="First name" value="">
	<label class="hidden">username: </label>
	<input type="text" name="username" placeholder="username" value="">
	<label class="hidden">Email: </label>
	<input type="text" name="email" placeholder="email" value="">
	<div id="options">
	<select name="lvllist" id="userLevel">
		<option value="">Select User Level</option>
		<option value="2"> Web Admin</option>
		<option value="1">Web Master</option>
	</select>
</div>
	<input type="submit" name="submit" value="create user" class="button">
</form>
</div>
</body>
</html>
