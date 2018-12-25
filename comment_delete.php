<?php
  @extract($_GET);
  @extract($_POST);
  @extract($_SERVER);

  include "db_connect.php";

  $sql ="select pass from t_comment where uid=$uid && bid=$bid";

  $result=$conn->query($sql);
echo "sql : ".$sql;
echo "pass: ".$pw;
	
	if ($result) {
	
		$row=$result->fetch_assoc();


		if($row["pass"]!=$pw){
		
		echo "<script>alert('비밀번호 틀립니다');</script>";
		echo "<script>history.back(1);</script>";
		}else{
		
		$sql = "delete from t_comment where uid=$uid && bid=$bid";
		$conn->query($sql);
		echo "<script>alert('삭제 성공');</script>";
		echo "<script>location.href='list.php'</script>";
	
		}	

	}

?> 