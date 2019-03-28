<?php

// Check if all necessary information is provided from client
if(empty($_GET['id'])) {
    $output['errors'][] = 'Delete Client Failed';
}

$id = $_GET['id'];

// Delete Client and all of its related child tables (sections, links) with relational IDs connected to one another
$query = "DELETE `clients`, `sections`, `links` FROM `clients`
INNER JOIN `sections` ON sections.client_id = clients.id
INNER JOIN `links` ON links.section_id = sections.id
WHERE clients.id = '$id' ";

$result = mysqli_query($conn, $query);

// Perform necessary error handling 
if(empty($result)) {
    $output['errors'][] = 'Database Error';
} else {
    mysqli_affected_rows($conn) > 0 ? $output['success'] = true : $output['errors'][] = 'Delete Client Failed';
}

?>