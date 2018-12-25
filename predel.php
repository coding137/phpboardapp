<?php
  @extract($_GET);
  @extract($_POST);
  @extract($_SERVER);

  include "db_connect.php";


?>  

<style>
  td, input{font-size:9pt}
  A:link {font-size:9pt; color:black; text-decoration: none; }
  A:visited{font-size:9pt; color:black; text-decoration: none; }
  A:hover{font-size:9pt; color:black; text-decoration: underline; }  


  	input[type=submit],input[type=reset],input[type=button]{
	
		    background-color: #4CAF50A5;
    		color: white;
    		padding: 5px 7px;
   			 margin: 8px 0;
    		border: none;
   		 	border-radius: 4px;
   			 cursor: pointer;
		}
			input[type=text],input[type=password]{
			font-family: Arial;
 		  	 margin: auto;
  			  border: 1px dotted #73AD21;
  			  border-radius: 4px;
	}
  html{
  		font-family: "Arial"
		background-color: #f2f2E2;
}
	table{
		border-radius: 10px;
		background-color: #f2f2E2;
		
	
		border: 2px solid #73AD21A5;
		/*margin: 0px 20px 0px 20px;*/

	}
	.top-line{

		background-color: #4CAF50A5;
	    border-radius: 9px 9px 0px 0px;

		}
	.bottom-line{
		border-radius: 9px;
	}
</style>
<center>
<br>

<br><br>
<form action=delete.php?Uid=<?=$Uid?> method=post>
<table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#336699>
	<tr>
		<td height=20 align=center class="top-line">
			<b><font color=#f2ffff>Password Check</font></b>
		</td>
	</tr>

	<tr bgcolor=#f2ffff>
		<td align=center class="bottom-line">
			Password
			<input type=password name=Pass size=10>
			<input type=submit value=' Permit '>
			<input type=button value=' Cancel ' onclick="history.back(1);" > 
		</td>
	</tr>
</table>
</form>
</center>

