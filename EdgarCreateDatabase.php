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
    echo "Database dropped successfully<br />";
}

// Create database
$sql = "CREATE DATABASE baseball_01";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br />";
} else {
    echo "Error creating database: " . $conn->error . "<br />";
}

// Drop user if it exists
$sql = "DROP USER IF EXISTS 'student1'@'localhost'";
if ($conn->query($sql) === TRUE) {
    echo "User dropped successfully\n";
}

// Create user and grant privileges
$sql = "CREATE USER 'student1'@'localhost' IDENTIFIED BY 'pass'";
if ($conn->query($sql) === TRUE) {
    echo "User created successfully<br />";
} else {
    echo "Error creating user: " . $conn->error . "<br />";
}

$sql = "GRANT ALL PRIVILEGES ON baseball_01.* TO 'student1'@'localhost'";
if ($conn->query($sql) === TRUE) {
    echo "Granted all privileges to user on database<br />";
} else {
    echo "Error granting privileges: " . $conn->error . "<br />";
}

// Flush privileges
$sql = "FLUSH PRIVILEGES";
if ($conn->query($sql) === TRUE) {
    echo "Privileges flushed<br />";
} else {
    echo "Error flushing privileges: " . $conn->error . "<br />";
}
echo "<br />";
$sql = "SHOW GRANTS FOR 'student1'@'localhost'";
$result = $conn->query($sql);
echo "User privileges:<br />";
while ($row = $result->fetch_array()) {
    echo $row[0] . "<br />";
}
echo "<br />";
$sql = "SHOW DATABASES";
$result = $conn->query($sql);
echo "Databases:<br />";
while ($row = $result->fetch_array()) {
    echo $row[0] . "<br />";
}

// Close connection
$conn->close();
?>