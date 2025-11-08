 <?php
 

require_once "header.php";

 

?>
<html>
<head>


 
 
</head>
<body>
<?php
 

if(isset($_GET['appid']) && $_GET['appid']!=''){
$cid=$_GET["appid"];
$name=$_GET["username"];
$months=$_GET["months"];
$amount=$_GET["amount"];

$payable="";
	 if($months>0){
			if($months>=60){
			$first=$amount*3/100;
			
		}if($months>61){
			$second=$amount*5/100;
			}
			$payable=$first+$second+$amount	;
		}
if($months>120){
 if($months>=60){
			$first=$amount*5/100;
			
		}if($months>61){
			$second=$amount*7/100;
			}
			$payable=$first+$second+$amount	;
		}

 if($months>180){
	 if($months>=60){
			$first=$amount*7/100;
			
		}if($months>61){
			$second=$amount*9/100;
			}
			$payable=$first+$second+$amount	;
		}
									
		$permonth=$payable/$months;
	
$date=date_create("2021-09-25");
for ($i=1;$i<=$months;$i++){
	
date_modify($date," +1 month");
$dat=date_format($date,'y-m-d');


$payable=$payable-$permonth;

$payable--;




	

 $query="INSERT into loan_schedul (loan_id,username,totalamount, amount,date_due ) VALUES";
    $query.="('$cid','$name','$payable','$permonth','$dat')";
$result= mysqli_query($link, $query);}		
	 
			$query="UPDATE application SET status='approve' where appid='$cid' ";
			 $result= mysqli_query($link, $query);
}
	

	$query="SELECT * FROM application WHERE status='pending' ";
   
           $result= mysqli_query($link,$query);
       
?>
 



<div>
				
				<div class="container" >
<table class="table">

						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Application ID</th>
							   <th>Name</th>
							    <th>Father Name</th>
								<th>NIC</th>
							   <th>salary</th>
							   <th>loan type</th>
							    <th>Amount</th>
							   <th>duration</th>
				   			  <th>Status</th>
							   <th>Atcion</th>
							 </tr>
			 </thead>
						 <tbody>

						
<?php	
		$i=1;
	while( $row=mysqli_fetch_assoc($result)){
		$id=$row['appid'];
	    $name= $row['username'];
		$fname=$row['father_name']; 
		$categ=$row['loan_category'];
		$amount=$row['amount'];
		$cnic= $row['cnic']; 
		$sal=$row['salary'];
		$months=$row['duration'];
			?>
							<tr>
							   <td class="serial"><?php echo $i++; ?></td>
					  		
	<td><?Php  echo $id; ?></td>	 
    <td><?Php echo $name; ?></td>
     <td><?Php echo $fname; ?></td>
	  <td><?Php echo $cnic; ?></td>
	  <td><?Php echo $sal; ?></td>
	   <td><?Php echo $categ; ?></td>
	    <td><?Php echo $amount; ?></td>
	   <td><?Php echo $months; ?></td>
	   <td><?Php echo $row['status']; ?></td>
	   <form method="get">
	
	   <input type="hidden" value="<?Php echo $name; ?>" name="username">
	   <input type="hidden" value="<?Php echo $months; ?>" name="months">
	    <input type="hidden" value="<?Php echo $amount; ?>" name="amount">
	 
	   <td><button class="btn btn-info"  value="<?php echo $row['appid']?>" type="submit" name="appid"> Approve</button></td>
	    
		
	 
		</form>
  </tr>
		
							
                            
							  
						 </tbody>
					  
				   </div>
				

   
   
<?php

							};	
?>		</table>
</div>
<?php
			

     
	 
	
	
			
	
	

?>
 			


</body>




</html>