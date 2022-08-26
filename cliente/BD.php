<?php
$server='localhost';
$username='root';
$password='251379010203';
$database='makeupgold';
try {
$conn= new PDO("mysql:host=$server;dbname=$database;",$username,$password);
} catch (PDOException $e) {
    die('Connected fail: ' .$e->getMessage());

}
?>