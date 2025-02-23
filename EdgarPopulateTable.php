<!--
    ***** EdgarPopulateTable.php *****

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
          >>Populate your table<<
            Query to test your table
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Populate Table</title>
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

        h1, h2 {
            text-align: center;
            font-size: 36px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
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
    <h1>Populate Table</h1>
</header>
<?php
$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');
if ($db->connect_error) {
    die("<h2>Connection failed: " . $db->connect_error . "</h2>");
}
$mechs = [
    ['Atlas', 'AS7-D', 'Assault', 54.3, 500, 2755],
    ['Mad Cat', 'Timber Wolf', 'Heavy', 64.8, 320, 3055],
    ['Jenner', 'JR7-D', 'Light', 97.6, 80, 3025],
    ['Warhammer', 'WHM-6R', 'Heavy', 53.4, 304, 2776],
    ['Raven', 'RVN-3L', 'Light', 86.0, 120, 3048],
    ['Marauder', 'MAD-3R', 'Heavy', 64.0, 304, 2740],
    ['Crusader', 'CRD-3R', 'Heavy', 55.0, 320, 2755],
    ['Centurion', 'CN9-A', 'Medium', 70.0, 240, 2750],
    ['Shadow Hawk', 'SHD-2H', 'Medium', 64.2, 200, 2750],
    ['Griffin', 'GRF-1N', 'Medium', 66.5, 210, 2766],
    ['Hunchback', 'HBK-4G', 'Medium', 61.0, 240, 2750],
    ['Kintaro', 'KTO-18', 'Medium', 67.5, 260, 2780],
    ['Phoenix Hawk', 'PXH-1', 'Medium', 76.0, 210, 2780],
    ['Goliath', 'GOL-2', 'Assault', 52.0, 600, 3050],
    ['Banshee', 'BNC-3E', 'Assault', 50.0, 400, 2760],
    ['Vulcan', 'VUL-1', 'Medium', 84.0, 80, 2760],
    ['Scorpion', 'SCP-1N', 'Light', 95.0, 75, 3049],
    ['Locust', 'LCT-1V', 'Light', 108.0, 50, 3025],
    ['Thunderbolt', 'TDR-5S', 'Heavy', 70.0, 280, 2766],
    ['Quickdraw', 'QKD-4G', 'Medium', 67.5, 240, 2766],
    ['Wolverine', 'WLN-6R', 'Medium', 69.0, 210, 2780]
];
$stmt = $db->prepare("INSERT INTO baseball_01.battlemechs 
            (mech_name, model, weight_class, top_speed, armor, production_year)
            VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("<h2>Prepare failed: " . $db->error . "</h2>");
}
$stmt->bind_param("sssdii",
    $mech_name,
    $model,
    $weight_class,
    $top_speed,
    $armor,
    $production_year
);
$insert_count = 0;
foreach ($mechs as $mech) {
    list($mech_name, $model, $weight_class, $top_speed, $armor, $production_year) = $mech;
    if (!$stmt->execute()) {
        echo "<h2>Error inserting " . $mech_name . ": " . $stmt->error . "</h2>";
    } else {
        $insert_count++;
    }
}
echo "<h1>Successfully inserted $insert_count BattleMech records</h1>";
$stmt->close();
$db->close();
?>
<br/>
<footer>
    <form action="EdgarDropTable.php">
        <input type="submit" value="Drop Table"/>
    </form>
    <form action="EdgarQueryTable.php">
        <input type="submit" value="Query Table"/>
    </form>
</footer>
</body>
</html>