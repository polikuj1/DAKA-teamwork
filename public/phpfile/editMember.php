<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
  $postData = json_decode(file_get_contents('php://input'), true);
	require_once("connectDaka.php");
	//執行sql指令
  $memid = $_POST["memid"];
	$sql = "update member set mname = :mname,
								address = :address,
								mobile = :mobile,
                password = :password
								where mem_id = :memid";
	$member = $pdo-> prepare($sql);
  $member->bindValue(":memid", $postData["memid"]);
	$member->bindValue(":mname", $postData["mname"]);
	// $member->bindValue(":sex", $postData["sex"]);
	// $member->bindValue(":birthday", $postData["birthday"]);
	$member->bindValue(":address", $postData["address"]);
	$member->bindValue(":mobile", $postData["mobile"]);
	// $member->bindValue(":email", $postData["email"]);
  $member->bindValue(":password", $postData["password"]);
	$member->execute();

  $sql_query = "SELECT * FROM member WHERE mem_id = :memid";
    $query_member = $pdo->prepare($sql_query);
    $query_member->bindValue(":memid", $memid);
    $query_member->execute();
    $updatedData = $query_member->fetch(PDO::FETCH_ASSOC);
    echo json_encode($updatedData);
  // $memRows = $member->fetchAll(PDO::FETCH_ASSOC);
  // echo json_encode($memRows);

} catch (PDOException $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";

}
?>
