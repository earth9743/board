<?php
    function connect(){

        $servername = 'localhost';
        $username = 'bigcom';
        $password = 'bigcomlab12!@';
        $dbname = 'sample';
    
        $conn = mysqli_connect($servername,$username,$password,$dbname);
            
        if(isset($_GET["num"])){
            $num = $_GET["num"];
        }
        else{
            $num = "";
        }
        
        $view_sql = "select *from freeboard where num = $num;";
        $view_result = mysqli_query($conn, $view_sql);

        $row = mysqli_fetch_assoc($view_result);
        $name = $row["name"];
        $subject = $row["subject"];
        $regist_day = $row["regist_day"];
        $content = $row["content"];
        $content = $str_replace(" ", "&nbsp;", $content);
        $content = $str_replace("\n", "<br>", $content);
    }
?>