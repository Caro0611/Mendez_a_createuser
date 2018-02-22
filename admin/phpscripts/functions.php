<?php

	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

//this function will generate a random passsword. first it will get the number of characters of the password. tutorial A
	function new_password($number){
		$characters="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$password="";
		$aux=1;
		while($aux<=$number){
			//here we extract a random character from var $characters
			$password .= substr($characters,rand(0,strlen($characters)),1); //runing php substr (which substracts a character) function to get $password. tutorial B
			$aux++;
		}
		return $password;
	}


?>
