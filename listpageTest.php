<?php

@extract($_GET);
@extract($_POST);
@extract($_SERVER);
$page_size=10;
$block_size=5;

include "db_connect.php";


if(!$no || $no<0)
$no=0;// 처음 접속할 때 보여줄 게시글 즉, 가장 최근 게시글부터 보여주기 위한 코드입니다.


//검색을 위한 add query
if ($_GET[search_word]!="") $add_query = " where $_GET[field] like '%" . $_GET[search_word] . "%' ";



$query="SELECT * FROM t_board ".$add_query."order by Uid desc Limit $no, $page_size";
echo $query;
$result=$conn->query($query);//result 에는 xxx rows in set (0.00 sec) 이런 것이 들어가 있다.
                 //%conn->query($query);를 해도 무방하다
// 총 게시물 수를 구한다.
$query="SELECT COUNT(*) total from t_board";
$result_count=$conn->query($query);
$result_row=$result_count->fetch_assoc();
$total_row=$result_row["total"];

//총 페이지 계산
if($total_row<=0)$total_row=0;
$total_page =ceil($total_row/$page_size);
echo "<br>total_page:".$total_page;
//토탈 블럭 계산
$total_block= ceil($total_page/$block_size);

//현재 block 계산
if(!$current_block || $current_block<0)$current_block=0;
//현재 페이지 계산
$current_page =ceil(($no)/$page_size);
$current_block = floor($current_page/$block_size);
$start_page = $current_block*$block_size;
$end_page = $start_page + ($block_size-1);


$next_block_page_no = $block_size*$page_size*($current_block+1); 
$prev_block_page = $block_size*$page_size*($current_block-1); 
echo "<br>current block:".$current_block;
echo "<br>next_block_page_no: ".$next_block_page_no;
echo "<br>total_block: ".$total_block;
echo "<br>total_page: ".$total_page;
echo "<br>start_page: ".$start_page;
echo "<br>end_page: ".$end_page;
echo "<br> no : ".$no;
?>

<style type="text/css">
		th{
		background-color:  #73AD2122;	
		margin-top: 20px;
		text-align: center;
		font-family: Arial;
		font-size: 20px;
		font-weight: 800;
		border-bottom: 2px solid #73AD21;
		  color: #404040;
}
			margin-bottom: 10px;
			padding-bottom: 5px;

		
		}
		tr{
			text-align: center;
			font-family: Monospace;
			font-size: 15px;
			font-weight: 500;


		}
		table.board{
			border-collapse: collapse;
			width: 70%;
		}
		div.board-container{
			width: 100%;
			margin-top: 30px;
		}

	table.table-menu-row{
		background-color:  #73AD2122;	
		margin-top: 20px;
		text-align: center;
		font-family: Arial;
		font-size: 20px;
		font-weight: bold;
		border-bottom: 2px solid #73AD21;
	}
	table.table-contents-row{
			
		margin-top: 10px;
		text-align: center;
		font-family: sans-serif;
		font-size: 15px;
		margin-bottom: 5px;
	}
	li.board-idx{
			list-style: none;
			font-family: Arial;
			font-size: 14px;
			margin-left: 10px;
			display: inline-block;
			align-items: horizontal;
				font-weight: bold;

			
	}
	ul{
		width: 100%;

	}
		input.inputera{
			font-family: Arial;
		    width:180px;
		    height: 30px;
 		  	 margin: auto;
  			  border: 1px dotted #73AD21;
  			  background-color: #f2f2E2;
  			  border-radius: 4px;
			}
				input[type=submit]{
		
			 background-color: #4CAF50A5;
    		color: white;
    		padding: 5px 5px;
   			 margin-left: 5px;
    		border: none;
   		 	border-radius: 4px;
   			 cursor: pointer;
		}
	select.search-select{
			  border: 1px dotted #73AD21;
  			  background-color: #f2f2E2;
  			  border-radius: 4px;
  			  margin-top: 20px;
	}
	div.search-div{
			margin-top: 40px;
	}
	td{
		 color: #505050;
	}
	a{ color: #808080;
		font-family: helvetica;
	}
a:link {
  text-decoration: none;
color: #505050;
}

