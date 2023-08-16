<?php
header("Access-Control-Allow-Origin: *"); // 允許任何來源的請求
header("Access-Control-Allow-Methods: POST"); // 只允許 POST 請求
header("Access-Control-Allow-Headers: Content-Type"); // 只允許特定標頭

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 讀取 POST 請求數據
        $input = json_decode(file_get_contents('php://input'), true);

        require_once("connectDaka.php");

        $selectedSeats = $input['selectedSeats'];

        if (!empty($selectedSeats) && is_array($selectedSeats)) {
            // 生成唯一的 seat_order_id
            $seatOrderID = uniqid();

            // 插入座位訂單明細數據到資料庫
            foreach ($selectedSeats as $selectedSeat) {
                $seatID = $selectedSeat['seat_id'];

                $sql = "INSERT INTO seat_order_detail (seat_order_id, seat_id) VALUES ('$seatOrderID', '$seatID')";

                if ($pdo->query($sql) === FALSE) {
                    echo json_encode(["error" => "錯誤：" . $sql . "<br>" . $pdo->errorInfo()[2]]);
                    exit; // 終止程式
                }
            }

            // 返回成功訊息和生成的 seat_order_id 給前端
            $response = ['message' => '座位訂單明細新增成功', 'seat_order_id' => $seatOrderID];
            echo json_encode([$response, ["message" => "預約成功"]]); // 將多個 JSON 物件放入陣列再進行 json_encode
        } else {
            echo json_encode(["error" => "未選擇座位或座位數據無效"]);
            exit; // 終止程式
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "錯誤行號: " . $e->getLine() . " 錯誤原因: " . $e->getMessage()]);
    }
}
?>