<?php 
    $dbname = "daka";
    $user = "root";
    $password = "root";
    $port = 3306;

    // $dbname = "tibamefe_chd102g6";
    // $user = "tibamefe_since2021";
    // $password = "vwRBSb.j&K#E";

    $dsn = "mysql:host=localhost;port=$port;dbname=$dbname;charset=utf8";

    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    
    //建立pdo物件
    $pdo = new PDO($dsn, $user, $password, $options);
?>