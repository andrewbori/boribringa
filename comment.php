<?php

$conn = new mysqli("127.0.0.1", "boribringa", "Bringa59", "boribringa");

// Ha nincs megadva komment
if (!isset($_GET["username"])) { $_GET["username"]=""; }
if (!isset($_GET["comment"])) { $_GET["comment"]=""; }
$username=$_GET["username"]; $comment=$_GET["comment"];
$bicycle=$_GET["bicycle"];

$statement = $conn->prepare("SELECT id FROM Bicycle WHERE name LIKE ?");
$statement->bind_param("s", $bicycle);
$statement->execute();
$statement->bind_result($bicycleID);
$statement->fetch();
$statement->close();

if ($username!="" && $comment!="") {
	$statement = $conn->prepare("INSERT INTO Comment (bicycleID, username, comment) VALUES (?, ?, ?)");
	$statement->bind_param("iss", $bicycleID, $username, $comment);
	$statement->execute();
	$statement->close();;
	
	$comment="";
	$username="";
}

$statement = $conn->prepare("SELECT username,time,comment FROM Comment WHERE bicycleID=?");
$statement->bind_param("s", $bicycleID);
$statement->execute();
$statement->bind_result($username,$time,$comment);

$comments = array();
$comments_count=0;
while($statement->fetch()) {
	$comments[$comments_count]=array();
	$comments[$comments_count]['username']=$username;
	$comments[$comments_count]['time']=$time;
	$comments[$comments_count]['comment']=$comment;
	$comments_count++;
}
$statement->close();

$conn->close();

$_SmartyPath = "/libs/";
require($_SmartyPath."Smarty.class.php");
$Smarty = new Smarty();
// Valtozok atadasa a sablonnak
$Smarty->assign('comments_count', $comments_count);
$Smarty->assign('comments', $comments);

// Az oldal megjelenitese
$Smarty->display('comment.tpl');

?>