<?php

    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $subject = htmlspecialchars($subject, ENT_QUOTES);
    $content = htmlspecialchars($content, ENT_QUOTES);
    $regist_day = date("Y-m-d(H:i)");

    $conn = mysqli_connect("localhost", "bigcom", "bigcomlab12!@", "sample");
    
    $sql = "insert into freeboard(name, pass, subject, content, regist_day) values('$name', '$pass', '$subject', '$content', '$regist_day');";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    echo "<script>location.href='list.php'</script>";
?>