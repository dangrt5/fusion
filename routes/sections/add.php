<?php

// Check if all necessary information is provided from client
if(empty($_GET['name']) || empty($_GET['client_id'])) {
    $output['errors'][] = "Add Sections Failed";
}

$name = $_GET['name'];
$client_id = $_GET['client_id'];

// Add a new section with relation to its parent Client table ID
$query = "INSERT INTO `sections` VALUES (`name`, `client_id`)
SELECT '$name', `id` FROM `clients` WHERE `id` = '$client_id' ";

$result = mysqli_query($conn, $query);

// Perform necessary error handling
if(empty($result)) {
    $output['errors'][] = "Database Error";
} else {
    mysqli_affected_rows($conn) > 0 ? $output['success'] = true : $output['errors'][] = "Add Sections Failed";
}

?>