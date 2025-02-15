<!--
    ***** EdgarCreateTable.php *****

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

<?php
$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$mechs = [
    ['Atlas', 'AS7-D', 'Assault', 54.3, 500, 3050],
    ['Mad Cat', 'Timber Wolf', 'Heavy', 64.8, 320, 3055],
    ['Jenner', 'JR7-D', 'Light', 97.6, 80, 3025],
    ['Warhammer', 'WHM-6R', 'Heavy', 53.4, 304, 2776],
    ['Raven', 'RVN-3L', 'Light', 86.0, 120, 3048],
    ['Marauder', 'MAD-3R', 'Heavy', 64.0, 304, 2740]
];

$stmt = $db->prepare("INSERT INTO baseball_01.battlemechs 
    (mech_name, model, weight_class, top_speed, armor, production_year)
    VALUES (?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $db->error);
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
        echo "Error inserting " . $mech_name . ": " . $stmt->error . "\n";
    } else {
        $insert_count++;
    }
}

echo "Successfully inserted $insert_count BattleMech records\n";

$stmt->close();
$db->close();
?>