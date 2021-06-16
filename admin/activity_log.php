<!-- <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('activity_log_slidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checbox if you want to delete?
                    </div>
                </div>
				
				<?php	
	             $count_log=mysql_query("select * from activity_log");
	             $count = mysql_num_rows($count_log);
                 ?>
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-user"></i> System User Activity Log</div>
								<div class="muted pull-right">
								Number of System user Activity Log: <span class="badge badge-info"><?php  echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_log.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						            <a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#delete_log" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });

									 function checkAll(ele) {
									 var checkboxes = document.getElementsByTagName('input');
									 if (ele.checked) {
										for (var id = 0; i < checkboxes.length; i++) {
											if (checkboxes[i].type == 'checkbox' ) {
												checkboxes[i].checked = true;
													}
												}
											} else {
										for (var i = 0; i < checkboxes.length; i++) {
									if (checkboxes[i].type == 'checkbox') {
										checkboxes[i].checked = false;
												}
											}
										}
									} 
									</script>

														

									<?php include('modal_delete.php'); ?>
										<thead>
										        <tr>				
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" ></th>
												<th>Date</th>
												<th>System User</th>
												<th>Action</th>
									
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysql_query("select * from  activity_log 
										LEFT JOIN admin ON activity_log.username = admin.username
										order by date DESC")or die(mysql_error());
										while($row = mysql_fetch_array($query)){
										$id = $row['activity_log_id'];
										$username = $row['username'];
									?>

									
                                    <tr>
					                     <td width="70"><input type="checkbox" name="selector[]"  id="optionsCheckbox" value="<?php echo $id; ?>"></td>
                                         <td><i class="icon-calendar"></i>&nbsp; <?php  echo $row['date']; ?></td>
                                         <td><img id="avatar1" src="<?php echo $row['adminthumbnails']; ?>">&nbsp; <?php echo $row['username']; ?></td>
                                         <td><i class="icon-tasks"></i>&nbsp; <?php echo $row['action']; ?></td>

                                        </tr>
                         
						                 <?php } ?>
						   
                              
										</tbody>
									</table>
								</form>
								

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

<head>
 <script type="text/javascript">
  function checkAll(ele) {
       var checkboxes = document.getElementsByTagName('input');
       if (ele.checked) {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox' ) {
                   checkboxes[i].checked = true;
               }
           }
       } else {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = false;
               }
           }
       }
   }
 </script>
</head>