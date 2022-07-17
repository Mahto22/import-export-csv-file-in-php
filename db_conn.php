<?php

// database connectivity
$conn = mysqli_connect('localhost','root','','csv_data');

if(!$conn){
	echo mysqli_error('Database not connect');
}
// else{
// 	echo 'connected';
// }
?>