<?php

require_once('Connection.php');

$connection = new Connection();

$query = "SELECT * FROM person";
$result = mysqli_query($connection->Connect(), $query);

$container = array();

foreach ($result as $value) {
    array_push($container, $value);
}

$list_person['data']= $container;

echo json_encode($list_person);

?>