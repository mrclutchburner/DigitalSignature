<!DOCTYPE html>
<html>

<head>
    <title>ELECO II AGMA E-Signature Pad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="asset/js/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/css/jquery.signature.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body class="bg-light">
    
    <div class="container p-4">

        <div class="row">
            <div class="col-md-5 border p-3  bg-white">
                <form method="POST" action="upload.php">
                    <h1 style="text-align: center;">ILECO II</h1>
                    <h1 style="text-align: center;">2024 AGMA Registration</h1>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="memnum" class="form-label">Membership No.</label>
                        <input type="text" class="form-control" id="memnum" name="memnum" required>
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="col-md-12">
                        <label for="acctnum" class="form-label">Account No:</label>
                        <input type="text" class="form-control" id="acctnum" name="acctnum" required>
                    </div>
                    <div class="col-md-12">
                        <label for="contact" class="form-label">Contact No:</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>
                    <div class="col-md-12">
                        <label class="" for="">Signature:</label>
                        <br />
                        <div id="sig"></div>
                        <br />

                        <textarea id="signature64" name="signature" style="display: none"></textarea>
                        <div class="col-12">
                            <button class="btn btn-sm btn-warning" id="clear">Clear Signature</button>
                        </div>
                    </div>

                    <br />
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>

    </div>

    

    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>

</body>

</html>