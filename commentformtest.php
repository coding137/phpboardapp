
<!DOCTYPE html>
<html>
<head>
	<title>comment test form</title>
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
</head>
<body>
<!-- comments  입니다. -->
<div class="comments">	
	<table class="comment-window" align="center">
		<tr>
			<td width="20%" class="comment-name">this is my name</td>
			<td width="80%" class="comment-content">this is my comment</td>
			<td><input type="button" id="xbtn" class="comment-x" value="x" onclick="deleteBtn()">
			</td>
		</tr>
		<tr class="comment-window-password" id="passwindow">
			<td class="comment-delete-pass">Password</td>
			<td class="comment-delete-password"  ><input type="password" width="100%" class="password-input"></td>
			<td><input type="submit" class="pass-submit" value="Delete"></td>

		</tr>
	</table>
		<table class="comment-window" align="center">
		<tr>
			<td width="20%" class="comment-name">this is my name</td>
			<td width="80%" class="comment-content">this is my comment</td>
			<td><input type="button" id="xbtn" class="comment-x" value="x" onclick="deleteBtn()">
			</td>
		</tr>
		<tr class="comment-window-password" id="passwindow">
			<td class="comment-delete-pass">Password</td>
			<td class="comment-delete-password"  ><input type="password" width="100%" class="password-input"></td>
			<td><input type="submit" class="pass-submit" value="Delete"></td>

		</tr>
	</table>
	<!-- comment 입력 창입니다.  -->
		<form>
		<table align="center" class="commentwindow">
				<tr>
					<td>name</td>
					<td><input type="text" name="name" value ="id" class="inputera"></td>
					<th rowspan="2" width="200">
					<textarea class="commentText">This is comment area</textarea>
					</th>
				</tr>

				<tr>
					<td>password</td>
					<td><input type="password" name="pw" value ="pass" class="inputera"></td>
					
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
var passwindow= document.getElementById("passwindow");
	function deleteBtn(obj){
		if(windowflag==="false"){
			passwindow.style.visibility="visible";
			windowflag="true"	
		}else if(windowflag==="true"){
			passwindow.style.visibility="collapse"
			windowflag="false"
		}
	}


</script>