<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");

	if (isset($postData["remain"])) {
		$sql = "UPDATE member SET remain = :remain, value = :value WHERE mem_id = :mem_id";
		$member = $pdo->prepare($sql);
		$member->bindValue(":remain", $postData["remain"]);
		$member->bindValue(":value", $postData["value"]);
    $member->bindValue(":mem_id", $postData["mem_id"]);
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
