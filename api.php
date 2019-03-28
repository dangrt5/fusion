<?php

// Allow CORS & Specific HTTP Request Methods
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

// Require the mysql_connect.php configuration file to access the MySQL database
// require('mysql_connect.php');

//Always going to assume success will stay false and catch/display errors
$output = [
    'success' => false,
    'errors' => []
];


// Perform requested operation based on the action that needs to be done
switch($_GET['action']) {
    case 'client/add' : 
        include('routes/clients/add.php');
        break;
    case 'client/delete' : 
        include('routes/clients/delete.php');
        break;
    case 'client/update' : 
        include('routes/clients/update.php');
        break;
    case 'sections/add' : 
        include('routes/sections/add.php');
        break;
    case 'sections/delete' : 
        include('routes/sections/delete.php');
        break;
    case 'sections/update' : 
        include('routes/sections/update.php');
        break;
    case 'links/add' : 
        include('routes/links/add.php');
        break;
    case 'links/delete' : 
        include('routes/links/delete.php');
        break;
    case 'links/update' : 
        include('routes/links/update.php');
        break;
}

// Store database output into variable in JSON format
$outputJSON = json_encode($output);

// Send outputJSON to the client-side
print($outputJSON);

?>
