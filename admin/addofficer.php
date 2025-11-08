<?php
 
require_once "header.php";
 


?>
<html>
<head>
<title></title>

 
 
</head>
<body>

	<?php
	 
	 
	$msg='';
	if(isset($_POST['submit'])){
    $name=$_POST['name'];
	$email=$_POST['email'];
    $password=$_POST['password'];
	$query="INSERT into officer (name,email,password)VALUES";
    $query.="('$name','$email','$password')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Add successfuly.");
       
        redirect_to("adminpanel.php");
    }else{
			$msg="officer already exist";
        
    }
}
 
?>
  

  <div>
		<h3 class="container"> Add Officer</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >
	 
   <div class="form-group">
    <label for="fname">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required="" Placeholder="name:">
  </div>
  
   <div class="form-group">
    <label for="name">e-Mail:</label>
    <input type="email" class="form-control" id="email" name="email" required="" Placeholder="Enter e-Mail add:">
  </div> 
    <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="" Placeholder="Enter password:">
  </div>
    
  
  <input type="submit" class="btn btn-default" value="Click to Add" name="submit" id="submit"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>


</body>




</html>
