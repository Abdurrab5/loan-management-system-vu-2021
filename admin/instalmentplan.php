<?php

require_once "header.php";

 

?>
<html>
<body >


<div class='container '>
<div class="col-md-">
				<div class="card bg-dark">
					<div class="card-body bg-dark">
						<table class="table table-bordered table-hover ">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center ">Loan Plan</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$query="SELECT * FROM loan_tenor inner join loan_type on loan_tenor.tenor_id=loan_type.id ";
								 $result= mysqli_query($link,$query);
								while($row=mysqli_fetch_assoc($result)){
									
									$type=$row['loan_type_name'];
									$descp=$row['discreption'];
									$price=$row['price'];
									$amount=$row['loan_size'];
									$months = $row['month'];
									$months = $months / 12;
									if($months < 1){
										$months = $row['month']. " month";
									}else{
										$m = explode(".", $months);
										$months = $m[0] . " yrs.";
										if(isset($m[1])){
											$months .= " and ".number_format(12 * ($m[1] /100 ),0)."month/s";
										}
									}
									
									
									
								?>
							<?php
									
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
									<p>Loan Category: <b><?php echo $type ?></b></p>
									<p>Discreption: <b><?php echo $descp ?></b></p>
									<p>House unit price: <b><?php echo $price ?></b></p>
									<p>Max loan: <b><?php echo $amount ?></b></p
										 <p>Years/Month: <b><?php echo $months ?></b></p>
										 
										 <p><small>Interest: <b><?php if($months>0){
											 
												 echo'3% for 5 years and 5 % for next';
											 
												
									}
										 if($months>120){
										 echo'5% for 5 years and 7 % for next';
									}
										 
										 if($months>180){
											echo'7 % for 5 years and 9 % for next';
									}
										 
									"%" ?></b>
									</td>
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
</body>
</html>