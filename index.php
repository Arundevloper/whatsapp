<?php 
     include 'include/db.connect.php';
     include 'include/Validation.php';
	 session_start();
	 if(isset($_POST['submit'])){

		$name = $_POST['wname'];
		$_SESSION['value']=1;
		header("location:wg-i.php");
	 }
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="css/navbar.css"> -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/questions.css">
	<link rel="stylesheet" href="css/navbar.css">

	<title>Whats App Group</title>
	<style>
.main{
	display:flex;
	align-content:center;
	justify-content:center;
	margin-top:0;
margin-bottom:0;
margin-left:auto;
margin-right:auto;
}

	.center {
    justify-content: center !important;
    margin-top: 21px;
    width: 800px !important;
    margin-left: auto !important;
    margin-right: auto !important;
}

		</style>
		
	</head>

<body>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	<?php 
    include 'partials/navbar.php';
    ?>
	<div class="main">
	<H1>WhatsApp Groups</H1>
	</div>

	<form action="index.php" name="myForm" method="post">
<div class="conatiner center">
<div class="d-flex  question-lists my-3">
	
<div class="container question">
			    <h3  >whats Group 1</h3>
				<input name="wname" id="wname" type="hidden" value="1"></input>
			    <div class="d-flex justify-content-between">
			      <p> </p>
			      <div class="edit-btn d-flex justify-content-between">
			      <p><button type="submit"  name="submit"  class="btn  my-3 btn-warning edit">view</button></p>
			      <p><button type="button" id="" name="delete"  class="btn my-3 btn-danger delete">Delete</button></p>
			    </div>
			    </div>
			  </div>
			</div>

			<div class="conatiner center">
<div class="d-flex  question-lists my-3">
	
<div class="container question">
			    <h3  >whats Group 2</h3>
				<input name="wname" id="wname" type="hidden"  value="2" ></input>
			    <div class="d-flex justify-content-between">
			      <p> </p>
			      <div class="edit-btn d-flex justify-content-between">
			      <p><button type="submit"  name="submit"  class="btn  my-3 btn-warning edit">view</button></p>
			      <p><button type="button" id="" name="delete"  class="btn my-3 btn-danger delete">Delete</button></p>
			    </div>
			    </div>
			  </div>
			</div>


			<div class="conatiner center">
<div class="d-flex  question-lists my-3">
	
<div class="container question">
			    <h3  >whats Group 3</h3>
				<input name="wname" id="wname" type="hidden"   value="3" ></input>
			    <div class="d-flex justify-content-between">
			      <p> </p>
			      <div class="edit-btn d-flex justify-content-between">
			      <p><button type="submit"  name="submit"  class="btn  my-3 btn-warning edit">view</button></p>
			      <p><button type="button" id="" name="delete"  class="btn my-3 btn-danger delete">Delete</button></p>
			    </div>
			    </div>
			  </div>
			</div>

			
			
			</form>

</div>



</body>

</html>