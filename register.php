<?php
$db = mysqli_connect('localhost','root','','spp-bayar');
if(!$db)
{
    echo "Database connection failed";
}
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT email FROM users WHERE email = '".$email."'";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
    echo json_encode("Error");
}else{
    $insert = "INSERT INTO users(email,password) VALUES ('".$email."','".$password."')";
        $query = mysqli_query($db,$insert);
        if($query){
            echo json_encode("Success");
        }
}
?>