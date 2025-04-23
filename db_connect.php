<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password =$_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($host, $username, $password, $dbname);
if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}