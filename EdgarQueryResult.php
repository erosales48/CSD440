<!--
    ***** EdgarQueryRecord.php *****

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
    <title>Battletech Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="btStyle.css">
</head>
<body>
<header>
    <h1>Battletech Search</h1>
</header>

<?php
// Database connection
$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');
if ($db->connect_error) {
    die("<h2>Connection failed: " . $db->connect_error . "</h2>");
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $model = htmlspecialchars($_POST['model']);
    $weight_class = htmlspecialchars($_POST['weight_class']);
    $min_speed = !empty($_POST['min_speed']) ? (float)$_POST['min_speed'] : 0;
    $min_armor = !empty($_POST['min_armor']) ? (int)$_POST['min_armor'] : 0;

    // Build the query
    $query = "SELECT * FROM baseball_01.battlemechs WHERE top_speed >= ? AND armor >= ?";
    $params = [$min_speed, $min_armor];
    $types = "di";

    if ($name) {
        $query .= " AND mech_name LIKE ?";
        $params[] = "%" . $name . "%";
        $types .= "s";
    }
    if ($model) {
        $query .= " AND model LIKE ?";
        $params[] = "%" . $model . "%";
        $types .= "s";
    }
    if ($weight_class) {
        $query .= " AND weight_class = ?";
        $params[] = $weight_class;
        $types .= "s";
    }

    // Prepare and execute the SQL statement
    $stmt = $db->prepare($query);
    if ($stmt) {
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display results
        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table><tr><th>Name</th><th>Model</th><th>Class</th><th>Speed</th><th>Armor</th><th>Year</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['mech_name']}</td><td>{$row['model']}</td><td>{$row['weight_class']}</td><td>{$row['top_speed']}</td><td>{$row['armor']}</td><td>{$row['production_year']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<h2>No records found.</h2>";
        }
        $stmt->close();
    } else {
        echo "<h2>Query failed: " . $db->error . "</h2>";
    }
}
?>
<div class="search-form">
    <p>Search for battletech mechs based on one the following criteria:</p>
    <form action="EdgarQueryResult.php" method="post">
        <?php
        $query = "SELECT model FROM baseball_01.battlemechs";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            echo "<label for='model'>Model:</label>";
            echo "<select id='model' name='model'>";
            echo "<option value=''>Select model</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['model'] . "'>" . $row['model'] . "</option>";
            }
            echo "</select>";
        }
        ?>
        <label for="weight_class">Weight Class:</label>
        <?php
        $query = "SELECT DISTINCT weight_class FROM baseball_01.battlemechs";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            echo "<select id='weight_class' name='weight_class'>";
            echo "<option value=''>Select weight class</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['weight_class'] . "'>" . $row['weight_class'] . "</option>";
            }
            echo "</select>";
        }
        ?>
        <div class="searchButton">
            <br/>
            <input type="submit" value="Search">
        </div>
    </form>
</div>

<?php
// Close the database connection
$db->close();
?>
<footer>
    <p>Copyright &copy; 2025 Edgar Rosales</p>
    <p>All Rights Reserved</p>
    <a href="EdgarBTIndex.php">Home</a>
</footer>
</body>
</html>
