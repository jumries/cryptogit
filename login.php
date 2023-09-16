<?php 
include('topbar.php');
?>
<body>
	<?php
		include('header.php');
		?>

		<!doctype html>
<html lang="en">
  <head>
  	<title>Login to CRYPTOGIT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">log in</h3>
						<form action="#" id="cryptogitlogin" class="login-form">
		      		<div class="form-group">
		      			<input type="text" id="email" value="e@gmail.com" class="form-control rounded-left" placeholder="Email Address" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" id="passward" value="123" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  			$('#cryptogitlogin').on('submit', function(event){
  				event.preventDefault();
  				
  				var email 		= $('#email').val();
    			var passward 	= $('#passward').val();

    		var logininfo = {
				'email': email,
    			'passward': passward,
    			'loginuser': 'yes',
    		}
    			$.ajax({
    			type: 'POST',
    			url: 'insert.php',
    			data: logininfo,
    			success:function(response){
    				//console.log(response);
    		 		var resp = JSON.parse(response);
    		 		console.log(resp.status);
    		 	
               
              Swal.fire({
	                position: 'top-center',
	                icon: resp.status,
	                title: resp.message,
	                showConfirmButton: false,
	                timer: 4000
              });

              if(resp.status == 'success'){
              	window.location.href = 'about.php';
              }


    				}
    		})


  	})
  </script>





		<?php
		include('footer.php');

	?>
</body>
</html>