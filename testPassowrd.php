<div id="divPasswd" style="position:absolute;">
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
            <input type="hidden" name="bid"size="10" value="<?=$id?>">
            <input type="hidden" name="id" size="10" value="">
            <img src="" style="cursor:hand" align="absmiddle" onClick="submit_Passwd(this);" WIDTH="57" HEIGHT="17">&nbsp;
            </td>
        </tr>
    </table>
</div>