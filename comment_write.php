<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);



include "db_connect.php";

   $ip_address = $_SERVER["REMOTE_ADDR"];

echo "ip. : ".$ip_address;
$query = "INSERT into t_comment(bid,name,pass,comment,ip,date) values($bid,'$name','$pass','$content','$ip_address',now())";
echo"query : ".$date."<br>";

// $reuslt = $conn->query($query);
echo "bid : ".$bid."<br>";
// header("location:$HTTP_REFERER");

if($conn->query($query) === true){
echo"<script>alert('글쓰기 성공')</script>";

}else{
echo"<script>alert('글쓰기 실패')</script>";
}

$conn ->close();


?>
