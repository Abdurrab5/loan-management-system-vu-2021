        <?php
require_once "connection.php";
require_once "header.php";
require_once "functions.php";


?>
<html>
<head>
<title></title>

 
 
</head>
<body>

	<?php
	 
	 
	$msg='';
	if(isset($_POST['submit'])){
	  
    $username=$_POST['username'];
    $father_name=$_POST['father_name'];
	$cnic=$_POST['cnic'];
	$salary=$_POST['salary'];
    $loan_category=$_POST['loan_category'];
	$amount=$_POST['amount'];
	$duration=$_POST['duration'];
   
    $query="INSERT into application ( username,father_name,cnic, salary,loan_category ,amount,duration, status) VALUES";
    $query.="( '$username','$father_name','$cnic','$salary','$loan_category','$amount','$duration', 'pending')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Request send successfuly.");
       
        redirect_to("clientpanel.php");
    }else{
			$msg="customer already exist";
        
    }
}                                                                              
 ?>
  

 <div class="container bg-light" >
		<h3 > Client Loan Application</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >
	 
  <div class="form-group">
    <label for=" name">Name:</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['clientname']?>" name="username"  readonly>
  </div>
 <div class="form-group">
     <label for="name">father Name:</label>
    <input type="text" class="form-control" id="father_name" name="father_name" required="" Placeholder="father_name:" >
  </div>
  <?php 
  $id=$_SESSION['clientname'];
  
  $query="SELECT cnic FROM client where username='$id' ";
   
           $result= mysqli_query($link,$query);
		   $row=mysqli_fetch_assoc($result);
		                                              
   ?>
   <div class="form-group">
    <label for="name">NIC</label>
		   <input type="text" class="form-control" id="cnic" name="cnic" value="<?php echo  $row['cnic'];?>">
  </div> 
   <div class="form-group">
    <label for="name">salary:</label>
    <input type="text" class="form-control" id="salary" name="salary" required="" Placeholder="Enter salary  :">
  </div> 
  
  <div ><label for="loan_category:">loan category:</label>
<select  class="text-dark" name="loan_category">
  <option  value="Tier1">Tier1</oprtion>
  <option   value="Tier2">Tier2</option>
  <option   value="Tier3">Tier3</option>
  
</select></div>
<div ><label for="amount:">amount:</label>
<select  class="text-dark" name="amount">
  <option  value="2700000">2700000</oprtion>
  <option   value="3000000">3000000</option>
  <option   value="5000000">5000000</option>
  
</select></div>

<div>
<label for="duration:">Duration:</label>
<select  class="text-dark" name="duration">
  <option value="120" >10 years</option>
  <option value="180">15 years</option>
  <option value="240">20 years</option>
  
</select></div>
   
  
  <input type="submit" class="btn btn-default" value="Click to Apply" name="submit" id="submit"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/>
   <div class="field_error text-danger"><?php echo $msg?></div>
</div>
</form>
</div>


</body>




</html>
