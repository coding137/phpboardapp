<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

include "db_connect.php";

$sql = "SELECT * from T_Board where Uid=$Uid";

//echo $sql;


$result=$conn->query($sql);

	if ($result) {
	
		$row=$result->fetch_assoc();

	}

?>



<style>
 td, input{font-size:9pt}
   html{
  		font-family: "Arial"
		background-color: #f2f2E2;
}
 	input[type=text],input[type=password]{
			font-family: Arial;
 		  	 margin: auto;
  			  border: 1px dotted #73AD21;
  			  border-radius: 4px;
	}
			input[type=submit],input[type=reset],input[type=button]{
	
		    background-color: #4CAF50A5;
    		color: white;
    		padding: 5px 7px;
   			 margin: 8px 0;
    		border: none;
   		 	border-radius: 4px;
   			 cursor: pointer;
		}
				.top-line{

		    background-color: #4CAF50A5;
		     border-radius: 9px 9px 0px 0px;
		     border-top: 
		}
</style>
<center>

<form action="editok.php?Uid=<?=$row["Uid"]?>" method=post >
	<table width=600 cellpadding=2 cellspacing=1 class="read-view-table">
		<tr>
			<td align=center height=20 class="top-line"><font color="#f2ffff">Edit Page</font>
		</tr>
		<tr>
			<td bgcolor=#f2ffff>
				<table width="100%">
					<tr>
						<td align=right width="100">Name&nbsp;&nbsp;
						<td><input type=text name=Name size=20 maxlength=10 value="<?=$row["Name"]?>">
					</tr>
					<tr>
						<td align=right>Email&nbsp;&nbsp;
						<td><input type=text name=Email size=20 maxlength=30 value="<?=$row["Email"]?>">
						</tr>
					<tr>
						<td align=right>Password&nbsp;&nbsp;
						<td><input type=password name=Pass size=20 maxlength=10> 
(You need to match your password to edit it.)
					</tr>
					<tr>
						<td align=right>Topic&nbsp;&nbsp;
						<td><input type=text name=Subject size=70 maxlength=40 value="<?=$row["Subject"]?>">
					</tr>
					<tr>
						<td align=right>Contents&nbsp;&nbsp;
						<td><textarea name=Memo cols=50 rows=15 ><?=$row["Memo"]?></textarea>
					</tr>
					<tr>
						<td colspan=2 align=center height=30><input type=submit value=' 저장하기 '>
							&nbsp;&nbsp;<input type=reset value=' 다시쓰기 '>
							&nbsp;&nbsp;<input type=button value=' 이전 ' onclick="history.back(1)">
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
</center>

