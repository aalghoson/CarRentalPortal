<?php

include 'includes/connect.php';
session_start();

if(isset($_POST['id'])){//Updating existing cars
//Variables
$year = $_POST['year'];
$make = $_POST['make'];
$model = $_POST['model'];
$type = $_POST['type'];
$price = $_POST['price'];
$desc = $_POST['desc'];

$id = $_POST['id'];
$none = true;


if(isset($year) && $year != "")
{   

$sql = "UPDATE vehicle 
SET year='$year'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated year to : ".$year."<br>";
} else {
    echo "Error updating record: " . $conn->error;
}
      $none = false;  
}

if(isset($make) && $make != "")
{
    $sql = "UPDATE vehicle 
SET make='$make'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated make to : ".$make."<br>";
} else {
    echo "Error updating record: " . $conn->error;
}
 $none = false;   
}

if(isset($model) && $model != "")
{
     $sql = "UPDATE vehicle 
SET model='$model' 
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated model to : ".$model."<br>";
} else {
    echo "Error updating record: " . $conn->error;
}
  $none = false;  
}

if(isset($type) && $type != "")
{
     $sql = "UPDATE vehicle 
SET type='$type'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated type to : ".$type."<br>";
} else {
    echo "Error updating record: " . $conn->error;
}
 $none = false;
}

if(isset($price) && $price != "")
{
    $sql = "UPDATE vehicle 
SET price='$price'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated price to : ".$price."<br>";
} else {
    echo "Error updating record: " . $conn->error;
}   
 $none = false;
}

if(isset($desc) && $desc != "")
{
    $sql = "UPDATE vehicle 
SET description='$desc'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated description to : ".$desc."<br>";
} else {
    echo "Error updating record: " . $conn->error;
} 
 $none = false;
}

if( !($_FILES['image']['name'] == ""))
{ 
 $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $sql = "UPDATE vehicle 
SET pic_link='$target_file'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated picture to : ".$target_file."<br>";
} else {
    echo "Error updating record: " . $conn->error;
} 
    echo "File already exists.<br>";
    $uploadOk = 2;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else if($uploadOk == 2){
    //just do nothing
}
    else{
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.<br>";
        $sql = "UPDATE vehicle 
SET pic_link='$target_file'
WHERE vehicle_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Updated picture to : ".$target_file."<br>";
} else {
    echo "Error updating record: " . $conn->error;
} 
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}

    $none = false;
}

if($none)
    echo "No fields were altered, so no changes were made.<br>";
}else{//Inserting new cars
    $year = $_POST['year'];
$make = $_POST['make'];
$model = $_POST['model'];
$type = $_POST['type'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$pic_link = "test";  
      
     //Picture upload begins +++++++++++++++++++++++++++++++++++++++++++++++++
    $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "File already exists.<br>";
    $uploadOk = 2;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else if($uploadOk == 2){
    //just do nothing
}
    else{
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}
    //Picture upload ends +++++++++++++++++++++++++++++++++++++++++++
    
    
 $insertSQL = "INSERT INTO vehicle (make, model, year, type, price, description, pic_link) VALUES ('$make','$model','$year','$type','$price','$desc','$target_file');";
    
    if ($conn->query($insertSQL) === TRUE) {
    echo "Vehicle successfully added.<br>";
} else {
    echo "Error adding record: " . $conn->error;
} 
    
   
}
?>