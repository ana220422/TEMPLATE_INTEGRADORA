<?php
$server='localhost';
$username='root';
$password='root123';
$database='makeupgold';
try {
$conn= new PDO("mysql:host=$server;dbname=$database;",$username,$password);
} catch (PDOException $e) {
    die('Connected fail: ' .$e->getMessage());

}
?>