<!-- <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body id="class_div">
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('device_location_slidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">					 					 
					 <a href="dashboard.php" class="btn btn-danger"  id="return" data-placement="right" title="Click to return" ><i class="icon-arrow-left icon-large"></i> Back</a>
					  <script type="text/javascript">
		              $(document).ready(function(){
		              $('#return').tooltip('show');
		              $('#return').tooltip('hide');
		              });
		             </script>	
                        <div class="block">
								<div class="navbar navbar-inner block-header">
								    <div class="muted pull-left"><i class="icon-reorder icon-building"></i> Location Display List</div>
									
						<div id="" class="muted pull-right">
								<?php 
								$my_location = mysql_query("select * from stlocation ")or die(mysql_error());
								$count_my_location = mysql_num_rows($my_location);?>
								Number of Display Location: <span class="badge badge-info"><?php echo $count_my_location; ?></span>
						</div>
								
								</div>								
                            <div class="block-content collapse in">
                                <div class="span12">
									<ul	 id="da-thumbs" class="da-thumbs">
										<?php 
										$query = mysql_query("select * from stlocation")or die(mysql_error());									
										$count = mysql_num_rows($query);
										
										if ($count > 0){
										while($row = mysql_fetch_array($query)){
										$stdev_id = $row['stdev_id'];
										?>
										
										<li id="del<?php echo $id; ?>">
												<a href="mydevice.php<?php echo '?stdev_id='.$stdev_id; ?>">
													<img src ="<?php echo $row['thumbnails'] ?>" width="130" height="148" class="img-polaroid" alt="">
													<div>
													<span><p><?php echo $row['stdev_location_name']; ?></p></span>
													</div>
												</a>

												<a href="device_stocks.php<?php echo '?stdev_id='.$stdev_id; ?>">													
													<div>
													<span><p><?php echo $row['stdev_location_name']; ?></p></span>
													</div>
												</a>
												
												<?php include('count_device.php') ?>
												<p class="class"><?php echo $row['stdev_location_name']; ?>
												<?php if($not_count == '0'){
				                                 }else{ ?>
					                            <span class="badge badge-success"><?php echo $not_count; ?></span>
				                                 <?php } ?>
												</p>
									    </li>
										<?php } }else{ ?>										
									     <div class="alert alert-info"><i class="icon-info-sign"></i> No Location Currently Added</div>
										<?php  } ?>
									</ul>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>									
                </div>				
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('../technical staff/script.php'); ?>
    </body>
