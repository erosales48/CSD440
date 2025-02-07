<!--
    ***** EdgarResponse.php *****

    Edgar Rosales
    CSD440 Server-Side Scripting
    7 Feb 2025

    1. Write a form program that prompts a user to enter seven different fields of data,
       using a minimum of four different data type entries.
    2. When the form is submitted to your PHP CGI, you are then to verify all fields were populated and
       the data was correctly entered.
    3. Then, in your return, display the data entered, in a well formatted page, otherwise you will return
       an error display to report the problem.
    4. Title all files starting with your first name such as <YourFirstName>Form.php
    5. Review the code documentation requirements and ensure you meet them in your code.
    6. Thoroughly test your code to verify its functions correctly and displays the correct output.

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edgar's Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #1e2e2f;
            color: #ffFfff;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            font-size: 28px;
            text-align: center;
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        .result {
            background-color: #282c34;
            border-radius: 15px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
        }
        .result:hover {
            transform: scale(1.02);
        }
        .error {
            color: #ff4c4c; /* Red color for error messages */
            font-size: 18px;
            text-align: center;
        }
        .result h2 {
            font-size: 22px;
            color: #f1f1f1;
            border-bottom: 1px solid #444;
            padding-bottom: 10px;
        }
        .return-button {
            color: #fff;
            display: block;
            width : 150px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #2575fc;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
        }
        .return-button a {
            color: #fff;
            text-decoration: none;
        }
        .return-button a:hover {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <h1>Your Results</h1>
</header>
<div class="result">
    <?php
    $errors = [];

    // Check if form data is set and not empty
    if (empty($_POST['name'])) {
        $errors[] = "Error: Name cannot be empty.";
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Error: Email is not valid.";
    }

    if (empty($_POST['phone'])) {
        $errors[] = "Error: Phone cannot be empty.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='error'>$error</div>";
        }
        echo "<h2>Please <a href='EdgarForm.php'>go back</a> and correct the errors.</h2>";
        exit; // Stop further script execution
    }

    $radioButton = $_POST['radioButton'];

    // Check if the "No Answer" option is selected
    if ($radioButton == 'No Answer') {
        $radioButton = 'Private';
    }

    echo "<h2>Name: " . htmlspecialchars($_POST['name']) . "</h2>";
    echo "<h2>Age: " . htmlspecialchars($_POST['age']) . "</h2>";
    echo "<h2>Email: " . htmlspecialchars($_POST['email']) . "</h2>";
    echo "<h2>Phone: " . htmlspecialchars($_POST['phone']) . "</h2>";
    echo "<h2>You are: ";
    foreach ($_POST['checkBox_1'] as $value) {
        echo htmlspecialchars($value) . " ";
    }
    echo "</h2>";
    echo "<h2>Sex: " . htmlspecialchars($radioButton) . "</h2>";
    echo "<h2>Thank you for filling out the form!</h2>";
    echo "<h2>Please click the button below to fill out the form again.</h2>";
    ?>
</div>
<div class="return-button">
    <a href="EdgarForm.php">Return</a>
</div>
</body>
</html>




