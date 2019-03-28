<?php

// Check if all necessary information is provided from client
if(empty($_GET['name'])) {
    $output['errors'][] = "Add Client Failed";
}

$name = $_GET['name'];

// Add new client. Has no related child tables associated with it.
$query = "INSERT INTO `clients` (`name`) VALUES ('$name')";

$result = mysqli_query($conn, $query);

// Perform necessary error handling
if(empty($result)) {
    $output['errors'][] = "Database Error";
} else {
    mysqli_affected_rows === 1 ? $output['success'] = true : $output['errors'][] = "Add Client Failed";
}

?>