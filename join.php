<script>
function data_check(){
		
	
	var x= document.getElementsByName("Id");
	var y= document.getElementsByName("Pass");
	

	var ch=x[0].value.charAt(0);
		




		if(!x[0].value){
		
	 
			alert("id를 입력 해주세요.");
			x[0].focus();
			return false;
	

	
		}
		else if(!('a'<=ch && ch<='z') && !('A'<=ch && ch<='Z')){
		alert("첫글자는 영문 대소문자만 허용합니다");
		x[0].focus();
		return false;
		
	}
		
		else if(!y[0].value) {
			alert("password를 입력해주세요");
			y[0].focus();
			return false;
		}


		return true;

			
};

function show_infor(){

	alert("bbb");
	var x= document.getElementsByName("Id");
	var y= document.getElementsByName("Pass");

alert(x[0].value);

	return false;
};


</script>

<form action='joinok.php' method=post onsubmit="return data_check()" name=join>
<table width=600 align=center border=1>
  <tr>
    <td align=center colspan=2 bgcolor="#eeeeee">회원가입
  <tr>
    <td>아이디
    <td><input type=text name="Id" size=10 maxlength=20>
  <tr>
    <td>비밀번호
    <td><input type=password name="Pass" size=10 maxlength=20>
  <tr>
    <td>이름
    <td><input type=text name="Name" size=10 maxlength=20>
  <tr>
    <td>이메일
    <td><input type=text name="Email" size=30 maxlength=30>
  <tr>
    <td>자기소개
    <td><textarea name="Memo" rows=6 cols=60></textarea>
  <tr>
    <td colspan=2><input type=submit value=' 가입하기 '>   
</table>
</form>