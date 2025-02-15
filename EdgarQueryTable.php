<!--
    ***** EdgarQueryTable.php *****

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
          >>Query to test your table<<
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Query Table</title>
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

        h2 {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 20px;
            color: red;
        }

        table {
            width: 75%;
            border-collapse: collapse;
            border: 2px solid black;
            border-radius: 10px;
            padding: 5px;
            margin: 100px auto 10px;
            background-color: #A27B5C;
        }

        th, td {
            font-size: 18px;
            font-weight: bold;
            font-family: "Consolas", "Menlo", "Courier", monospace;
            border: 2px solid black;
            padding: 7px;
            text-align: center;
            border-collapse: collapse;
        }

        th {
            background-color: #3F4F44;
            color: #f2f2f2;
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #F0F0D7;
            color: #000000;
        }

        footer {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Battlemech Inventory</h1>
    <h3>by Year First Produced</h3>
</header>
<?php
$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');
if ($db->connect_error) {
    die("<h2>Connection failed: " . $db->connect_error . "</h2>");
}
$sql = "SELECT mech_id, mech_name, model, weight_class, 
                   top_speed, armor, production_year 
            FROM baseball_01.battlemechs
            ORDER BY production_year, mech_name";
$result = $db->query($sql);
if (!$result) {
    die("<h2>Query failed: " . $db->error . "</h2>");
}
echo "<table>";
echo "<tr>
            <th>ID</th>
            <th>Mech Name</th>
            <th>Model</th>
            <th>Class</th>
            <th>Speed (kph)</th>
            <th>Armor</th>
            <th>Year</th>
          </tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['mech_id']}</td>";
    echo "<td>{$row['mech_name']}</td>";
    echo "<td>{$row['model']}</td>";
    echo "<td>{$row['weight_class']}</td>";
    echo "<td>" . number_format($row['top_speed'], 1) . "</td>";
    echo "<td>{$row['armor']}</td>";
    echo "<td>{$row['production_year']}</td>";
    echo "</tr>";
}
echo "</table>";
$result->free();
$db->close();
?>
<footer>
    <form action="EdgarDropTable.php">
        <input type="submit" value="Drop Table">
    </form>
</footer>
</body>
</html>