<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['stdev_id']; ?>

     <body id="home">
		<?php include('navbar_public.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('Device_sidebar.php'); ?>
			
				<div class="span9" id="content">
                     <div class="row-fluid">
					 
					 <h2 id="sc" align="center"><image src="../admin/images/sclogo.png" width="45%" height="45%"/></h2>
				<?php	
	             $count_item=mysql_query("select * from stdevice LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id");
	             $count = mysql_num_rows($count_item);
                 ?>	 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Device Stock (s) List</div>
                          <div class="muted pull-right">
								Number of All Device: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
                 <h4 id="sc">Device Stock List 
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>  							  
<br/>														
 <div class="container-fluid">
   <div class="row-fluid"> 
   <div class="empty">
	   <div class="pull-right">
	     <a href="print_all_stock.php" class="btn btn-info" id="print" data-placement="top" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>  
		 <script type="text/javascript">
		$(document).ready(function(){
		$('#print').tooltip('show');
		$('#print').tooltip('hide');
		});
		</script>
        <!-- <a href="add_Device.php" class="btn btn-info"  id="add" data-placement="top" title="Click to Add Device" ><i class="icon-plus-sign icon-large"></i> Add Device</a>
		<script type="text/javascript">
		  $(document).ready(function(){
		  $('#add').tooltip('show');
		  $('#add').tooltip('hide');
		  });
		  </script> --> 		
       </div>
   </div>
</div>
</div>
	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
					<th class="empty"></th>
					<th>Device Name</th>
					<th>Device Description </th>
					<th>Inventory Code </th>
			        <th>Device Brand  </th>
					<th>Device Model  </th>
					<th>Device Status  </th>	
					<th>Location Name </th>				
                    						
		    </tr>
		</thead>
		<tbody>
<!-----------------------------------Content------------------------------------>


<?php
		if ($get_id==0){
			$device_query = mysql_query("select * from location_details	                                                    
			LEFT JOIN stdevice ON location_details.id = stdevice.id 
			LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			where NOT EXISTS 
			(select * from location_details where dev_status='Dump')
					
			order by date_deployment DESC ")or die(mysql_error());
		 } else {
			$device_query = mysql_query("select * from location_details	                                                    
			LEFT JOIN stdevice ON location_details.id = stdevice.id 
			LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			where NOT EXISTS 
			(select * from location_details where dev_status='Dump')
			and stdev_id = '$get_id'		
			order by date_deployment DESC ")or die(mysql_error());
		}

		while($row = mysql_fetch_array($device_query)){

		$id = $row['id'];
		$dev_id = $row['dev_id'];
		$iddevice = $row['stdev_id'];
		
?>


										
		<tr>
		<td><?php
			   $device_query2 = mysql_query("select * from stdevice ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($device_query2);
		       if($row['dev_status']=='New')
		       {
			   echo '<i class="icon-check"></i><div id="hide"><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else if($row['dev_status']=='Used')
			   {
			   echo '<i class="icon-ok"></i><div id="hide"><strong>'.$row['dev_status'].'</strong></div>';
		       }
			   else if($row['dev_status']=='Repaired')
			   {
			   echo '<i class="icon-wrench"></i><div id="hide"><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else
			   {
			   echo '<i class="icon-remove-sign"></i><div id="hide"><strong>'.$row['dev_status'].'</strong></div>';
		       };
			  ?>
		</td>
			<td><?php echo $row['dev_name']; ?></td>
			<td><?php echo $row['dev_desc']; ?></td>
			<td><?php echo $row['dev_serial']; ?></td>
			<td><?php echo $row['dev_brand']; ?></td>
			<td><?php echo $row['dev_model']; ?></td>			
			<td><?php
			   
			   $device_query1 = mysql_query("select * from stdevice ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($device_query1);
		       if($row['dev_status']=='New')
		       {
			   echo '<div class="alert alert-success"><i class="icon-check"></i><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else if($row['dev_status']=='Used')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-ok"></i><strong>'.$row['dev_status'].'</strong></div>';
		       }
			   else if($row['dev_status']=='Repaired')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-wrench"></i><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else
			   {
			   echo '<div class="alert alert-danger"><i class="icon-remove-sign"></i><strong>'.$row['dev_status'].'</strong></div>';
		       };
			  ?></td>

			  <td>	
			   		<?php
					
							$location = mysql_query("select * from stlocation where stdev_id='$iddevice' ")or die(mysql_error());
							$location_row=mysql_fetch_assoc($location);
							echo $location_row['stdev_location_name'];
					
					?>
					
			  </td>			

															
			
		</tr>
											
		
	<?php } ?>

</tbody>
</table>
</form>		
		
			  		
</div>
</div>
</div>
</div>
</div>

</div>	
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
 </body>
</html>