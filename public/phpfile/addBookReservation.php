<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Requested-With');

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");
	//執行sql指令
	$sql = "INSERT INTO comics_order (mem_id, comics_order_status, comics_order_date, comics_borrow_duedate, comics_return_duedate, comics_return_date, comics_quantity, comics_order_sum, comics_payment_method, comic_ruin_penalty, comic_delay_penalty)
          VALUES (:mem_id, :comics_order_status, :comics_order_date, :comics_borrow_duedate, NULL, NULL, :comics_quantity, :comics_order_sum, :comics_payment_method, 0, 0)";
	$member = $pdo-> prepare($sql);
  $member->bindValue(":mem_id", $postData["mem_id"]);
	$member->bindValue(":comics_order_status", $postData["comics_order_status"]);
	$member->bindValue(":comics_order_date", $postData["comics_order_date"]);
	$member->bindValue(":comics_borrow_duedate", $postData["comics_borrow_duedate"]);
  $member->bindValue(":comics_quantity", $postData["comics_quantity"]);
	$member->bindValue(":comics_order_sum", $postData["comics_order_sum"]);
	$member->bindValue(":comics_payment_method", $postData["comics_payment_method"]);
	$member->execute();

  $comics_order_id = $pdo->lastInsertId();
  $comics_order_no = "C" . str_pad($comics_order_id, 4, "0", STR_PAD_LEFT);
  $sql = "update comics_order set comics_order_no = '$comics_order_no' where comics_order_id = $comics_order_id";
  $pdo->exec($sql);

	echo 'success';


} catch (PDOException $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";

}
?>
