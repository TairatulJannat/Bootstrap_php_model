<?php
include 'connect.php';

if(isset($_POST['Deletesend'])){
    $unique = $_POST['Deletesend'];

    $sql = "delete from `crud` where id= $unique";
    $result = mysqli_query($con,$sql);
}

?>