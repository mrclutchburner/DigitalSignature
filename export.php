<?php
require_once 'upload.php';

// Filter the excel data

function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '""';
}

// Excel file name fordownload
$filename = "members_export_data-" . date('Ymd') . ".xlsx";

// Column names
$fields = array('name', 'address', 'acctnum', 'contact');

// Display column name as first row
$excelData = implode("\t", array_values($fields)) . "\n";

// Get records from the database
$query = $db->query("SELECT * FROM employee_sign ORDER BY id ASC");

if($query->num_rows > 0){
    // Output each row of the data
    $i=0;
    while($row = $query->fetch_assoc()){ $i++;
        $rowData = array($i, $row['name'], $row['address'], $row['acctnum'], $row['contact']);
        array_walk($rowData, 'fileData');
        $excelData .= implode("\t", array_values($rowData)) . "\n";
    }
}else{
    $excelData .= 'No records found...'. "\n";
}

// Headers for download
header("Content-Disposition: attachment; filename=\$filename\"");
header("content-Type: application/vnd.ms-excel");

// Render excel data
echo $excelData;

exit;
