<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Requested-With');

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");
	//執行sql指令
	$sql = "INSERT INTO comics_order_detail (comics_order_id, comics_id)
          VALUES (:comics_order_id, :comics_id)";
	$member = $pdo-> prepare($sql);
  $member->bindValue(":comics_order_id", $postData["comics_order_id"]);
	$member->bindValue(":comics_id", $postData["comics_id"]);
	$member->execute();

  // $comics_order_detail_id = $pdo->lastInsertId();
  // $comics_order_no = "C" . str_pad($comics_order_id, 4, "0", STR_PAD_LEFT);
  // $sql = "update comics_order set comics_order_no = '$comics_order_no' where comics_order_id = $comics_order_id";
  // $pdo->exec($sql);

	echo 'success';


} catch (PDOException $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";

}
?>
