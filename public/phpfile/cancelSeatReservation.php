<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");

	if (isset($postData["seat_order_id"])) {
		$sql = "UPDATE seat_order SET seat_order_state = 2 WHERE seat_order_id = :seat_order_id";
		$member = $pdo->prepare($sql);
		$member->bindValue(":seat_order_id", $postData["seat_order_id"]);
		$member->execute();
		echo 'success';
	} else {
		echo 'Invalid data';
	}

} catch (PDOException $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";

}
?>
