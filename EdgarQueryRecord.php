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
    <script>
        window.addEventListener('beforeunload', () => {
            document.querySelector('form').reset();
        )
        });
    </script>
</head>
<body>
<header>
    <h1>Battletech Search Record</h1>
</header>
<div class="searchForm">
    <form action="EdgarQueryResult.php" method="post">
        <?php
        $db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');
        if ($db->connect_error) {
            die("<h2>Connection failed: " . $db->connect_error . "</h2>");
        }
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


<footer>
    <p>Copyright &copy; 2025 Edgar Rosales</p>
    <p>All Rights Reserved</p>
    <a href="EdgarBTIndex.php">Home</a>
</footer>
</body>
</html>