<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
session_start();

try {
  
  require_once("connectDaka.php");

  $post_data = file_get_contents("php://input"); // 获取 POST 数据
  $loginData = json_decode($post_data, true); // 将 JSON 数据解码为关联数组

  $email = $loginData["email"]; // 获取前端传递的 email

  $sql = "SELECT * FROM member WHERE email = :email";
  $member = $pdo->prepare($sql);
  $member->bindValue(":email", $email); // 绑定 email 值
  $member->execute();

  if ($member->rowCount() == 0) { 
    echo json_encode(["error" => "帳號密碼錯誤"]); // 返回 JSON 格式错误信息
  } else { // 登录成功
    // 从数据库中取回会员数据
    $memRow = $member->fetch(PDO::FETCH_ASSOC);

    // 构建返回的会员数据数组
    $result = [
      "mem_id" =>  $memRow["mem_id"],
      "email" => $memRow["email"],
      "password" =>  $memRow["password"],
     
      
    ];

    echo json_encode($result); // 返回 JSON 格式会员数据
  }
  
} catch (Exception $e) {
  echo "錯誤行號 : ", $e->getLine(), "<br>";
  echo "錯誤原因 : ", $e->getMessage(), "<br>";
}
?>
