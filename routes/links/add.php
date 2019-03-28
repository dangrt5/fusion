<?php

// Check if all necessary information is provided from client
if(empty($_GET['name']) || empty($_GET['section_id'])) {
    $output['error'] = 'Add Link Failed';
}

$name = $_GET['name'];
$section_id = $_GET['section_id'];

// Add a new link with relation to its parent Section table ID
$query = "INSERT INTO `links` (`name`, `section_id`)
SELECT '$name', `id` FROM `sections` WHERE `id` = '$section_id' ";

$result = mysqli_query($conn, $query);

if(empty($result)) {
    $output['errors'][] = 'Database Error';
} else {
    mysqli_affected_rows($conn) > 0 ? $output['success'] = true : $output['errors'] = 'Add Link Error';
}

?>