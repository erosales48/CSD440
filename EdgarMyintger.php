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
        <h1>My Integers</h1>
    </header>

    <body>
        <?php
            // Get class for myInteger
            require_once("MyInteger.php");

            // Create two instances
            $myInt1 = new MyInteger( 0);
            $myInt2 = new MyInteger( 0);

            // Set values for those instances
            $a = 3 + rand(1, 100);
            $b = 6 + rand(1, 100);

            $myInt1->setMyDigit($a);
            $myInt2->setMyDigit($b);

            // Test all methods

            // Display the integers
            echo "<br />";
            echo "<h2>Integer 1: <strong style='color: green'>" . $myInt1->getMyDigit() . "</strong></h2>";
            echo "<h2>Integer 2: <strong style='color: blue'>" . $myInt2->getMyDigit() . "</strong></h2>";
            echo "<br />";
            echo "<hr />";
            echo "<br />";

            // create a table showing the results of the remaining methods
        ?>
        <table>
            <tr>
                <th>Method</th>
                <th>Integer 1</th>
                <th>Integer 2</th>
            </tr>
            <tr>
                <td><strong>Is it Even</strong></td>
                <td style="color: green"><?php echo $myInt1->isEven() ? "True" : "False"; ?></td>
                <td style="color: blue"><?php echo $myInt2->isEven() ? "True" : "False"; ?></td>
            </tr>
            <tr>
                <td><strong>Is it Odd</strong></td>
                <td style="color: green"><?php echo $myInt1->isOdd() ? "True" : "False"; ?></td>
                <td style="color: blue"><?php echo $myInt2->isOdd() ? "True" : "False"; ?></td>
            </tr>
            <tr>
                <td><strong>Is it a Prime</strong></td>
                <td style="color: green"><?php echo $myInt1->isPrime() ? "True" : "False"; ?></td>
                <td style="color: blue"><?php echo $myInt2->isPrime() ? "True" : "False"; ?></td>
            </tr>
        </table>
    </body>


