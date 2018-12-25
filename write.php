<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>Write Page </title>
<style>
  td, input{font-size:9pt}

  html{
  		font-family: "Arial"
		background-color: #f2f2E2;
}
	table.read-view-table{
		border-radius: 10px;
		/*background-color: #f2f2E2;
		
	
		border: 2px solid #73AD21A5;*/
		margin: 0px 20px 0px 20px;

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
 
</head>
 
<script type="text/javascript" src="./js/HuskyEZCreator.js" charset="utf-8"></script>

<body>
    <center>
    <form action='writeok.php' method=post onsubmit= 'return check_data()'>
        <table width=900 cellpadding=2 cellspacing=1 class="read-view-table">
          <tr>
            <td align=center height=20 class="top-line"><font color="#f2ffff">Write Page</font></td>
          </tr>
          <tr>
            <td >
               <table width="100%">
                  <tr>
                    <td align=right width="100">Name</td>
                    <td align=left><input type=text name='Name' size=20 maxlength=10>(Do not use special characters)</td>
                  </tr>
                  <tr>
                    <td align=right>Email</td>
                    <td align=left><input type=text name='Email' size=20 maxlength=30>(Do not use special characters)</td>
                  </tr>
                  <tr>
                    <td align=right>Password</td>
                    <td align=left><input type=password name='Pass' size=20 maxlength=10> (Must need password when you modify or delete your post )</td>
                  </tr>
                  <tr>
                    <td align=right>Topic</td>
                    <td align=left><input type=text name='Subject' size=70 maxlength=40>(Do not use special characters)</td>
                  </tr>
                  <tr>
                    <td align=right>Contents</td>
                    <td align=left><textarea name="Memo" id="ir1" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan=2 align=center height=30>
                    <input type=submit value=' Done ' onclick='check_data(this);'>&nbsp;&nbsp;
                    <input type=reset value=' Reset '>&nbsp;&nbsp;
                    <input type=button value=' Back ' onclick="history.back(1)">
                    </td>
                  </tr>
 
               </table>
             </td>
           </tr>
        </table>
    </form>
    </center>
</body>

<script>
function check_data(obj){

	var Name= document.getElementsByName('Name');
	var Pass= document.getElementsByName("Pass");
	var Email= document.getElementsByName("Email");
	var Subject = document.getElementsByName("Subject");
	var Memo= document.getElementsByName("Memo");

	var ch=Name[0].value.charAt(0);
		
	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
	

		if(!Name[0].value){
			alert("Name 입력 해주세요.");
			Name[0].focus();	
			return false;
	}
		else if(!('a'<=ch && ch<='z') && !('A'<=ch && ch<='Z')){
		alert("첫글자는 영문 대소문자만 허용합니다");
		Name[0].focus();
		return false;
		
	}	
		else if(!Pass[0].value) {
			alert("password를 입력해주세요");
			Pass[0].focus();
			return false;
		}

	else if (!Subject[0].value){
		alert("Subject를 입력해주시길 바랍니다.");
		Subject[0].focus();
		return false;
	} else if (!Email[0].value){
		alert("Email를 입력해주시길 바랍니다.");
		Email[0].focus();
		return false;
	} else if (!Memo[0].value){
		alert("Memo를 입력해주시길 바랍니다.");
		Memo[0].focus();
		return false;
	} 
	
	


		return true;
};


var oEditors = [];

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["ir1"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["ir1"].getIR();
	alert(sHTML);
}
	
function submitContents(elClickedObj) {
	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
	
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
	
	/*try {
		elClickedObj.form.submit();
	} catch(e) {}*/
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
}


</script>

</html>
