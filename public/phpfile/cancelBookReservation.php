<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");

	if (isset($postData["comics_order_id"])) {
		$sql = "UPDATE comics_order SET comics_order_status = 2 WHERE comics_order_id = :comics_order_id";
		$member = $pdo->prepare($sql);
		$member->bindValue(":comics_order_id", $postData["comics_order_id"]);
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
