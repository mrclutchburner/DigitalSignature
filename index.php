<!DOCTYPE html>
<html>

<head>
    <title>ILECO II AGMA Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./upload/logo.png" />
    <script src="https://www.google.com/recaptcha/api.js?render=6LdQzg8hAAAAABeZEZOt6CGGv5ZGQjjFJhLntss4"></script>                                                                                                                                                                                                          

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="asset/js/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/css/jquery.signature.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body style="background-image: url(./upload/background.png); width: 100%; height: auto;">
    
    <div class="container p-4">

        <div class="row">
            <div class="col-md-5 border p-3  bg-white">
                <form method="POST" action="upload.php">
                    <h1 style="text-align: center; -webkit-text-stroke: .5px black; color: #ffc107; font-family: time new roman;">ILECO II</h1>
                    <h2 style="text-align: center; -webkit-text-stroke: .5px black; color: #ffc107; font-family: time new roman;">2024 AGMA Registration</h2>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <div class="col-md-12">
                        <label for="memnum" class="form-label">Membership No.</label>
                        <input type="text" 
                            class="form-control" 
                            id="memnum" 
                            placeholder="e.g. 0123456789"
                            name="memnum" required>
                    </div>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Full Name:</label>
                        <input type="text" 
                            class="form-control" 
                            id="name" 
                            placeholder="e.g. Dela Cruz, Juan T."
                            name="name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" 
                            class="form-control" 
                            id="address"
                            placeholder="e.g. Brgy. Cau-ayan, Pototan"
                            name="address" required>
                    </div>
                    <div class="col-md-12">
                        <label for="contact" class="form-label">Account No:</label>
                       
                        <input type="text"
                            class="form-control"
                            id="acct"
                            name="acctnum"
                            placeholder="e.g. 00-000-0000"
                            class="input-field" 
                            maxlength = "11" required>
                          
                    </div>
                    <div class="col-md-12">
                        <label for="contact" class="form-label">Contact No:</label>
                        <input type="text" 
                            class="form-control" 
                            id="contact" 
                            placeholder="e.g. 09123456789"
                            maxlength = "11"
                            name="contact" required>
                            
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
    <script>
      
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdQzg8hAAAAABeZEZOt6CGGv5ZGQjjFJhLntss4', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              var response = document.getElementById('token_generate');
              response.value = token;
          });
        });

    </script>
    <script>
        var account = document.querySelector('#acct');

    account.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (account.value.length === 2 || account.value.length === 6)){
    account.value += '-';
    }
    });

    </script>

</body>

</html>

