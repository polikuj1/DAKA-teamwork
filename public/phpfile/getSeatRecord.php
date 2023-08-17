<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDaka.php");
	
	//執行sql指令並取得pdoStatement
  $id = $_GET["id"];
  $sql = "SELECT so.seat_order_id, so.seat_order_no, so.seat_order_date, so.seat_order_startdate, so.seat_order_enddate, so.seat_order_sum, so.seat_order_state, sod.seat_order_detail_id, sod.seat_id, s.seat_area, s.seat_number, s.seat_sal, m.mem_id
  FROM seat_order so
  JOIN seat_order_detail sod ON so.seat_order_id = sod.seat_order_id
  JOIN seat s on sod.seat_id = s.seat_id
  join member m on so.mem_id = m.mem_id
  where so.mem_id = $id 
  ORDER BY so.seat_order_id desc, so.seat_order_state";
	$products = $pdo->query($sql); 
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
  $orders = array();

  foreach ($prodRows as $row) {
      $seat_order_id = $row['seat_order_id'];
      if (!isset($orders[$seat_order_id])) {
          // array_push($orders, $row);
          $orders[$seat_order_id] = array(
              'seat_order_id' => $seat_order_id,
              'seat_order_no' => $row['seat_order_no'],
              'seat_order_state' => $row['seat_order_state'],
              'seat_order_date' => $row['seat_order_date'],
              'seat_order_startdate' => $row['seat_order_startdate'],
              'seat_order_enddate' => $row['seat_order_enddate'],
              'seat_order_sum' => $row['seat_order_sum'],
              'seat_order_detail_id' => $row['seat_order_detail_id'],
              'mem_id' => $row['mem_id'],
              'items' => array()
          );
      }
      $orders[$seat_order_id]['items'][] = array(
          'seat_id' => $row['seat_id'],
          'seat_area' => $row['seat_area'],
          'seat_number' => $row['seat_number'],
          'seat_sal' => $row['seat_sal'],
      );
  }

  echo json_encode(array_values($orders));

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
