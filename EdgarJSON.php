<!--
    ***** EdgarJSON.php *****

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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edgar JSON</title>
    <link rel="stylesheet" href="btStyle.css">
</head>
<body>
<header>
    <h1>Battlemech Data</h1>
</header>

<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect data from the form
        $data = [
            'name' => $_POST['name'],
            'model' => $_POST['model'],
            'weight' => $_POST['weight'],
            'speed' => $_POST['speed'],
            'weightClass' => $_POST['weightClass'],
            'armor' => $_POST['armor'],
            'technology' => $_POST['technology'],
            'engine' => $_POST['engine'],
        ];

        // Encode data to JSON
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        if ($jsonData) {
            echo "<h1>Battlemech Data in JSON Format</h1>";
            echo "<pre>$jsonData</pre>";
        } else {
            echo "<h1>Error Encoding Data</h1>";
            echo "<p>There was an error processing your data. Please try again.</p>";
        }
    } else {
        echo "<h1>Error</h1>";
        echo "<p>Invalid request method.</p>";
    }
    ?>
</div>
</body>
</html>
