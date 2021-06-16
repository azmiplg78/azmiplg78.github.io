<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['device_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($d=0; $d < $N; $d++)
{
	$result = mysql_query("DELETE FROM stdevice where id='$id[$d]'");
}
header("location: device_stock.php");
}
?>