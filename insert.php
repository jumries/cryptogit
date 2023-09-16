<?php 
include('db.php');

if (isset($_POST['resister']) && $_POST['resister'] == 'yes' ) {
			$fname 	= $_POST['fname'];
			$lname 	= $_POST['lname'];
			$bdate 	= $_POST['bdate'];
			$email 	= $_POST['email'];
		$passward 	= password_hash($_POST['passward'], PASSWORD_BCRYPT);
			$phone 	= $_POST['phone'];
			$gender = $_POST['gender'];
			$date = date_default_timezone_set('UTC');
			

		if (!empty($fname && $lname && $bdate && $email && $phone && $gender && $passward) ) {
			
			$insert = "INSERT INTO `resister`(`first_name`, `last_name`, `email`, `password`, `birthday`, `gender`, `date`) VALUES ('".$fname."','".$lname."','".$email."','".$passward."','".$bdate."','".$gender."','".$date."')";
				$query = mysqli_query($con,$insert);
				if ($query) {
					echo "hey ".$fname." Congratulation";
				}
		}
}
if (isset($_POST['loginuser']) && $_POST['loginuser'] == 'yes' ) {
				$email 	= $_POST['email'];
				$passward 	= $_POST['passward'];
			if (!empty($email && $passward)) {
				$select = "SELECT `id`, `first_name`, `last_name`, `email`, `password`, `birthday`, `gender` FROM `resister` WHERE `email` = '".$email."' LIMIT 1 ";
				$query = mysqli_query($con,$select);
				
					
				if (mysqli_num_rows($query)>0) {
					$login = mysqli_fetch_array($query,MYSQLI_ASSOC);

					if (!password_verify($passward, $login['password'])) {
						
						$res = [
							'status' => 'error',
							'message' => $login['password'],
						];
					}else{
						$login['shipping'] = 300;
						session_start();
						$_SESSION['loginuser'] = $login;
						$res = [
							'status' => 'success',
							'message' => 'WELCOME to CRYPTOGIT '.$login['first_name'],
						];
					}
				}else{
					
					$res = [
							'status' => 'error',
							'message' => 'email isnt match',
						];
				}

					echo json_encode($res);
			
			}
}


?>