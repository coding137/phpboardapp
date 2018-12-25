<?php
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

include "db_connect.php";

/*번호	제목	글쓴이	날짜	조회수*/

$sql = "insert into t_board (Name, Pass, Email, Subject, Memo, ViewCount,RegDate, Ip)".
"values(".
	"concat('이름', char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23))),".
	"concat('비번', char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23))),".
	"concat('이멜', char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23))),".
	"concat('제목', char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23))),".
	"concat('내용', char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23)),char(ascii('A')+floor(rand()*23))),".
	"0, now(), 'localhost');";

for($x=0; $x<=200;$x++){
$result=$conn->query($sql);
}

$conn->close();


?>