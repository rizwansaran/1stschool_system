<?php
require 'php/config.php';
if(isLoggedIn()){
	session_destroy();	
}
	header("location:https://sis.ssppak.com/1stschoolsystem");
?>