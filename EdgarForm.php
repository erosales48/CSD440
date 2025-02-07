<!--
    ***** EdgarForm.php *****

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #1e1e2f;
            color: #ffffff;
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            width: 300px;
            height: 50px;
            margin: 0 auto;
            display: block;
            text-align: center;
            border-radius: 10px;
            border: 2px solid #000;
            padding: 10px;
            background-color: #1e1e2f;
            color: #ffffff;
            font-size: 18px;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            outline: none;
            transition: all 0.3s ease;
        }
        .main-container {
            display: flex;
            width: 80%;
            margin: 0 auto;
            justify-content: space-between;
        }
        .left-container, .center-container {
            width: 38%;
            border: 2px solid #000;
            padding: 10px;
        }
        .right-container {
            width: 19%;
            border: 2px solid #000;
            padding: 10px;
        }
        .stacked-container {
            margin-bottom: 20px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .submit-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Fool, you are, if form you do not fill!</h1>
</header>
<form action="EdgarResponse.php" method="post">
    <div class="main-container">
        <div class="left-container">
            <div class="stacked-container">
                <div class="content">
                    <h2>Enter your name</h2>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>
                </div>
            </div>
            <div class="stacked-container">
                <div class="content">
                    <h2>Select your Age</h2>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <select id="age" name="age" class="form-control" required>
                            <option value="">Select Age</option>
                            <?php for ($i = 14; $i <= 90; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="center-container">
            <div class="stacked-container">
                <div class="content">
                    <h2>Enter your Email</h2>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                </div>
            </div>
            <div class="stacked-container">
                <div class="content">
                    <h2>Enter your Phone Number</h2>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                    </div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="stacked-container">
                <div class="content">
                    <h2>You Are</h2>
                    <div class="form-group">
                        <label>
                            Human
                            <input name='checkBox_1[]' type='checkbox' value='Human'/>
                        </label>
                        <br />
                        <label>
                            Animal
                            <input name='checkBox_1[]' type='checkbox' value='Animal'/>
                        </label>
                        <br />
                        <label>
                            Vegatable
                            <input name='checkBox_1[]' type='checkbox' value='Vegatable'/>
                        </label>
                        <br />
                        <label>
                            Robot
                            <input name='checkBox_1[]' type='checkbox' value='Robot'/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="stacked-container">
                <div class="content">
                    <h2>Your Sex</h2>
                    <div class="form-group">
                        <label>
                            Male
                            <input name='radioButton' type='radio' value='Male' />
                        </label>
                        <label>
                            Female
                            <input name='radioButton' type='radio' value='Female'/>
                        </label>
                        <label>
                            No Answer
                            <input name='radioButton' type='radio' value='No Answer' checked='checked'/>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-container">
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</form>
</body>
</html>
