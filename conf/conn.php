<?php

if ( ! session_id() ) @ session_start();

$conn = new mysqli("localhost", "root", "", "teste");
$conn->set_charset ('utf8');

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn>connect_error;
    die;
}

?>
