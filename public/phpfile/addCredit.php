<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Requested-With');

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");
	//執行sql指令
  // $mem_id = $postData["mem_id"];
	$sql = "INSERT INTO credit (mem_id, card_number, valid, outofdate, preset, card_cvv)
          VALUES (:mem_id, :card_number, :valid, 1, :preset, :card_cvv)";
	$member = $pdo-> prepare($sql);
  $member->bindValue(":mem_id", $postData["mem_id"]);
	$member->bindValue(":card_number", $postData["card_number"]);
	$member->bindValue(":valid", $postData["valid"]);
	$member->bindValue(":preset", $postData["preset"]);
  $member->bindValue(":card_cvv", $postData["card_cvv"]);
	$member->execute();

  $credit_id = $pdo->lastInsertId();
  $credit_no = "CD" . str_pad($credit_id, 4, "0", STR_PAD_LEFT);
  $sql = "update credit set credit_no = '$credit_no' where credit_id = $credit_id";
  $pdo->exec($sql);

	echo 'success';


} catch (PDOException $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";

}
?>
