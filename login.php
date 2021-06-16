<?php
        include('admin/lib/dbcon.php');
		dbcon(); 
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*................................................ admin .....................................................*/
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
			
		/*...................................................Inventory Staff ..............................................*/
			$query_invent = mysql_query("SELECT * FROM invent WHERE username='$username' AND password='$password'")or die(mysql_error());
			$num_row_invent = mysql_num_rows($query_invent);
			$row_invent = mysql_fetch_array($query_invent);

		/*...................................................Technical Staff ..............................................*/
			$query_client = mysql_query("SELECT * FROM client WHERE username='$username' AND password='$password'")or die(mysql_error());
			$num_row_client = mysql_num_rows($query_client);
			$row_client = mysql_fetch_array($query_client);
		
		/*...................................................Public User ..............................................*/
			$query_public = mysql_query("SELECT * FROM public WHERE username='$username' AND password='$password'")or die(mysql_error());
			$num_row_public = mysql_num_rows($query_public);
			$row_public = mysql_fetch_array($query_public);
		
		
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['admin_id'];
		echo 'true_admin';
		mysql_query("insert into user_log (username,login_date,admin_id)values('$username',NOW(),".$row['admin_id'].")")or die(mysql_error());
		
		}else if ($num_row_invent > 0){
		$_SESSION['invent']=$row_invent['client_id'];
		echo 'true_invent';
		mysql_query("insert into user_log (username,login_date,client_id)values('$username',NOW(),".$row_invent['client_id'].")")or die(mysql_error());
			
		}else if ($num_row_client > 0){
		$_SESSION['client']=$row_client['client_id'];
		echo 'true_technic';
		mysql_query("insert into user_log (username,login_date,client_id)values('$username',NOW(),".$row_client['client_id'].")")or die(mysql_error());
				
		}else if ($num_row_public > 0){
		$_SESSION['public']=$row_public['client_id'];
		echo 'true_public';
		mysql_query("insert into user_log (username,login_date,client_id)values('$username',NOW(),".$row_public['client_id'].")")or die(mysql_error());
		
		}else{ 
		echo 'false';
		}	
				
		?>