<?php
$conn=new mysqli("localhost","root", "", "spp-bayar");
$query=mysqli_query($conn,"select * from users");
$data=mysqli_fetch_all($query,MYSQLI_ASSOC);
echo json_encode($data);

?>