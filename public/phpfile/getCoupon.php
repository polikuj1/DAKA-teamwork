<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDaka.php");
	//執行sql指令並取得pdoStatement
	$id = $_GET["id"];
	$sql = "select mc.member_coupon_id, mc.member_coupon_no, mc.coupon_id,
								 mc.mem_id, mc.get_date, mc.close_date, mc.exchange,
								 c.coupon_date, c.exchange_food, c.exchange_time, c.pic
					FROM member_coupon mc JOIN coupon c ON mc.coupon_id = c.coupon_id
					WHERE mc.mem_id = $id";
	$products = $pdo->query($sql); 
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($prodRows);

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
