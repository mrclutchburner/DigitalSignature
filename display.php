<html>
 <head>
 <title>display image</title>
 </head>
 <body>
 <p>View signature</p>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "sign");
	$image_details  = mysqli_query($conn, "SELECT * FROM employee_sign");
     while ($row = mysqli_fetch_array($image_details)) {     
		echo "".$row['name']."";   
      	echo "".$row['address']."";   
		echo "".$row['acctnum']."";    
		echo "".$row['contact']."";     
		echo "<img src='".$row['signature_img']."' height= 65px width= auto>";   
      
    }     

	?>
 </body>
 </html>