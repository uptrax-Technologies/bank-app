<?php
$con = mysqli_connect("localhost","xtremev4_bankusa","bankdbpass","xtremev4_bankdb");
if(mysqli_connect_error())
{
	echo "Failed to connect to MySQL:".mysqli_connect_error();
}
?>