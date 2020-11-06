<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="handle.css">
</head>
<body>
<?php
$first_name=$_POST['firstName'];
$last_name=$_POST['lastName'];
$full_name=trim($first_name)." ".trim($last_name);

/*
 * read json file
 */

// open file
$fileName = "birthday.json";
$jsonFile = fopen("birthday.json", "r") or die("Unable to open file!");

// get json string from file
$jsonData = file_get_contents($fileName);

// decode json into array, returning fully-associative array (hash table/hash map)
$arrData = json_decode($jsonData, true);

$flag=false;

for ($i = 0; $i < count($arrData); $i++) {

    // get a record
    $record = $arrData[$i];
    if($full_name==$record['name']){
    // print the name and birthday
    // echo $record['name'] . " " . $record['birthday'];  
    echo  
        "<div class='found'>"
        ."Full Name: ".$record["name"].
        "</div>",
        "<div class='found'>"
        ."Birthday: ".$record["birthday"].
        "</div>";
        echo '
        <div class="found">
        <a href="index.php"><img src="back.png" alt="Back" style="width:42px;height:42px;"></a>
        </div>
        ';
    $flag=true;
    return;
    }
}
if(!$flag){
    echo '
    <div class="failed">
    <p>Not Found...! Please try with another name.</p>
    <a href="index.php"><img src="back.png" alt="Back" style="width:42px;height:42px;"></a>
    </div>
    ';
}
// close file
fclose($jsonFile)
?>
</body>
</html>