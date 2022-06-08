<?php
include 'connect.php';

echo"hello";

extract($_POST);

if(isset($_POST['namesend'])  && isset($_POST['emailsend']) && isset($_POST['mobilesend']) && isset($_POST['placesend'])){
    $sql = "INSERT into `crud`(name,email,mobile,place) VALUES ('$namesend','$emailsend','$mobilesend','$placesend')";

    $result=mysqli_query($con,$sql);
}

?>