<?php
$con = mysqli_connect("localhost", "root", "", "sign");
if (!$con) {
    echo "connection error";
}
if (isset($_POST['submit'])) {
    $name = $file = "";
    if (isset($_POST['memnum']) && isset($_POST['name']) && isset($_POST['address'])
    && isset($_POST['acctnum']) && isset($_POST['contact']))  {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
        
        $memnum = validate($_POST['memnum']);
        $name = validate($_POST['name']);
        $address = validate($_POST['address']);
        $acctnum = validate($_POST['acctnum']);
        $contact = validate($_POST['contact']);
   

    $folderPath = "upload/";
    $image_parts = explode(";base64,", $_POST['signature']);
    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $file = $folderPath . $name . "_" . uniqid() . '.' . $image_type;

    file_put_contents($file, $image_base64);

    $user_data = 'acctnum'. $acctnum. 'name'. $name. 'address'. $address;

    if (empty($acctnum)) {
		header("Location: http://192.168.10.228:8084/Signature//?error=Account number is required!&$user_data");
	    exit();
	}else if(strlen($acctnum) < 11){
        header("Location:  http://192.168.10.228:8084/Signature//?error=Invalid Account Number!&$user_data");
	    exit();
    } else if(empty($name)){
        header("Location:  http://192.168.10.228:8084/Signature//?error=Fullname is required!&$user_data");
	    exit();
	}
    else if(empty($address)) {
        header("Location:  http://192.168.10.228:8084/Signature//?error=Address is required&$user_data");
	    exit();
	}
    else if(empty($contact)) {
        header("Location:  http://192.168.10.228:8084/Signature//?error=Contact Number is required&$user_data");
	    exit();
	}
	else if(strlen($contact) < 11){
        header("Location:  http://192.168.10.228:8084/Signature//?error=Invalid Mobile Number!&$user_data");
	    exit();
    }

       else{
        //hashing account number
		$sql = "SELECT * FROM employee_sign WHERE acctnum='$acctnum'";
		$query = mysqli_query($con, $sql);

		if (mysqli_num_rows($query) > 0) {
            header("Location: http://192.168.10.228:8084/Signature//?error=The account number is already used&$user_data");
	        exit();
            }
            else{
                    //hashing account name
                 $sql = "SELECT * FROM employee_sign WHERE name='$name'";
                $query = mysqli_query($con, $sql);
    
                if (mysqli_num_rows($query) > 0) {
                    header("Location: http://192.168.10.228:8084/Signature//?error=The account name is already used!&$user_data");
                    exit();
            }
             else{
                //validate if exist in database
             $query = "SELECT accountnum FROM accoutdata WHERE accountnum ='".$_POST['acctnum']."'";
             $query = mysqli_query($con, $query);

             if (mysqli_num_rows($query) <= 0) {
                header("Location: http://192.168.10.228:8084/Signature//?error=INVALID ACCOUNT NUMBER!&$user_data");
                exit();
             }
            else{
                $sql = "INSERT INTO employee_sign(memnum,name, address, acctnum, contact, signature_img) VALUES ('$memnum','$name', '$address', '$acctnum', '$contact', '$file')";
                $query2 = mysqli_query($con, $sql);
                if ($query2){
                    header("Location: http://192.168.10.228:8084/Signature//?success=Your registration has been completed!");
                    exit();
                }else{
                        header("Location: http://192.168.10.228:8084/Signature//?error=Page ERROR 404&$user_data");
                        exit();
                }
            }
        }
      }
	}

}
   
}
else {
	header("Location: http://192.168.10.228:8084/Signature");
	exit();
}
