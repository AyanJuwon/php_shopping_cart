<?php

include "vendor/autoload.php";
include "src/initialize.php";

use Src\helper\StringUtils;
use Src\models\Ratings;
 

$rating = new Ratings();

if(!empty($_POST['rating']) && !empty($_POST['productId'])){
$rating->productId = $_POST['productId'];
$rating->userId = 1;
$rating->ratingNumber = $_POST['rating'];
$rating->created = date("Y-m-d H:i:s");
$rating->modified = date("Y-m-d H:i:s");
// $insertRating = "INSERT INTO item_rating (productId, userId, ratingNumber, created, modified) VALUES ('".$productId."', 1, '".$_POST['rating']."',  '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
// mysqli_query($conn, $insertRating) or die("database error: ". mysqli_error($conn));
$rating->create();
echo "rating saved!";
 $aResponse['message'] = "Your rating has been added successfully";
}



?>

