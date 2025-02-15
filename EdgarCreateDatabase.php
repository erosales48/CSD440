<!--
    ***** EdgarCreateDatabase.php *****

    Edgar Rosales
    CSD440 Server-Side Scripting
    14 Feb 2025

    1. For this assignment, the database you will use is baseball_01.
       The database ID you will use to log in is student1 and the password is pass.
    2. The table you create and populate is to focus on a topic that interests you.
       Using MySQLi, write PHP programs (4 total) to create and populate a DB table to be used in Module 9.
       You will need PHP scripts to:
            Create your table
            Drop your table
            Populate your table
            Query to test your table

    **** This File is to create the initial database and user for the assigned programs to run ****
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edgar's Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Create Database and User</h1>
</header>


<?php
// Database configurations
$servername = "localhost";
$username = "root";
$password = "G0dzilla#007";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop database if it exists
$sql = "DROP DATABASE IF EXISTS baseball_01";
if ($conn->query($sql) === TRUE) {
    echo "<p>Database dropped successfully</p>";
}

// Create database
$sql = "CREATE DATABASE baseball_01";
if ($conn->query($sql) === TRUE) {
    echo "<p>Database created successfully</p>";
} else {
    echo "<p>Error creating database: " . $conn->error . "</p>";
}

// Drop user if it exists
$sql = "DROP USER IF EXISTS 'student1'@'localhost'";
if ($conn->query($sql) === TRUE) {
    echo "<p>User dropped successfully</p>";
}

// Create user and grant privileges
$sql = "CREATE USER 'student1'@'localhost' IDENTIFIED BY 'pass'";
if ($conn->query($sql) === TRUE) {
    echo "<p>User created successfully</p>";
} else {
    echo "<p>Error creating user: " . $conn->error . "</p>";
}

$sql = "GRANT ALL PRIVILEGES ON baseball_01.* TO 'student1'@'localhost'";
if ($conn->query($sql) === TRUE) {
    echo "<h4>Granted all privileges to user on database</h4>";
} else {
    echo "<h4>Error granting privileges: " . $conn->error . "</h4>";
}

// Flush privileges
$sql = "FLUSH PRIVILEGES";
if ($conn->query($sql) === TRUE) {
    echo "<p>Privileges flushed</p>";
} else {
    echo "<p>Error flushing privileges: " . $conn->error . "</p>";
}
echo "<br />";
echo "<hr />";
echo "<br />";
echo "<h3>User information:</h3>";
$sql = "SHOW GRANTS FOR 'student1'@'localhost'";
$result = $conn->query($sql);
echo "<h4>student1 privileges:</h4>";
while ($row = $result->fetch_array()) {
    echo $row[0] . "<br />";
}
echo "<br />";
$sql = "SHOW DATABASES";
$result = $conn->query($sql);
echo "<h3>Databases:</h3>";
echo "<ul>";
while ($row = $result->fetch_array()) {
    echo "<li>" . $row[0] . "</li>";
}

// Close connection
$conn->close();
?>
</body>
</html>
