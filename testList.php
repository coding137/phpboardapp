<script>

</script>

//2016-02-22

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

<style>
  td, input{font-size:9pt}
  A:link {font-size:9pt; color:black; text-decoration: none; }
  A:visited{font-size:9pt; color:black; text-decoration: none; }
  A:hover{font-size:9pt; color:black; text-decoration: underline; }
  
</style>
<center>
<br>
⊙&nbsp;&nbsp;<font size=5 face="" color=#aa3366><b>PHP MySQL 기본게시판 - 목록</b></font>&nbsp;&nbsp;⊙ 
<br><br>
<table width=600 border=0 cellpadding=2 cellspacing=1 bgcolor=#336699>
  <tr bgclor=#336699>
    <td align=center width=30><font color=#f2ffff>번호</font></td> 
    <td align=center width=380><font color=#f2ffff>제목</font></td>
    <td align=center width=50><font color=#f2ffff>글쓴이</font></td>
    <td align=center width=90><font color=#f2ffff>날짜</font></td>
    <td align=center width=50><font color=#f2ffff>조회수</font></td>
   </tr>

<?php
    while($row=$result->fetch_assoc()){
?>
  <tr>
    <td style= bgcolor="#f2ffff" align=center><a href="read.php?Uid=<?=$row["Uid"]?>"><?=$row["Uid"]?></a></td>
    <td bgcolor="#f2ffff" align=center><a onclick="reloadPage(<?=$row["Uid"]?>)"><?=strip_tags($row["Subject"],'<b><i>');?></a></td>
    <td bgcolor="#ffffff" align=center><?=$row["Name"]?></td>
    <td bgcolor="#f2ffff" align=center><?= substr($row["RegDate"],0,10)?></td>
    <td bgcolor="#f2ffff" align=center><?=$row["ViewCount"]?></td>
   </tr>


<?php
    }
?>
</table>
<table>
<tr width = 600 border = 0 cellpadding = 2 cellspacing = 1 bgcolor="#ffff00">
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
</tr>
</table>

      <form name= search method="get" action="<?=$PHP_SELF?>">
        <select name = field>
          <option value = subject>제목</option>
          <option value = name>글쓴이</option>
          <option value = memo>내용</option>
        </select>
        <input type="text" name="search_word" size=20><input type="submit" value="검색">
      </form>
<br> <a href=write.php><글쓰기></a> 
</center>

<script type="text/javascript">
  function reloadPage(uid) {
    // body...
    var url="commentformtest.php";
      window.location.assign(url)
  }

</script>