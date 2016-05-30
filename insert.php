<?php
	require 'connect.php';
	$uname = $_GET['uname'];
	$msg = $_GET['msg'];

	$query="INSERT INTO logs(username,msg) VALUES(?,?)";
	$stmt=$conn->prepare($query);
	$stmt->execute(array($uname,$msg));
	$result1 = "SELECT * FROM logs ORDER by id DESC";
	$stmt1=$conn->prepare($result1);
	$stmt1->execute();
	while($rows=$stmt1->fetch()){
		echo "<span class='uname'>".$rows['username']."</span>:<span class='msg'>".$rows['msg']."</span><br/>";
	}

?>