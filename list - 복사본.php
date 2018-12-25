<script>

</script>

<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

include "db_connect.php";

/*번호	제목	글쓴이	날짜	조회수*/
$sql = "SELECT * from T_Board order by Uid desc";

$result=$conn->query($sql);
?>
<style>
  td, input{font-size:9pt}
  A:link {font-size:9pt; color:black; text-decoration: none; }
  A:visited{font-size:9pt; color:black; text-decoration: none; }
  A:hover{font-size:9pt; color:black; text-decoration: underline; }
  
</style>
<center>
<br>
⊙&nbsp;&nbsp;<font size=5 face="sj소주2" color=#aa3366><b>PHP MySQL 기본게시판 - 목록</b></font>&nbsp;&nbsp;⊙ 
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
    <td bgcolor="#f2ffff" align=center><a href="read.php?Uid=<?=$row["Uid"]?>"><?=$row["Uid"]?></a></td>
    <td bgcolor="#f2ffff" align=center><a href="read.php?Uid=<?=$row["Uid"]?>"><?=strip_tags($row["Subject"],'<b><i>');?></a></td>
    <td bgcolor="#f2ffff" align=center><?=$row["Name"]?></td>
    <td bgcolor="#f2ffff" align=center><?= substr($row["RegDate"],0,10)?></td>
    <td bgcolor="#f2ffff" align=center><?=$row["ViewCount"]?></td>
   </tr>
<?php
	}
$conn->close();
?>


</table>
<br> <a href=write.php><글쓰기></a> 
</center>

