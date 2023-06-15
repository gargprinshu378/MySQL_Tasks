<?php
// Storing the server, username, password and the database name in different variables
$server="localhost";
$username="Prateek";
$password="Prateek@123";
$database = "employee";

//Create database  connection with correct username and password
$connect=new mysqli($servername,$username,$password,$database);

/* Check the connection is created properly or not */
if($connect->connect_error)
    echo "Connection error:" .$connect->connect_error;
else
    echo "Connection is created successfully";?>