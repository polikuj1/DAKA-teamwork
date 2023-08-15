<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only specific headers

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        require_once("connectDaka.php");
    
        $post_data = file_get_contents("php://input"); // 获取 POST 数据
        $seatData = json_decode($post_data, true); // 将 JSON 数据解码为关联数组
        
        $sql = "INSERT INTO member (mname, sex, email, mobile, password, address, member_birth) VALUES (:name, :sex, :email, :mobile, :password, :address, :member_birth)";
        $member = $pdo->prepare($sql);
        $member->bindValue(":name", $seatData["nameReg"]);
        $member->bindValue(":sex", $seatData["sexReg"]);
        $member->bindValue(":email", $seatData["emailReg"]);
        $member->bindValue(":mobile", $seatData["telReg"]);
        $member->bindValue(":password", $seatData["pswReg"]);
        $member->bindValue(":address", $seatData["addReg"]); 
        $member->bindValue(":member_birth", $seatData["birthReg"]);
        $member->execute();
        //-----------------------
        $mem_id = $pdo->lastInsertId();
        $mem_no = "S" . str_pad($mem_id, 4, "0", STR_PAD_LEFT );
        $sql = "update member set mem_no = '$mem_no' where mem_id = $mem_id";
        $pdo->exec($sql);
    
        echo json_encode(["message" => "預約成功"]); // Return a JSON response
    } catch (PDOException $e) {
        echo json_encode(["error" => "錯誤行號: " . $e->getLine() . " 錯誤原因: " . $e->getMessage()]);
    }
}

?>