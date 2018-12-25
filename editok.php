
<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);



include "db_connect.php";

$sql ="select Pass from t_board where Uid=$Uid";

//echo $sql;

$result=$conn->query($sql);

	if ($result) {
	
		$row=$result->fetch_assoc();


		if($row["Pass"]!=$Pass){
		
		echo "<script>alert('다릅니다')</script>";
		echo "<script>history.back(1);</script>";
		
		}else{

		$sql =  "UPDATE  T_Board set Name='$Name', Email='$Email',  Subject='$Subject', Memo='$Memo' where Uid=$Uid";
		//echo $sql;
		$result=$conn->query($sql);

		if ($result) {
			echo "<script>alert('update 성공')</script>";
			echo "<script>location.href='read.php?Uid=$Uid'</script>";
			
		} else {
			echo "<script>alert('update 실패')</script>";
		
		}

}

	}

?>
