<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDaka.php");
	
	//執行sql指令並取得pdoStatement
  $id = $_GET["id"];
  $sql = "SELECT 
  m.mem_id,
  GROUP_CONCAT(DISTINCT so.seat_order_id) AS seat_order_ids,
  so.seat_order_no,
  GROUP_CONCAT(DISTINCT so.seat_order_date) AS seat_order_dates,
  GROUP_CONCAT(DISTINCT so.seat_order_startdate) AS seat_order_startdates,
  GROUP_CONCAT(DISTINCT so.seat_order_enddate) AS seat_order_enddates,
  GROUP_CONCAT(DISTINCT so.seat_order_sum) AS seat_order_sums,
  GROUP_CONCAT(DISTINCT so.seat_order_state) AS seat_order_states,
  GROUP_CONCAT(DISTINCT sod.seat_id) AS seat_ids,
  GROUP_CONCAT(DISTINCT sod.seat_order_detail_id) AS seat_order_detail_ids,
  GROUP_CONCAT(DISTINCT s.seat_area) AS seat_areas,
  GROUP_CONCAT(DISTINCT s.seat_number) AS seat_numbers,
  s.seat_sal
FROM 
  member m 
  JOIN seat_order so ON m.mem_id = so.mem_id
  JOIN seat_order_detail sod ON so.seat_order_id = sod.seat_order_id
  JOIN seat s ON sod.seat_id = s.seat_id
WHERE 
  m.mem_id = $id
GROUP BY 
  so.seat_order_no,
  m.mem_id,
  s.seat_sal
ORDER BY
  so.seat_order_state;
";
	$products = $pdo->query($sql); 
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($prodRows);

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
