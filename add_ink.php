<?php

$connect = mysqli_connect("localhost","root","","ss_inventory");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$data = json_decode(file_get_contents("php://input"));
if(count($data)>0){


     
    $ink_name=mysqli_real_escape_string($connect,$data->ink_name);
    $raw_material = mysqli_real_escape_string($connect,$data->raw_material);
    $quantity=mysqli_real_escape_string($connect,$data->quantity);
    $query = "INSERT INTO ss_ink(INK_NAME, RM_NAME, RM_QUANTITY) VALUES ('$ink_name','$raw_material', '$quantity')";

    if(mysqli_query($connect,$query)){
        echo "data inserted...";
      
    }
    else{
        echo "Error....";
    }
}
mysqli_close($connect);
?>