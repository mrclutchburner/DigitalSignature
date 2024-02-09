<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <button><a href="../export.php" title="Click to export">Export to Excel</a></button>
        <img src="../upload/pdf.png" class="pdf_icon" onclick="generatePDF();"/>
        <div class="printable_area">
            <table>
                
            <div class="col-xl-12 col-lg-7">
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center; font-size: 20px;">Data Sheet</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="container my-3">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "sign");
                        $image_details  = mysqli_query($conn, "SELECT * FROM employee_sign");
                        

                        

                        ?>
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
                                        while ($row = mysqli_fetch_array($image_details))
                                        {
                                            echo "<tr>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['address']."</td>
                                                    <td>".$row['acctnum']."</td>
                                                    <td>".$row['contact']."</td>
                                                    <td><img src='".$row['signature_img']."'></td>
                                                 </tr>";
                                        }
                                        
                                        ?>
                                        
                                    
                                    </table>
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
            h1, h2{
                margin: 0;
                text-align: center;
                font-weight: 200;
            }
            .table{
                margin: 0 auto;
                width: 80%;
                border-collapse:collapse;
                margin-bottom: 56px;
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
                height: 20px;
                width: auto;
                border: 1px solid #a7a7a7;
            }
            img{
                height: 10px;
                width: auto;
            }
        </style>  
        <script src="../pdf.js"></script>
    </body>
    </html>
   


               