<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['invent']) ||(trim ($_SESSION['invent']) == '')) {
	header("location:".host()."../index.php");
    exit();
}

$session_id=$_SESSION['invent'];
$invent_query = mysql_query("select * from invent where client_id = '$session_id'")or die(mysql_error());
$invent_row = mysql_fetch_array($invent_query);
$invent_username = $invent_row['username'];

?>