a:visited {
  text-decoration: none;
color: #505050;
}

a:hover {
  text-decoration: none;
     color: #b0b0b0;
}

a:active {
  text-decoration: underline; 
  color: #b0b0b0;

}

</style>
<!DOCTYPE html>
<html>
<head>
	<title>List Page</title>
</head>
<body>
	<div class="board-container" >
			<table class="board" align="center" border=0 cellpadding=2 cellspacing=1>
				<tr>
					<th width="10%">No</th>
					<th width="40%">Topic</th>
					<th width="20%">Writer</th>
					<th width="20%">Date</th>
					<th width="10%">Views</th>
				</tr>
				<?php
    while($row=$result->fetch_assoc()){
?>
  <tr>
    <td style= bgcolor="#f2ffff" align=center><a href="readpageTest.php?Uid=<?=$row["Uid"]?>"><?=$row["Uid"]?></a></td>
    <td bgcolor="#f2ffff" align=center><a href="readpageTest.php?Uid=<?=$row["Uid"]?>"><?=strip_tags($row["Subject"],'<b><i>');?></a></td>
    <td bgcolor="#ffffff" align=center><?=$row["Name"]?></td>
    <td bgcolor="#f2ffff" align=center><?= substr($row["RegDate"],0,10)?></td>
    <td bgcolor="#f2ffff" align=center><?=$row["ViewCount"]?></td>
   </tr>
				<?php
    }
?>		
			</table>
<!-- seraching -->
			<div class="search-div" align="center">
			 <form name= search method="get" action="<?=$PHP_SELF?>">
      
			   <select name = field name="search-select">
    		   <option value = subject>제목</option>
     		   <option value = name>글쓴이</option>
   		       <option value = memo>내용</option>
   			   </select>
       			 <input type="text" name="search_word" size=20  class="inputera"><input type="submit" value="검색">
       		</form>
			</div>

			<div align="center" class="idx-div">

				<table style="margin-top:">
			<?php

        if($current_block>0)
          echo "<td><a bgcolor='blue' a href='$PHP_SELF?no=".$prev_block_page."'>prev</a><td>";
       
        for($i = $start_page; $i<=$end_page;$i++){
                       echo ($i<$total_page)? "<td><a href='$PHP_SELF?no=".($i*$page_size)."&field=$_GET[field]&search_word=$_GET[search_word]' color='red' bgcolor='F2f2f2' align='center'>".($i+1)."</a></td>" : "" ;
        }

        echo ($next_block_page_no<=$total_row)? "<td><a bgcolor='blue'a href='$PHP_SELF?no=".$next_block_page_no."' color='red' bgcolor='#F2f2f2' align='center'>next</a><td>":"<td></td>";

// echo "<br>start_page".$start_page;
// echo "<br>end_page".$end_page;
// echo "<br>current_page".$current_page;
$conn->close();
          
?>

				</table>	
			</div>
	

	</div>
</body>
</html>

		<!-- 
<table width="1000px" >
			<tr class="table-menu-row">
				<td width="10%" class="table-menu-row">No<td/>
				<td width="40%" class="table-menu-row">Topic<td/>
				<td width="20%" class="table-menu-row">Writer<td/>
				<td width="20%" class="table-menu-row">Date<td/>
				<td width="15%" class="table-menu-row">View<td/>
			<tr>
			<tr class="table-row">
				<td width="10%">2<td/>
				<td width="40%" >test<td/>
				<td width="20%" class="table-row">admin<td/>
				<td width="20%" class="table-row">2000-00-00<td/>
				<td width="15%" class="table-row">100<td/>
			<tr>
			<tr class="table-row">
				<td width="10%">3<td/>
				<td width="40%" >test<td/>
				<td width="20%" class="table-row">admin<td/>
				<td width="20%" class="table-row">2000-00-00<td/>
				<td width="15%" class="table-row">100<td/>
			<tr>
			<tr class="table-row">
				<td width="10%">1<td/>
				<td width="40%" >test<td/>
				<td width="20%" class="table-row">admin<td/>
				<td width="20%" class="table-row">2000-00-00<td/>
				<td width="15%" class="table-row">100<td/>
			<tr>
		
			
			
		</table> -->		