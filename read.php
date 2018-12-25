<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

include "db_connect.php";

/*번호	제목	글쓴이	날짜	조회수*/


$sql = "SELECT * from T_Board where Uid=$Uid";

//echo $sql;


$result=$conn->query($sql);


	if ($result) {
	
		$row=$result->fetch_assoc();

	} else {
		echo "<script>alert('read 실패')</script>";
		
		echo "<script>history.back(1)</script>";	
		return false;
	

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
a:link {
  text-decoration: none;
  color: #73AD21;
}

a:visited {
  text-decoration: none;
    color: #73AD21;
}

a:hover {
  text-decoration: none;
    color: #73AD21;
}

a:active {
  text-decoration: underline; 
   color: #73AD21;
}
html{
		background-color: #f2f2E2;
}
	div.read-view-container{
		background-color: #f2f2E2;
		width: 100%;
		 color: #73AD21;

	}
	table.read-view-table{
		border-radius: 10px;
		background-color: #f2f2E2;
		
		width: 780px;
		height: 600px;
		border: 2px solid #73AD21A5;
		margin: 0px 20px 0px 20px;

	}
	li.read-menu-item{
		list-style-type:none;
		display: block;
		align-items: horizontal;
		float:left;
		margin-left: 10px;
		font-family: Arial;
		font-size: 14px;
	}
	td.read-menu-window{
		float: right
	}
	td.read-view-contents{
		border-bottom:  2px dotted #73AD21A5; 
	}

	
</style>

</head>
<body>

<div class="read-view-container" align="center" >
<table class="read-view-table" >

	<tr  height="10%" >
		<td   class="read-view-contents" >
			<h2 align="center"><?=$row["Subject"]?></h2>
		</td>

	</tr>
	<tr  >
		<td  class="read-view-contents" height="30px">
			<b><?=$row["Name"]?></b><b> [<?=$row["Email"]?>]</b>
		</td>

	</tr>

	<tr>
		<td colspan="3" class="read-view-contents" align="center"  height="90%">
		<pre><?=$row["Memo"]?></pre>
		</td>
	</tr>
	<tr heigiht="5%">
		<td class="read-menu-window">
			<ul class="read-menu" >

<?php
  $n_result=$conn->query("select Uid from t_board where Uid>$Uid limit 1");
		   $n_row=$n_result->fetch_assoc();
		   if($n_row){
		  $next="read.php?Uid=$n_row[Uid]";
		  	
?>			
		
				<li class="read-menu-item"><a href=<?=$next?>>Next</a></li>
		<?php
 			}
			

		?>
				<li class="read-menu-item"><a href=list.php>List</a></li>
				<li class="read-menu-item"> <a href=edit.php?Uid=<?=$Uid?>>Edit</a></li>
				<li class="read-menu-item"><a href=predel.php?Uid=<?=$Uid?>>Delete</a></li>
			<?php
				$b_result=$conn->query("select Uid from t_board where Uid<$Uid order by Uid desc limit 1");
		    $b_row=$b_result->fetch_assoc();
			
			if($b_row){
				$prev="read.php?Uid=$b_row[Uid]";
			?>
				<li class="read-menu-item"><a href=<?=$prev?>>Prev</a></li>
	<?php
		}
	?>
			</ul>				
		</td>
	</tr>

</table>
</div>



<?php
	$conn->query("update t_board set viewcount= viewcount+1 where Uid=$Uid");


	$conn->close();

?>

<?php
include 'commentTest.php'
?>

</body>
</html>