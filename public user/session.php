<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['public']) ||(trim ($_SESSION['public']) == '')) {
	header("location:".host()."../index.php");
    exit();
}
$session_id=$_SESSION['public'];

$public_query = mysql_query("select * from public where client_id = '$session_id'")or die(mysql_error());
$public_row = mysql_fetch_array($public_query);
$public_fullname =$public_row['firstname']." ".$public_row['lastname'];
?>