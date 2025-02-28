<!--
    ***** EdgarJSONForm.php *****

    Edgar Rosales
    CSD440 Server-Side Scripting
    26 Feb 2025

    1. Write a form program that prompts a user to enter a minimum of 8 different fields of data.
    2. When the form is submitted to your PHP CGI, use the function json_encode to encode your data into a JSON format
    3. Then, in your return, display the data in the JSON format inside a well-formatted output display,
       otherwise you will return an error display to report the problem.
    4. Title all files starting with your first name such as <YourFirstName> JSON.php.
    5. Review the code documentation requirements and ensure you meet them in your code.
    6. Thoroughly test your code to verify its functions correctly and displays the correct output.

-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battlemech Form</title>
    <link rel="stylesheet" href="btStyle.css">
</head>
<body>
<header>
    <h1>Battlemech Data Entry</h1>
</header>
<div class="addMech">
    <form action="EdgarJSON.php" method="POST">
        <div class="form-group">
            <label for="name">Battlemech Name:</label>
            <input type="text" id="name" name="name" required><br>
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required><br>
        </div>
        <div class="form-group">
            <label for="weight">Weight (tons):</label>
            <input type="number" id="weight" name="weight" required><br>
        </div>
        <div class="form-group">
            <label for="speed">Max Speed (kph):</label>
            <input type="number" id="speed" name="speed" required><br>
        </div>
        <div class="form-group">
            <label for="weightClass">Weight Class:</label>
            <select id="weightClass" name="weightClass" required>
                <option value="Light">Light</option>
                <option value="Medium">Medium</option>
                <option value="Heavy">Heavy</option>
                <option value="Assault">Assault</option>
            </select>
            <br>
        </div>
        <div class="form-group">
            <label>Armor Type:</label>
            <label for="standard_armor">Standard:</label>
            <input type="radio" id="standard_armor" name="armor" value="Standard" required><br>
            <label for="ferro-fibrous_armor">Ferro-Fibrous</label>
            <input type="radio" id="ferro-fibrous_armor" name="armor" value="Ferro-Fibrous" required><br>
        </div>
        <div class="form-group">
            <label>Technology Base:</label>
            <label for="technology_clan">Clan</label>
            <input type="radio" id="technology_clan" name="technology" value="Clan" required><br>
            <label for="technology_inner_sphere">Inner Sphere</label>
            <input type="radio" id="technology_inner_sphere" name="technology" value="Inner Sphere" required><br>
        </div>
        <div class="form-group">
            <label for="engine">Engine:</label>
            <input type="text" id="engine" name="engine" required><br>
        </div>
        <div class="addMechButton">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
</body>
</html>
