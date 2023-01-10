<?php

/**
 * headers
 */

header('Access-Control-Allow-Origin', '*');
header('Content-Type', 'application/json');

/**
 * initialize Api
 */
require_once('../_config/initialize.php');
AutoloaderClassOFApi::register();

/**
 * instantiate Classes
 */
$id = isset($_GET['id']) ? $_GET['id'] : die();
$author = new Authors($id);


$authors_items = array(

    'id' =>$author->id,
    'firstname' =>$author->firstname,
    'lastname' => $author->lastname
);



//make a json array
echo json_encode($authors_items);