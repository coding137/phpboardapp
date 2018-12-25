<?php
  @extract($_GET);
  @extract($_POST);
  @extract($_SERVER);

  include "db_connect.php";

  $sql ="select Pass from t_board where Uid=$Uid";


  $result=$conn->query($sql);

	
	if ($result) {
	
		$row=$result->fetch_assoc();


		if($row["Pass"]!=$Pass){
		
		echo "<script>alert('비밀번호 틀립니다');</script>";
		echo "<script>history.back(1);</script>";
		}else{
		
		$sql = "delete from t_board where Uid=$Uid";
		$conn->query($sql);
		echo "<script>alert('삭제 성공');</script>";
		echo "<script>location.href='list.php'</script>";
	
		}	

	}

?>  