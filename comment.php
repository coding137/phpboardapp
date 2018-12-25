<script language="javascript">

function showPassword(ob){
var x,y;

    x = (document.body.offsetWidth-200)/2 + document.body.scrollLeft;
    y = (document.body.offsetHeight)/2 + document.body.scrollTop;

    document.all.divPasswd.style.top = y;
     document.all.divPasswd.style.left = x;

    document.all.divPasswd.style.display="block"
    document.pwForm.id.value=ob;
    document.pwForm.passwd.focus();        
}

function submit_Passwd()
{
    var val = document.pwForm.passwd.value;
    if (CheckStr(val, " ", "")==0) 
    {
      alert("패스워드를 입력해 주세요");
      document.pwForm.passwd.value="";
      document.pwForm.passwd.focus();
      return;
    }
        
    document.pwForm.submit();
}
function CheckStr(strOriginal, strFind, strChange){
    var position, strOri_Length;
    position = strOriginal.indexOf(strFind);  
    
    while (position != -1){
      strOriginal = strOriginal.replace(strFind, strChange);
      position    = strOriginal.indexOf(strFind);
    }
  
    strOri_Length = strOriginal.length;
    return strOri_Length;
}
</script>
<?php
    include "db_connect.php";


    $sql_cmt = " select Uid,name,comment,ip from t_comment where bid = 282";
    $result_cmt = $conn -> query($sql_cmt);
    while($row_cmt=$result_cmt->fetch_assoc()) {
        $str = $row_cmt[comment];
        $comment = strip_tags($str,"");
        $str = $row_cmt[name];
        $name = strip_tags($str,"");

//커멘트 리스트
?>
<table width=100% border=0 align=center cellpadding=0 cellspacing=1 style="border-width:1; border-color:rgb(204,204,204); border-style:dotted;">
<tr bgcolor=F0F0F0 >
    <td >
        <table width=100%>
        <col width=10></col>
        <col width=60 align=left></col>
        <col width=5></col>
        <col width=2></col>
        <col width=4></col>
        <col width=''></col>
        <col width=99></col>
        <col width=10></col>
        <tr >
            <td></td>
            <td valign=top style='word-break:break-all;'><?=$name?></td>
            <td></td>
            <td bgcolor=#aabbcc></td>
            <td></td>
            <td valign=top style='word-break:break-all; text-align:justify; line-height:150%;'><?=nl2br($comment)?></td>
            <td valign=top align=right>
             
                <a href="javascript:showPassword(<?=$row_cmt[Uid]?>);">x</a>
                </span>
            </td>
            <td></td>
        </tr>
        </table>
    </td>
</tr>
</table>
<?php
//-- END

    }

// 코멘트 입력
?>

<table width=100% align=center border=0 cellpadding=3 cellspacing=1 style="border-width:1; border-color:rgb(204,204,204); border-style:dotted;" >
<tr>
    <td bgcolor=#f0f0f0>
        <table width=100% cellpadding=3 cellspacing=0>
        <form  name=comment_insert method=post action='comment_insert.php'>
        <input type=hidden name=bid value='<?=$id?>'>
        <col width=80 align=center ></col>
        <col width='' align=center ></col>
        <col width=70 align=center></col>
        <tr>
            <td>
                이름 <BR><input type=text name=name size=10 style="font-family:verdana;font-size:97%; color:#000000; background-color:#f0f0f0"><br>
                비밀번호<br><input type=password name=passwd size=10 style="font-family:verdana;font-size:97%; color:#000000; background-color:#f0f0f0">
                </span>
            </td>
            <td valign=bottom><textarea name=comment rows=5 style='width:100%; line-height:150%;' style="font-family:verdana;font-size:97%; color:#000000; background-color:#f0f0f0"></textarea></td>
            <td><input type=submit value=' 등 록 ' style="font-family:verdana;font-size:97%;"></td>
        </tr>
        </form>
        </table>
    </td>
</tr>
</table>

<!--  패스워드 창 -->
<div id="divPasswd" style="display:none;position:absolute;">
<form name="pwForm" method="post" action="comment_delete.php">
    <table width=260 cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr height="18">
            <td align="left" style="padding-left:56;"><font color=white>패스워드를 입력하세요.</td>
            <td align=right  style="padding-right:5;">    <img src="/images/x.gif" style="cursor:hand" onClick="javascript:document.all.divPasswd.style.display='none';" WIDTH="12" HEIGHT="11">
            </td>
        </tr>
        <tr>    
            <td bgcolor="white" colspan=2 style="padding-left:30;padding-right:30;padding-bottom:10;padding-top:5">
            <input name="passwd" class="verdana" type="password" style="width:120; height:18; padding:2; border:1 solid slategray">  
            <input type="hidden" name="bid" size="10" value="<?=$id?>">
            <input type="hidden" name="id" size="10" value="">
            <img src="/images/submit.gif" style="cursor:hand" align="absmiddle" onClick="submit_Passwd(this);" WIDTH="57" HEIGHT="17">&nbsp;
            </td>
        </tr>
    </table>
</div>
</form>
</div><!-- 패스워드 창 -->
