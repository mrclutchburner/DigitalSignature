<?php
include 'connect_test_db.php';
$searchErr = '';
$image_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $con->prepare("select * from employee_sign where name like '%$search%' or address like '%$search%'");
		$stmt->execute();
		$image_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//print_r($employee_details);
		
	}
	else
	{
		$searchErr = "Please enter MCO's Town to Generate PDF File";
	}
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./upload/logo.png" />
    <title>ILECO II|AGMA 2024</title>
</head>
<body>
            <form class="form-horizontal" action="#" method="post">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email"><b>MCO's per Town:</b></label>
                            <div class="col-md-4" style="padding-top: 5px;">
                                <input type="text" class="form-control" name="search" placeholder="Search Here. . . .">
                            </div>
                        <div class="col-sm-2" style="padding-top: 5px;">
                            <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
                    </div>
                    
                </div>
            </form>
        <h1 style="padding-top: 10px; text-align: center;">Attendance Sheet</h1>
        <img src="./upload/pdf.png" class="pdf_icon" onclick="generatePDF();"/>
            <a href="export.php" onClick=rec();>
                    <img src="./upload/excel.png" class="excel_icon" style="height: 25px; width: auto; padding-left: 8px;"/>
            </a>
		
        <div class="printable_area">
            <h3 style="padding-left: 5%; font-size: 12px;">ILECO II 44th Annual General Membership Assembly</h3>
			<h3 style="padding-left: 5%; font-size: 12px;">Venue: __________________</h3>
            <h3 style="padding-left: 5%; font-size: 12px;">Date: __________________</h3>
            <table>
                <div class="col-xl-12 col-lg-7">
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"></div>
                            <div class="card-body p-0">
                                <div class="container my-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            
                                            <thead>
                                                <tr>
                                                <th scope="col">Membership No.</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Account No.</th>
                                                <th scope="col">Signature</th>
                                                </tr>
                                            </thead>
                                        
                                            <?php

                                            if(!$image_details)
                                            {
                                                echo '<td>NO Data Found</td>';
                                            }else{
                                                foreach($image_details as $key=>$row)
                                                {
                                                
                                                    echo "
                                                    <tr>
                                                    <td>".$row['memnum']."</td>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['acctnum']."</td>
                                                    <td><img src='".$row['signature_img']."'></td>
                                                    </tr>
                                                    ";
                                                    
                                                }
                                            }
                                            ?>
                                    </div>         
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