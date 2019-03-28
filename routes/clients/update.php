<?php

// Check if all necessary information is provided from client
if(empty($_GET['name']) || empty($_GET['id'])) {
    $output['errors'][] = 'Update Client Failed';
}

$name = $_GET['name'];
$id = $_GET['id'];

$query = "UPDATE `clients` SET `name` = '$name' WHERE `id` = '$id' ";

$result = mysqli_query($conn, $query);

// Perform necessary error handling
if(empty($result)) {
    $output['errors'][] = 'Database Error';
} else {
    mysqli_affected_rows($conn) > 0 ? $output['success'] = true; : $output['errors'][] = "Update Client Error";
}


?>