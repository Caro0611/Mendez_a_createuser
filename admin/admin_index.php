<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
</head>
<body>
	<h2><?php echo $_SESSION['user_name'];?></h2>
	<a href="admin_createuser.php">Create user</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign out</a>
</body>
</html>
