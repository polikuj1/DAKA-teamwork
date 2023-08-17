<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only specific headers

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 讀取 POST 請求數據
        $input = json_decode(file_get_contents('php://input'), true);

        require_once("connectDaka.php");
        
        $post_data = file_get_contents("php://input"); // 获取 POST 数据
        $seatData = json_decode($post_data, true); // 将 JSON 数据解码为关联数组

        // 假設這是您的座位訂單明細數據
        // $selectedSeats = $input['selectedSeats'] ?? [];

        // 取得 seat_order_id
        $seatOrderID = $seatData['seat_order_id'];
        $seatID = $seatData['seat_id'];

        $pdo->beginTransaction(); // Start a transaction
        // 插入座位訂單明細數據到資料庫
        // foreach ($selectedSeats as $selectedSeat) {
            
            $sql = "INSERT INTO seat_order_detail (seat_order_id, seat_id) VALUES (:seat_order_id, :seat_id)";
            $stmt = $pdo-> prepare($sql);
            $stmt->bindValue(":seat_order_id", $seatOrderID);
            $stmt->bindValue(":seat_id", $seatID);

            
            if (!$stmt->execute()) {
                $errorInfo = $stmt->errorInfo();
                echo json_encode(["error" => "Database error: " . $errorInfo[2]]);
                exit;
            }
        // }
        $pdo->commit(); // Commit the transaction
        // 返回成功訊息和生成的 seat_order_id 給前端
        $response = ['message' => '座位訂單明細新增成功', 'seat_order_id' => $seatOrderID];
        echo json_encode([$response, ["message" => "預約成功"]]); // 將多個 JSON 物件放入陣列再進行 json_encode
    } catch (PDOException $e) {
        $pdo->rollBack(); // Rollback the transaction in case of error
        echo json_encode(["error" => "錯誤行號: " . $e->getLine() . " 錯誤原因: " . $e->getMessage()]);
    } catch (Exception $e) {
        $pdo->rollBack(); // Rollback the transaction in case of error
        echo json_encode(["error" => "錯誤行號: " . $e->getLine() . " 錯誤原因: " . $e->getMessage()]);
    }
}
?>