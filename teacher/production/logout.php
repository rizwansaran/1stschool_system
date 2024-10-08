<?php
require 'php/config.php';
if(isLoggedIn()){
	session_destroy();	
}
	header("location:http://1stschoolsystem.ssppak.com/");
?>