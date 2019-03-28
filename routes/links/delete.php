<?php

//Deleting a Link will not affect parent tables

// Check if all necessary information is provided from client
if(empty($_GET['id'])) {
    $output['errors'] = "Delete Failed";
}

$id = $_GET['id'];

// Delete link with unique ID. Does not affect Sections or Clients table
$query = "DELETE FROM `links` WHERE `id` = '$id' ";

$result = mysqli_query($conn, $query);

if(empty($result)) {
    $output['errors'][] = "Database Error";
} else {
    mysqli_affected_rows($conn) === 1 ? $output['success'] = true : $output['errors'] = "Delete Error";
}


?>