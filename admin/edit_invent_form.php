   <div class="row-fluid">
   <a href="invent_user.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add Inventory Staff" ><i class="icon-plus-sign icon-large"></i> Add New Inventory Staff</a>
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Inventory Staff Info</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from invent where client_id = '$get_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								<form method="post">
										<div class="control-group">
                                          <div class="controls"> Firstname :
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Firstname" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls"> Lastname :
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Lastname" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls"> Username :
                                            <input class="input focused" value="<?php echo $row['username']; ?>"  name="username" id="focusedInput" type="text" placeholder = "Username" required>
                                          </div>
                                        </div>

                      <div class="control-group">
                                          <div class="controls"> Password :
                                            <input class="input focused" value="<?php echo $row['password']; ?>"  name="password" id="focusedPassword" type="password" placeholder = "Password" required>
                                          </div>
                                          <div>
                                          <input type="checkbox" onclick="myFunction()"> Show Password
                                            <script>
                                              function myFunction() {
                                                var x = document.getElementById("focusedPassword");
                                                if (x.type === "password") {
                                                  x.type = "text";
                                                } else {
                                                  x.type = "password";
                                                }
                                              }
                                            </script>  
                                          </div>
                                        </div>

										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success" id="update" data-placement="right" title="Click to Update"><i class="icon-save icon-large"></i> Update</button>
												<script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#update').tooltip('show');
	                                            $('#update').tooltip('hide');
	                                            });
	                                            </script>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
			<?php		
if (isset($_POST['update'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];


mysql_query("update invent set username = '$username'  , firstname = '$firstname' , lastname = '$lastname', password = '$password' where client_id = '$get_id' ")or die(mysql_error());
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Edit inventory Staff $firstname')")or die(mysql_error());	
?>
<script>
  window.location = "invent_user.php"; 
  $.jGrowl("Inventory Staff Successfully Update", { header: 'Inventory Staff Update' });
</script>
<?php
}
?>