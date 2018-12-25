<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);



include "db_connect.php";


$sql = "INSERT INTO T_Board (Name, Email, Pass, Subject, Memo, RegDate, Ip, ViewCount)
	VALUES ('$Name', '$Email', '$Pass','$Subject','$Memo',now(),'$REMOTE_ADDR',0)";

//echo $sql;


	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('글쓰기 성공')</script>";
	} else {
		echo "<script>alert('글쓰기 실패')</script>";
	}

	$conn->close();

/*
	echo("<meta http-equiv='Refresh' content ='1; URL=write.php'>");
*/

?>

	<script>
	location.href='list.php';
	</script>