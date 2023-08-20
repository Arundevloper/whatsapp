<?php 
     include 'include/db.connect.php';
     include 'include/Validation.php';


     session_start();

     $value=$_SESSION['itemname'];
     $answerSet=new Users();
     $answerCount=$answerSet->getTheData("SELECT * FROM item WHERE item_name LIKE '%$value%' AND issold = '0' AND expiration_timestamp > NOW();");

    
  
    $insertData=new InsertData();

    if(isset($_POST['submit'])){

      $itemname = $_POST['itemname'];
      $price = $_POST['price'];
      $desc = $_POST['desc'];



       $insertData->query("INSERT INTO `item` (`item_name`, `Item_description`, `mid`,`price`, `time_stamp`, `issold`) VALUES ('$itemname', '$desc', '$value','$price', current_timestamp(), '0');");
       header("location:marketplace.php");
     }
     


     if(isset($_POST['search'])){
      $itemname = $_POST['search'];
     $_SESSION['itemname']=$itemname;
     header("location:search.php");
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

	<title>Marketplace</title>
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
.card{
    display:flex !important;
    flex-direction: row !important;
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


    if(isset($_POST['buy'])){

     
     $_SESSION['isbuy']=true;
   $item_id = $_POST['item_id'];;
       $insertData->query("UPDATE `item` SET `issold` = '1' WHERE `item`.`item_id` = '$item_id';");
  
       header("location:su.php");
     
  
     }
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
      <form action="marketplace.php" name="myForm" method="post">
      <div class="modal-body">
      <div class="form-group">
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Item Name</label>
    <input type="text" class="form-control" name="itemname" id="formGroupExampleInput" placeholder="Item name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Price</label>
    <input type="text" name="price" class="form-control" id="formGroupExampleInput" placeholder="Price">
  </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Item desciption</label>
    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Upload item image</label>
    <input type="file" class="form-control-file" name="image" id="customFile">
  </div>

  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Add Item</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="marketplace.php" name="myForm" method="post">
	<div class="main">
    <div>
	<h1>Marketplace<h1>
</div>
<div class="ml-2">
  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
</div>
<div class="ml-2">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</div>
<div class="btn-group ml-2">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="modal" data-target="#exampleModal">
Add Item
  </button>
  
</div>

    </form>
   
	</div>
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>


<?php

if($answerCount==NUll){
echo'<div class="alert center alert-primary" role="alert" style="width:50rem;">
No item is there!
</div>';
}
else{
  foreach ($answerCount as $answerCount){
    echo'<div class="conatiner  center">
    <div class="card" style="width: 50rem;">
    <div>
    <img src="a.jpg" class =" mt-2 ml-2"alt="" style="width:75px !important; height: 75px !important;"></img>
    </div>
    <div class="card-body">
        <h5 class="card-title">'.$answerCount['item_name'].' -RS '.$answerCount['price'].'.</h5>
        <p class="card-text">'.$answerCount['Item_description'].'</p>
      </div>
      <div class=" my-5 mr-2">
      
      <form action="marketplace.php" name="myForm" method="post">
      <input value="'.$answerCount['item_id'].'" name="item_id" type="hidden"></input>
    <button type="submit"  name="buy" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Buy</button>
 </form>
    </div>
    </div>';
  }
}
?>







<!-- 
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="marketplace.php" name="myForm" method="post">
        <button type="submit" name="submit" class="btn btn-primary">pay</button>
</form>
      </div>
    </div>
  </div>
</div>  -->

</body>

</html>