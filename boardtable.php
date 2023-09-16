<!doctype html>
<html lang="en">
  <head>
  	<title>LAST CALL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	</head>
	<body>
		<script>
			var page = 1;
	</script>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">LAST CALL</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table" id="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>ID</th>
						      <th>Name</th>
						      <th>Buy Zone</th>
						      <th>Target</th>
						      <th>SL</th>
						      <th>Result</th>
						      <th>Date</th>
						      <th>Action</th>
						    </tr>
						  </thead>

						  <?php 
						  			include("func.php");
  						?>

						  <tbody>
						  	
						  </tbody>

						</table>
						  <nav aria-label="Page navigation example">
							  <ul class="pagination">
							    <li class="page-item"><button onClick="prevPage(--page)" class="page-link" >Previous</button></li>
							    <li class="page-item"><button onClick="nextPage(++page)" class="page-link">Next</button></li>
							  </ul>
							</nav>
					</div>
				</div>
			</div>
		</div>
	</section>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
     <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
	$( window ).on( "load", function(e){
		e.preventDefault();
		// var page = 1;
		gettData(page);
	});

	function prevPage(page){
	
		// alert(page)
		gettData(page)
	}
	function nextPage(page){
	
		// alert(page)
		gettData(page)
	}
		function gettData(page){
			$.ajax({
				url:'signalpush.php?datacollect=yes&page='+page,
				type: 'get',
				success:function(response){
					var dt = JSON.parse(response);
					var tr = "";
					dt.map((value, index) => {
						var td = "<td>"+value.id+"</td>";
					  td +=	"<td>"+value.name+"</td>";
					  td +=	"<td>"+value.buy+"</td>";
					  td +=	"<td>"+value.target+"</td>";
					  td +=	"<td>"+value.stop+"</td>";
					  td +=	"<td>"+value.result+"</td>";
					  td +=	"<td>"+value.date+"</td>";
					  td +=	"<td><a href='#' class='close mx-1' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='fa fa-edit'></i></span></a><a href='#' class='close mx-1' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='fa fa-trash'></i></span></a></td>";
						tr +="<tr class='alert' role='alert'>"+td+"</tr>";
					});
					$('#table tbody').empty();
					$("#table tbody").append(tr);
					if(page < 2){
						$(".pagination li:first button").addClass("disabled");
					} else {
						$(".pagination li:first button").removeClass("disabled");
					}
				}
			})
		}
</script>
	</body>
</html>

