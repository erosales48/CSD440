<!--
    ***** EdgarDropTable.php *****

    Edgar Rosales
    CSD440 Server-Side Scripting
    14 Feb 2025

    1. For this assignment, the database you will use is baseball_01.
       The database ID you will use to log in is student1 and the password is pass.
    2. The table you create and populate is to focus on a topic that interests you.
       Using MySQLi, write PHP programs (4 total) to create and populate a DB table to be used in Module 9.
       You will need PHP scripts to:
            Create your table
          >>Drop your table<<
            Populate your table
            Query to test your table

-->

<?php

$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "DROP TABLE IF EXISTS BattleMechs";
if ($db->query($sql) === TRUE) {
    echo "BattleMechs table dropped successfully";
} else {
    echo "Error dropping table: " . $db->error;
}

