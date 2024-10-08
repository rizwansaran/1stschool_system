<?php

$link = mysqli_connect('localhost:3306','stspak_school_admin','RIZWAN@09964','stspak_1stschool');
if(mysqli_error($link)){
	echo "DB Error";
	die();
}

?>