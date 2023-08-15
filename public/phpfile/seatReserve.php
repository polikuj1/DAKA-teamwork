<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only specific headers

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        require_once("connectDaka.php");
    
        $post_data = file_get_contents("php://input"); // 获取 POST 数据
        $seatData = json_decode($post_data, true); // 将 JSON 数据解码为关联数组
        
        $sql = "INSERT INTO seat_order (mem_id, seat_order_date, seat_order_sum, seat_order_startdate, seat_order_enddate,seat_order_time, seat_order_state) VALUES (:mem_id, :seat_order_date, :seat_order_sum, :seat_order_startdate, :seat_order_enddate,:seat_order_time, :seat_order_state)";
        $member = $pdo->prepare($sql);
        $member->bindValue(":mem_id", $seatData["mem_id"]);
        $member->bindValue(":seat_order_date", $seatData["seat_order_date"]);
        $member->bindValue(":seat_order_sum", $seatData["seat_order_sum"]);
        $member->bindValue(":seat_order_startdate", $seatData["seat_order_startdate"]);
        $member->bindValue(":seat_order_enddate", $seatData["seat_order_enddate"]);
        $member->bindValue(":seat_order_time", $seatData["seat_order_time"]); 
        $member->bindValue(":seat_order_state", $seatData["seat_order_state"]);
        $member->execute();
        //-----------------------
        $seat_order_id = $pdo->lastInsertId();
        $seat_order_no = "S" . str_pad($seat_order_id, 4, "0", STR_PAD_LEFT );
        $sql = "update seat_order set seat_order_no = '$seat_order_no' where seat_order_id =  $seat_order_id";
        $pdo->exec($sql);
    
        echo json_encode(["message" => "預約成功"]); // Return a JSON response
    } catch (PDOException $e) {
        echo json_encode(["error" => "錯誤行號: " . $e->getLine() . " 錯誤原因: " . $e->getMessage()]);
    }
}

?>