<?php
include 'connect.php';

if(isset($_POST['displaysend'])){
    $table = '<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SL No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Place</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';
    $sql = "SELECT * From `crud`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    while($row = mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $name= $row['name'];
        $email= $row['email'];
        $mobile= $row['mobile'];
        $place= $row['place'];
        $table.='<tr>
        <th scope="row">'.$number.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'. $mobile.'</td>
        <td>'. $place.'</td>
        <td class="btn btn-dark btn-sm" style=" margin-right: 10px" onclick="getupdateuser('.$id.')">Update</td>
        <td class="btn btn-danger btn-sm" onclick="Deleteuser('.$id.')">Delete</td>
      </tr>';
      $number++;
    }
    $table .= '</table>';
    echo $table;
}

?>