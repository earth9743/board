<?php   
    function connect($num){

        $servername = 'localhost';
        $username = 'bigcom';
        $password = 'bigcomlab12!@';
        $dbname = 'sample';
    
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        $view_sql = "select *from freeboard where num = $num;";
        $view_result = mysqli_query($conn, $view_sql);
        
        return $view_result;
    }
?>