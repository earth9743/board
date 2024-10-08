<?php
    if (isset($_GET["num"]))			
		$num = $_GET["num"];
	else 
		$num = "";

    require 'connection.php';
    echo "연결성공";

    $view_result = connect($num);
    $row = mysqli_fetch_assoc($view_result);			// 레코드 가져오기
    $name      = $row["name"];					// 이름
    $subject    = $row["subject"];				// 제목
    $regist_day   = $row["regist_day"];			// 작성일
    $content    = $row["content"];				// 내용
    $content = str_replace(" ", "&nbsp;", $content);		// 공백 변환
    $content = str_replace("\n", "<br>", $content);			// 줄바꿈 변환
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>PHP+데이터베이스 입문</title>
        <link rel = "stylesheet" href = "style.css">
        <script>
            function check_password(mode, num){
                // mode : modify(수정) delete(삭제), num : 레코드 번호
                window.open("password_from.php?mode="mode+"&num="+num,"pass_check",
                    "left=700,top=300,width=550,height=150,scrollbars=no,resizeable=yes"
                );
            }
        </script>
    </head>
    <body>
        <h2>자유게시판 > 내용보기</h2>
        <ul class="board_view">
            <li class="row1">
                <span class="col1"><b>제목</b><?=$subject?></span>
                <span class="co12"><?=$name?>|<?=$regist_day?></span>
            </li>
            <li><?=$content?></li>
        </ul>
        <ul class="buttons">
            <li>
                <button onclick="location.href='list.php'">목록보기</button>
            </li>
            <li>
                <button onclick="check_password('modify','<?=$num?>')">수정하기</button>
            </li>
            <li>
                <button onclick="check_password('delete','<?=$num?>')">삭제하기</button>
            </li>
            <li>
                <button onclick="location.href='form.php'">글쓰기</button>
            </li>
        </ul>
    </body>
</html>