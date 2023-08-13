<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only specific headers

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        require_once("connectDaka.php");
    
        $post_data = file_get_contents("php://input"); // 获取 POST 数据
        $registerData = json_decode($post_data, true); // 将 JSON 数据解码为关联数组
        
        $sql = "INSERT INTO member (mname, sex, email, mobile, password, address, member_birth) VALUES (:name, :sex, :email, :mobile, :password, :address, :member_birth)";
        $member = $pdo->prepare($sql);
        $member->bindValue(":name", $registerData["nameReg"]);
        $member->bindValue(":sex", $registerData["sexReg"]);
        $member->bindValue(":email", $registerData["emailReg"]);
        $member->bindValue(":mobile", $registerData["telReg"]);
        $member->bindValue(":password", $registerData["pswReg"]);
        $member->bindValue(":address", $registerData["addReg"]); // Make sure "addReg" key exists in the data
        $member->bindValue(":member_birth", $registerData["birthReg"]);
        $member->execute();
    
        echo json_encode(["message" => "註冊成功"]); // Return a JSON response
    } catch (PDOException $e) {
        echo json_encode(["error" => "錯誤行號: " . $e->getLine() . " 錯誤原因: " . $e->getMessage()]);
    }
}

?>