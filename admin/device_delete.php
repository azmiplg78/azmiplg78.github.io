<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['device_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM stdevice where client_id='$id[$i]'");
}
header("location: device_stock.php");
}
?>