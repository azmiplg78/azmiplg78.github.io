<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_public'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM public where client_id='$id[$i]'");
}
header("location: public_user.php");
}
?>