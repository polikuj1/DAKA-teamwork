<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	// 引入連線工作的檔案
  require_once("connectDaka.php");
    
  // 執行sql指令並取得pdoStatement
  $id = $_GET["id"];
  $sql = "SELECT 
              co.comics_order_id,
              co.comics_order_no,
              co.mem_id,
              co.comics_order_status,
              co.comics_order_date,
              co.comics_borrow_date,
              co.comics_borrow_duedate,
              co.comics_return_date,
              co.comics_return_duedate,
              co.comics_quantity,
              co.comics_order_sum,
              co.comics_payment_method,
              cod.comics_order_detail_id,
              cod.comics_id,
              cc.isbn,
              cc.comics_index,
              cc.title
          FROM comics_order co 
          JOIN comics_order_detail cod ON co.comics_order_id = cod.comics_order_id
          JOIN comics_collection cc ON cod.comics_id = cc.comics_id
          WHERE co.mem_id = $id";
                  
  $products = $pdo->query($sql); 
  $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
  
  // 對結果進行後處理，組合成所需的結構
  $newResult = [];
  foreach ($prodRows as $row) {
      $orderId = $row['comics_order_id'];
      if (!isset($newResult[$orderId])) {
          $newResult[$orderId] = [
              "comics_borrow_date" => $row["comics_borrow_date"],
              "comics_borrow_duedate" => $row["comics_borrow_duedate"],
              "comics_order_date" => $row["comics_order_date"],
              "comics_order_detail_ids" => [],
              "comics_ids" => [],
              "comics_indexes" => [],
              "comics_order_id" => $row["comics_order_id"],
              "comics_order_no" => $row["comics_order_no"],
              "comics_order_status" => $row["comics_order_status"],
              "comics_order_sum" => $row["comics_order_sum"],
              "comics_payment_method" => $row["comics_payment_method"],
              "comics_quantity" => $row["comics_quantity"],
              "comics_return_date" => $row["comics_return_date"],
              "comics_return_duedate" => $row["comics_return_duedate"],
              "isbns" => [],
              "mem_id" => $row["mem_id"],
              "titles" => [],
          ];
      }

      $newResult[$orderId]["comics_order_detail_ids"][] = $row["comics_order_detail_id"];
      $newResult[$orderId]["comics_ids"][] = $row["comics_id"];
      $newResult[$orderId]["comics_indexes"][] = $row["comics_index"];
      $newResult[$orderId]["isbns"][] = $row["isbn"];
      $newResult[$orderId]["titles"][] = $row["title"];
  }

  // 重新組合成索引式陣列
  $finalResult = array_values($newResult);
  
  // 輸出處理後的結果
  echo json_encode($finalResult);



} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
