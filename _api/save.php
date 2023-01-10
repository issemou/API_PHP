<?php

/**
 * headers
 */

header('Access-Control-Allow-Origin', '*');
header('Content-Type', 'application/json');
header('Access-Control-Allow-Methodes: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methodes,Authorization,X-Requested-With');

/**
 * initialize Api
 */
require_once('../_config/initialize.php');
AutoloaderClassOFApi::register();

/** instantiate Classes
$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : die();
$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : die();
**/



/**
 * get raw Posted Data
 */
$data = json_decode(file_get_contents("php://input"));
$firstname = $data->firstname;
$lastname = $data->lastname;

/**
 * Create Post
 */

if (Authors::CreatAuthor($firstname, $lastname)) {
   
   echo json_encode(
       array('message'=>'Post Created')
   );
}else {
       echo json_encode(
       array('message'=>'Post not Created')
   );
}