<?php


	function createUser($fname, $username, $email, $lvllist) {
		include('connect.php');
		include('config.php');

		$date_now=date('Y-m-d H:i');

		$pass_no_hash=new_password($caracteres_pass);
		$password=hash("sha256", $pass_no_hash); // password encryption using php function hash with sha256

		if(!findUser($username)){ // this will verify that the username is not already store in de db
		$userstring = "INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_date, user_level, user_ip)
		VALUES('{$fname}', '{$username}', '{$password}', '{$email}', '{$date_now}','{$lvllist}', 'no' )";  //I added the user_level
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring) or die(mysqli_error($link));
		if($userquery) {
			//redirect_to('admin_index.php');
			$send_email=sendEmail($username,$pass_no_hash,$email); // after creating new user in db calls the sendEmail function to send the email
			if($send_email){
			$message = "email sent";
			return $message;
			}else{
			$message = "email not sent, error";
			return $message;
			}
		}else{
			$message = "incorrect information";
			return $message;
		}
		}else{ // if the user is already in the db will display the following msg
			$message = "The user '$username' is already register in our database.";
			return $message;
		}
		mysqli_close($link);

	}


	function findUser($username){ // function to verify if the user already exist in the db


		include('connect.php');
		$userstring ="SELECT user_name from tbl_user where user_name='{$username}'";

		if (!$resultado = $link->query($userstring)) {
		    // if it fails
		    echo "sorry, we are having problems. \n";
		    exit;
		}
		if ($resultado->num_rows != 0) {
			return true;
		}else{
			return false;
		}
		mysqli_close($link);
	}

//send email function
	function sendEmail($username, $pass_no_hash, $email)
{
    $to = $email;
    $subject = "Message from Best Movies App - Registration";
    $body = "Username: " . $username . "\r\n";
    $body .= "Password: " . $password . "\r\n";
    $body .= "Login URL: http://localhost/admin/admin_login.php";
    $extra = "Reply-To: donotreply@email.com";
    echo $body;

}

?>
