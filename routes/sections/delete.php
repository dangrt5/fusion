<?php

// Check if all necessary information is provided from client
if(empty($_GET['id'])) {
    $output['errors'][] = 'Delete Sections Error';
}

$id = $_GET['id'];

// Delete Sections and all of its related child tables (links) with relational IDs connected to one another
$query = "DELETE `sections`, `links` FROM `sections`
INNER JOIN `links` ON `links`.`sections_id` = `sections`.`id`
WHERE `sections`.`id` = '$id' ";

$result = mysqli_query($conn, $query);

// Perform necessary error handling
if(empty($result)) {
    $output['errors'][] = 'Database Error';
} else {
    mysqli_affected_rows($conn) > 0 ? $output['success'] = true; : $output['errors'][] = 'Delete Sections Error';
}



?>