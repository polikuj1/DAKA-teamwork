<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");

	if (isset($postData["credit_id"])) {
		$sql = "UPDATE credit SET outofdate = 0 WHERE credit_id = :credit_id";
		$member = $pdo->prepare($sql);
		$member->bindValue(":credit_id", $postData["credit_id"]);
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
