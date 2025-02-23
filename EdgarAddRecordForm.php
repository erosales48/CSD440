<!--
    ***** EdgarQueryTable.php *****

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
    <h1>Battletech Add Record</h1>
</header>
<div class="addMech">
    <form action="EdgarAddRecord.php" method="post">
        <label for="mech_name">Name:</label>
        <input type="text" id="mech_name" name="mech_name" value="" required>
        <br/>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="" required>
        <br/>
        <label for="weight_class">Class:</label>
        <select id="weight_class" name="weight_class">
            <option value="Light">Light</option>
            <option value="Medium">Medium</option>
            <option value="Heavy">Heavy</option>
            <option value="Assault">Assault</option>
        </select>
        <br/>
        <label for="top_speed">Top Speed (km/h):</label>
        <input type="number" id="top_speed" name="top_speed" step="0.1" min="0" value="" required>
        <br/>
        <label for="armor">Armor Points:</label>
        <input type="number" id="armor" name="armor" step="1" min="0" max="600" value="" required>
        <br/>
        <label for="production_year">Production Year:</label>
        <input type="number" id="production_year" name="production_year" min="2425" max="3100">
        <div class="addMechButton">
            <input type="submit" value="Add Mech">
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