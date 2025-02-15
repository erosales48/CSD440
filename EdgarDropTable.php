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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Drop Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #1e1e2f;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(90deg, #2C3930, #3F4F44);
            font-size: 28px;
            text-align: center;
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            font-size: 36px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 20px;
            color: red;
        }

        footer {
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Drop Table</h1>
</header>

<?php

$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');

if ($db->connect_error) {
    die("<h2>Connection failed: " . $db->connect_error . "</h2>");
}

$sql = "DROP TABLE IF EXISTS BattleMechs";
if ($db->query($sql) === TRUE) {
    echo "<h1>BattleMechs table dropped successfully</h1>";
} else {
    echo "<h2>Error dropping table: " . $db->error . "</h2>";
}
?>
<footer>
    <form action="EdgarCreateTable.php">
        <input type="submit" value="Create Table">
    </form>
</footer>
</body>
</html>