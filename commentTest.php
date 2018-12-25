<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

include "db_connect.php";


$query="select * from t_comment where bid ='$Uid' order by Uid desc";

//echo $Uid;

$result = $conn -> query($query);

?>

	<style type="text/css">
		
		input.inputera{
			font-family: Arial;
		    width:180px;
		    height: 30px;
 		  	 margin: auto;
  			  border: 1px dotted #73AD21;
  			  background-color: #f2f2E2;
  			  border-radius: 4px;
			}
		textarea.commentText{
			font-family: Arial;
			width:500px;
    		margin: auto;
    		border: 1px dotted #73AD21;
    		background-color: #f2f2E2;
    		border-radius: 4px;
    		height: 100%;
		}
		th{
			height:110%;
		}
		td{
			font-size: 20px;
			font-family: Arial;;
		}

		table.commentwindow{
			background-color: #f2f2E2;
			  border: 3px  none #73AD21;
			  width:600px;
			  height:50px;
		}
		input[type=submit]{
			width:100%;
		    background-color: #4CAF50A5;
    		color: white;
    		padding: 14px 20px;
   			 margin: 8px 0;
    		border: none;
   		 	border-radius: 4px;
   			 cursor: pointer;
		}
		table.comment-window{
			width: 780px;
			margin-top: 20px;
			margin-bottom: 20px;
			padding-bottom: 10px;
			padding-top: 10px;
			padding-left: 10px;
			background-color: #f2f2E2;
			font-family: Arial;
			border-top: 2px solid #73AD21A5;
			border-bottom: 2px solid #73AD21A5;


		}
		div.comments{
				background-color: #f2f2E2;
				margin: 20px 20px 20px 20px;
		}
		td.comment-name{
			border-right: 3px solid #4CAF50A5;
		}
		td.comment-content{
			padding-left: 10px;
		}
		input.comment-x{
		
		    background-color: #4CAF50A5;
    		color: white;
    		border: none;
   		 	border-radius: 4px;
   			 cursor: pointer;
		}
		td.comment-delete-pass{
			
			font-family: Arial;
			font-size: 16px;
			font-style: bold;
		}
		td.comment-delete-password{
			font-family: Arial;
			font-size: 20px
			padding-left:20px;

		}
		input.password-input{
			font-family: Arial;
		   		width:60%;
		   	 height: 30px;
 		  	 margin: auto;
  			  border: 1px dotted #73AD21;
  			  background-color: #f2f2E2;
  			  border-radius: 4px;
		}
		tr.comment-window-password{
			/*display: none;*/
			visibility: collapse;
		}


			</style>
<!DOCTYPE html>
<html>
<head>
	<title>Comment test</title>
</head>
<body>

<div class="comments">	
	
<?php
	 $cnt=0;
	while($row=$result->fetch_assoc()){

?>
<table class="comment-window" align="center">
<form action = "comment_delete.php" method="post">
	<tr>
			<td width="20%" class="comment-name"><?=$row['name']?></td>
			<td width="80%" class="comment-content"><?=$row['comment']?></td>
			<td><input type="button" id="xbtn" class="comment-x" value="x" onclick="deleteBtn(<?=$cnt++?>)">
			</td>
		</tr>
		<tr class="comment-window-password" id="passwindow">
			<td class="comment-delete-pass">Password</td>
			<td class="comment-delete-password"  ><input type="password" width="100%" class="password-input" name="pw"></td>
			<td><input type="submit" class="pass-submit" value="Delete"></td>
			<input type="hidden" name="uid" value="<?=$row["uid"]?>">
 	<input type="hidden" name="bid" value="<?=$Uid?>">
		</tr>
</form>
</table>
<?php
	}
	$conn->close();
?>
</table>



<div>
<form>
<table width = 600 border="0" cellpadding="1" bgcolor="#F1F8E0" >

</form>
</div>

	
	<form action='comment_write.php' method="post">
		<table align="center" class="commentwindow" >
		<input type="hidden" name= bid value='<?=$Uid?>'>
				<tr>
					<td>name</td>
					<td><input type="text" name="name" value ="id" class="inputera"></td>
					<th rowspan="2" width="200">
					<textarea rows="5" cols="60" class="commentText" name="content">This is comment area</textarea></th>
				</tr>

				<tr>
					<td>password</td>
					<td><input type="password" name="pass" value ="pass" class="inputera"></td>
					
				</tr>
				<th colspan="3">
						<input type="submit" name="" value="register">
				</th>
		</table>
		</form>

</div>

</body>
</html>
<script type="text/javascript">
var windowflag = "false"
var passwindow= document.getElementsByClassName("comment-window-password");
	function deleteBtn(no){
		if(windowflag==="false"){
			passwindow[no].style.visibility="visible";
			windowflag="true"	
		}else if(windowflag==="true"){
			passwindow[no].style.visibility="collapse"
			windowflag="false"
		}
	}

	// function show_window(obj){

	//  document.getElementById("xbtn").style.value="v";

	// var passwindow= document.getElementById("passwindow");
	// passwindow.style.visibility="visible";	
	// }

	// function hidden_window(obj){
	// var passwindow= document.getElementById();

	// }
</script>