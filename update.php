<?php
include("db.php");
include("func.php");

$id = $_GET['id'];

$obj = new Func();
$result = $obj->getSingleData('submitsignal',$id);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<title>Upload signal</title>
</head>
<body>

		<div class="form-control" >
			
	
			<form class="" id="updatetable">
			<div class="col-md-4">
				<label class=""> Name</label>
				<input type="text" id="name" value="<?php echo $result->name;?>" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> buy</label>
				<input type="text" id="buy" value="<?php echo $result->buy;?>" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> target</label>
				<input type="text" id="targ" value="<?php echo $result->target;?>" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> sl</label>
				<input type="text" id="sl" value="<?php echo $result->stop;?>" class="form-control">
			</div>
			  <div class="col-md-4">
				<label class=""> result</label>
				<input type="text" id="result" value="<?php echo $result->result;?>" class="form-control">
			</div>
			<div class=" col-md-6">
				<input type="submit" id="submit" class="btn btn-success" name="submit">
			</div>
		</form>

		</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
	
	$('#updatetable').on('submit',function(event){
                event.preventDefault();
                var id = <?php echo $id; ?>;
                var name = $('#name').val();
                var buy = $('#buy').val();
                var tget = $('#targ').val();
                var sl = $('#sl').val();
                var result = $('#result').val();

                var d = new Date();

                    var signal = {
                        'id':id,
                        'name':name,
                        'buy':buy,
                        'target':tget,
                        'stop':sl,
                        'result':result,
                        'date': d.getFullYear()+'-'+d.getMonth()+'-'+d.getDate(),
                        'up':'update',
                    }
                   
                $.ajax({
                    type:'POST',
                    url:'signalpush.php',
                    data: signal,
                    success:function(response){
						alert(response)
						window.location.href = 'board.php';
					
                    } //success
                })//ajax*/
 }) //start



</script>
</body>
</html>


?>