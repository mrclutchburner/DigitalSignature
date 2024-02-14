<?php
$con = mysqli_connect("localhost", "root", "", "sign");
if (!$con) {
    echo "connection error";
}
if (isset($_POST['submit'])) {
    $name = $file = "";
    if (isset($_POST['memnum']) && isset($_POST['name']) && isset($_POST['address'])
    && isset($_POST['acctnum']) && isset($_POST['contact']))  {
        $memnum = $_POST['memnum'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $acctnum = $_POST['acctnum'];
        $contact = $_POST['contact'];
    }


    $folderPath = "upload/";
    $image_parts = explode(";base64,", $_POST['signature']);
    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $file = $folderPath . $name . "_" . uniqid() . '.' . $image_type;

    file_put_contents($file, $image_base64);
    echo "Signature Uploaded Successfully.<script>window.location='index.php';</script>";



    $sql = "INSERT INTO employee_sign(memnum,name, address, acctnum, contact, signature_img) VALUES ('$memnum','$name', '$address', '$acctnum', '$contact', '$file')";
    $query = mysqli_query($con, $sql);
}
