<?php 
     include 'include/db.connect.php';
     include 'include/Validation.php';
     session_start();

     $value=$_SESSION['value'];
     $answerSet=new Users();
     $answerCount=$answerSet->getTheData("SELECT * FROM `wg` where `wid`=$value");
     foreach ($answerCount as $answerCount) {
    $val=  $answerCount['marketplace'];
     }

     if(isset($_POST['submit'])){
      $mname = $_POST['mname'];
      $insertData=new InsertData();
       $insertData->query(" UPDATE `wg` SET `marketplace` = '1' WHERE `wg`.`wid` = $value;");
       $insertData->query("INSERT INTO `marketplace` (`mid`, `wid`, `Marketplace name`) VALUES (NULL, '$value', '$mname');");
       header("location:wg-i.php");
     }

     if(isset($_POST['remove'])){
      $insertData=new InsertData();
       $insertData->query(" UPDATE `wg` SET `marketplace` = '0' WHERE `wg`.`wid` = $value;");
       $insertData->query("DELETE FROM `marketplace` WHERE `marketplace`.`mid` = $value");
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<!-- <link rel="stylesheet" href="css/navbar.css"> -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/questions.css">
	<link rel="stylesheet" href="css/navbar.css">
    <script src="script/jquery.js"></script>

	<title>Whats App Group</title>
	<style>
.main{
	display:flex;
	align-content:center;
	justify-content:center;
	margin-top:0;
margin-bottom:0;

}

	.center {
    justify-content: center !important;
    margin-top: 21px;
    width: 800px !important;
    margin-left: auto !important;
    margin-right: auto !important;
}
.question-lists {
    width: 798px !important;
 
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MarketPlace Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="wg-i.php" name="myForm" method="post">
    <input type="text" class="form-control" name="mname" id="mname" id="formGroupExampleInput" placeholder="write market place name">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="remove"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="wg-i.php" name="myForm" method="post">
      <h2>Are you sure?</h2>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
        <button type="submit" name="remove" class="btn btn-primary">Remove</button>
</form>
      </div>
    </div>
  </div>
</div>



	<div class="main">
	<h1>WhatsApp Groups 1<h1>
        <!-- Example single danger button -->
<div class="btn-group ml-2">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Settings
  </button>
  <div class="dropdown-menu">
    <?php
    if($val==0){
echo '<a class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#">Create Marketplace</a>';
    }
    else{
      echo '<a class="dropdown-item btn btn-danger" data-toggle="modal" data-target="#remove" href="#">Remove Marketplace</a>';
    }
    
   ?>
  </div>
</div>
   
	</div>
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
<div class="conatiner center">


<div class="card" style="width: 50rem; height:31rem;">
  
</div>
<div class="d-flex  message question-lists">
<input type="text" class="form-control" id="formGroupExampleInput" placeholder="write message">
<button type="submit" value=""  name="edit"  class="btn  my-3 btn-success edit"><i class="bi bi-paperclip"></i></button>
	<button type="submit" value=""  name="edit"  class="btn  my-3 btn-success edit"><i class="bi bi-currency-rupee"></i></button>
  
<?php
  if($val==1){
    
  echo  '
  <form action="marketplace.php" name="myForm" method="post">
  <button type="submit" value=""  name="edit"  class="btn  my-3 btn-dark edit"> <i class="bi bi-shop"></i></button>
  
</form>';}
    ?>

</div>



</body>

</html>