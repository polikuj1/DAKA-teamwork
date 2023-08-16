<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Requested-With');

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");
	//執行sql指令
	$sql = "INSERT INTO storedvalue (mem_id, credit_id, sdate, sval, add_method)
          VALUES (:mem_id, :credit_id, :sdate, :sval, :add_method)";
	$member = $pdo-> prepare($sql);
  $member->bindValue(":mem_id", $postData["mem_id"]);
	$member->bindValue(":credit_id", $postData["credit_id"]);
	$member->bindValue(":sdate", $postData["sdate"]);
	$member->bindValue(":sval", $postData["sval"]);
  $member->bindValue(":add_method", $postData["add_method"]);
	$member->execute();

  $sto_id = $pdo->lastInsertId();
  $sto_no = "A" . str_pad($sto_id, 4, "0", STR_PAD_LEFT);
  $sql = "update storedvalue set sto_no = '$sto_no' where sto_id = $sto_id";
  $pdo->exec($sql);

	echo 'success';


} catch (PDOException $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";

}
?>
