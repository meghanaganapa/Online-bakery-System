<?php
$sername="localhost";
$username="root";
$password="";
$db="sample";
$con=mysqli_connect($sername,$username,$password,$db);
if(!$con)
{
    die("Connection failed".mysqli_connect_error());
}

?>