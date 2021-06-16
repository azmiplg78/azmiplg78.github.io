			
			<form id="login_form1" class="form-signin" method="post">
				<h3 class="form-signin-heading">
					<i class="icon-lock"></i> Please Login
				</h3>
				<input type="text"      class="input-block-level"   id="username" name="username" placeholder="Username" required>

				<input type="password"  class="input-block-level"   id="password" name="password" placeholder="Password" id="password" required>

				<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="check" type="checkbox" onclick="myFunction();">
						<label class="label-checkbox100" for="check">Show Password</label>	
							<script>
								function myFunction() {
								var x = document.getElementById("password");
								if (x.type === "password") {
								x.type = "text";
								} else {
								x.type = "password";
														}
								}
							</script> 													
				</div> 
										
                                          
                <button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#signin').tooltip('show');
				$('#signin').tooltip('hide');
				});
				</script>		
			</form>
						<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true_admin')
									{
									$.jGrowl("Loading File Please Wait......", { sticky: true });
									$.jGrowl("Welcome Administrator to IT_Broadcast Resource Inventory System (I.R.I.S.)", { header: 'Access Granted' });
									var delay = 2000;
										setTimeout(function(){ window.location = 'admin/dashboard.php'  }, delay);  
									}else if (html == 'true_invent'){
										$.jGrowl("Welcome Inventory Staff to IT_Broadcast Resource Inventory System (I.R.I.S.)", { header: 'Access Granted' });
									var delay = 2000;
										setTimeout(function(){ window.location = 'inventory Staff/dashboard_invent.php'  }, delay);  
									}else if (html == 'true_technic'){
										$.jGrowl("Welcome Techinican Staff to IT_Broadcast Resource Inventory System (I.R.I.S.)", { header: 'Access Granted' });
									var delay = 2000;
										setTimeout(function(){ window.location = 'technical Staff/dashboard_client.php'  }, delay);  
									}else if (html == 'true_public'){
										$.jGrowl("Welcome Public User to IT_Broadcast Resource Inventory System (I.R.I.S.)", { header: 'Access Granted' });
									var delay = 2000;
										setTimeout(function(){ window.location = 'public user/dashboard_public.php'  }, delay);  
									}else
									{
									$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
									}
									}
								});
								return false;
							});
						});
						</script>
			