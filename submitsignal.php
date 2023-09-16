<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



	<title>Upload signal</title>
</head>
<body>

		<div class="form-control" >
			<form class="" id="prediction">
			<div class="col-md-4">
				<label class=""> Name</label>
				<input type="text" id="name" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> buy</label>
				<input type="number" id="buy" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> target</label>
				<input type="number" id="targ" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> sl</label>
				<input type="number" id="sl" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> result</label>
				<input type="number" id="result" class="form-control">
			</div>
			<div class=" col-md-6">
				<input type="submit" id="submit" class="btn btn-success" name="submit">
			</div>
		</form>
		</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
	
	$('#prediction').on('submit',function(event){
                event.preventDefault();
                var name = $('#name').val();
                var buy = $('#buy').val();
                var tget = $('#targ').val();
                var sl = $('#sl').val();
                var result = $('#result').val();

                var d = new Date();

                    var signal = {
                        'name':name,
                        'buy':buy,
                        'target':tget,
                        'stop':sl,
                        'result':result,
                        'date': d.getFullYear()+'-'+d.getMonth()+'-'+d.getDate(),
                        'insertdata':'insertdata'
                    }
                   
                $.ajax({
                    type:'POST',
                    url:'signalpush.php',
                    data: signal,
                    success:function(response){
						alert(response);
						$('#prediction')[0].reset();
                    } //success
                })//ajax*/
 }) //start



</script>
</body>
</html>