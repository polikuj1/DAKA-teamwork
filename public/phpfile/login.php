<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
session_start();

try {
  
  require_once("connectDaka.php");

  $post_data = file_get_contents("php://input"); // 获取 POST 数据
  $loginData = json_decode($post_data, true); // 将 JSON 数据解码为关联数组

  if (!isset($loginData["memId"]) || !isset($loginData["memPsw"])) {
    echo "缺少必要的参数";
  } else {
    $sql = "select * from member where email = :email and password = :password";
    $member = $pdo->prepare($sql);
    $member->bindValue(":email", $loginData["memId"]);
    $member->bindValue(":password", $loginData["memPsw"]);
    $member->execute();

    if ($member->rowCount() == 0) { 
      echo "帳號密碼錯誤";
    } else { //登入成功
      //自資料庫中取回資料
      $memRow = $member->fetch(PDO::FETCH_ASSOC);

      //登入成功,將登入者的資料寫入session
      $_SESSION["mem_no"] = $memRow["mem_no"];
      $_SESSION["mem_id"] = $memRow["mem_id"];
      $_SESSION["mname"] = $memRow["mname"];
      $_SESSION["email"] = $memRow["email"];

      //送出登入者的資料
      $result = ["mem_no" => $_SESSION["mem_no"], "mem_id" => $_SESSION["mem_id"], "mname" => $_SESSION["mname"], "email" => $_SESSION["email"]];

      echo json_encode($result); //{"memNo":1, "memId": "Sara",...}  
    }
  }
} catch (Exception $e) {
  echo "錯誤行號 : ", $e->getLine(), "<br>";
  echo "錯誤原因 : ", $e->getMessage(), "<br>";
}
?>