<?php

$con = new mysqli('localhost', 'root' , '' ,'bootsrapcrud');

if(!$con){
    die(mysqli_error($con));
}

?>