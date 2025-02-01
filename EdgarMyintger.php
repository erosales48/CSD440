<!--
    ***** EdgarMyInteger.php *****
    Edgar D Rosales
    CSD440 Server-Side SScripting
    1 Feb 2025

    Using the MyInteger class, create two instances and test all methods
-->

<html lang="en">
    <head>
        <title>My Integer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css"
    </head>
    <header>
        <h1>This is My Integer</h1>
    </header>

    <body>
        <?php
            // Get class for myInteger
            require_once("MyInteger.php");

            // Create two instances
            $myInt1 = new MyInteger(10);
            $myInt2 = new MyInteger(20);

            // Test all methods
            echo "MyInt1: " . $myInt1->toString() . "<br>";
            echo "MyInt2: " . $myInt2->toString() . "<br>";
            echo "MyInt1 + MyInt2: " . $myInt1->add($myInt2)->toString() . "<br>";
        ?>
    </body>


