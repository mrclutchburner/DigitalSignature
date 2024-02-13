<html>
 <head>
 <title>AGMA 2024</title>
 </head>
 <body>
 		
		
        <img src="./upload/pdf.png" class="pdf_icon" onclick="generatePDF();"/>
		<a href="export.php" onClick=rec();>
                <img src="./upload/excel.png" class="excel_icon" style="height: 25px; width: auto; padding-left: 8px;"/>
        </a>
		
        <div class="printable_area">
			<h1 style="padding-top: 10px; text-align: center;">Attendance Sheet</h1>
			<h3 style="padding-top: 0px; text-align:center; align-items:center;">AGMA 2024</h3>
            <table>
                
            <div class="col-xl-12 col-lg-7">
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        
                    </div>
                    <div class="card-body p-0">
                        <div class="container my-3">
						<div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								
								<thead>
									<tr>
									<th scope="col">Name</th>
									<th scope="col">Address</th>
									<th scope="col">Account No.</th>
									<th scope="col">Contact No.</th>
									<th scope="col">Signature</th>
									</tr>
								</thead>
							
								
								<?php
								$conn = mysqli_connect("localhost", "root", "", "sign");
								$image_details  = mysqli_query($conn, "SELECT * FROM employee_sign");
								while ($row = mysqli_fetch_array($image_details)) {    
									echo "<tr>
										<td>".$row['name']."</td>
										<td>".$row['address']."</td>
										<td>".$row['acctnum']."</td>
										<td>".$row['contact']."</td>
										<td><img src='".$row['signature_img']."' height= 65px width= auto></td>
									</tr>"; 
									
								}     

								?>
								
								</div>
                        
                        </div>
                    </div>
                
                </div>
            </div>
            </table>
        </div>  
			<style>
            *{
                font-size: "Segoe UI";
            }
            .pdf_icon{
                display:block;
                position: absolute;
                position: fixed;
                top: 15%;
                left: 2%;
                width: 40px;
            }
            .pdf_icon:hover{
                opacity: .5;
                cursor: pointer;
            }
			.excel_icon{
                display:block;
                position: absolute;
                position: fixed;
                top: 20%;
                left: 2%;
                width: 40px;
            }
            .excel_icon:hover{
                opacity: .5;
                cursor: pointer;
            }
            h1, h2{
                margin: 0;
                text-align: center;
                font-weight: 200;
            }
            .table{
                margin: 0 auto;
                width: 80%;
                border-collapse:collapse;
                margin-bottom: 65px;
            }
            th{
                padding: auto;
                font-weight: 500;
                font-size: larger;
            }
            td{
                align-items: center;
                text-align: center;
                font-size: 16px;
                width: auto;
                border: 1px solid #a7a7a7;
            }
            img{
                height: 30px;
                width: auto;
            }
        </style>  
        <script src="./pdf.js"></script>
		
                                    
                       
 </body>
 </html>