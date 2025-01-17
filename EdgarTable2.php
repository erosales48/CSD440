<!--
    Edgar Rosales
    CSD440 Server-Side Scripting
    January 15, 2021

    Write a program that creates an HTML table using a PHP nested loop structure.
    In the loop structure you are to display a two-dimensional table holding PHP generated random numbers in each cell.
    Do not use PHP to display the actual table tags.
    This will require several opening and closing PHP tags.
-->
<?php require_once 'EdgarTable3.php'; ?>

<html lang="en">
    <head>
        <title>Edgar Table2</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css"
    </head>
    <header>
        <h1>The Table of Random Numbers</h1>
    </header>
    <body>
        <hr />
        <table>
            <thead>
                <tr>
                    <th>Row</th>
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <th> <?php echo "Column $i"; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <tr>
                        <td style="font-weight: bold; color: red;" >
                            <?php echo "Row $i"; ?>
                        </td>
                            <?php
                                for ($j = 1; $j <= 5; $j++) {
                                    $a=rand(1,100);
                                    $b=rand(1,100);
                            ?>
                        <td style="color: royalblue">
                            <?php
                                echo "$a + $b = ";
                                echo sumNumbers($a, $b);
                            ?>
                        </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>