<!--
    ***** EdgarAddRecord.php *****

    Edgar Rosales
    CSD440 Server-Side Scripting
    21 Feb 2025

    1. For this assignment, the database you will use is the one created in module 8.
       Using MySQLi, write PHP programs (3 files) that provide:
            - index page with links to all following PHPs
            - Query page to search based on user form input
            - Form page for adding record
            - include all files from Module 8

    2. All pages need to be well formatted in their display.
    3. Similar to previous modules, title all files starting with your first name such as
       <YourFirstName>Query.php or <YourFirstName>Forms.php, etc.
    4. Review the code documentation requirements and ensure you meet them all in your code.
    5. Thoroughly test your code to verify it functions correctly and displays correct output.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Battletech Add Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="btStyle.css">
</head>
<body>
<header>
    <h1>RESULT</h1>
</header>

<div class="result">
    <?php
    // Database connection
    $db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');
    if ($db->connect_error) {
        die("<h2>Connection failed: " . $db->connect_error . "</h2>");
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $mech_name = htmlspecialchars($_POST['mech_name']);
        $model = htmlspecialchars($_POST['model']);
        $weight_class = htmlspecialchars($_POST['weight_class']);
        $top_speed = isset($_POST['top_speed']) ? (float)$_POST['top_speed'] : null;
        $armor = isset($_POST['armor']) ? (int)$_POST['armor'] : null;
        $production_year = isset($_POST['production_year']) ? (int)$_POST['production_year'] : null;

        // Check for null or empty values
        if (empty($mech_name) || empty($model) || empty($weight_class) || $top_speed === null || $armor === null || $production_year === null) {
            echo "<h2>Please fill in all fields.</h2>";
            echo "<a href='EdgarAddRecordForm.php'>Back</a>";
        } else {
            // Prepare and execute the SQL statement
            $stmt = $db->prepare("INSERT INTO baseball_01.battlemechs 
                (mech_name, model, weight_class, top_speed, armor, production_year) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssdii", $mech_name, $model, $weight_class, $top_speed, $armor, $production_year);
                if ($stmt->execute()) {
                    echo "<h2>Record added successfully!</h2>";
                } else {
                    echo "<h2>Error adding record: " . $stmt->error . "</h2>";
                }
                $stmt->close();
            } else {
                echo "<h2>Prepare failed: " . $db->error . "</h2>";
            }
        }
    }

    // Close the database connection
    $db->close();
    ?>
</div>
<footer>
    <p>Copyright © 2025 Edgar Rosales</p>
    <p>All Rights Reserved</p>
    <a href="EdgarBTIndex.php">Home</a>
</footer>
</body>
</html>
