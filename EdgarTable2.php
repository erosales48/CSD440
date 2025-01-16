<!--
    Edgar Rosales
    CSD440 Server-Side Scripting
    January 15, 2021

    Write a program that creates an HTML table using a PHP nested loop structure.
    In the loop structure you are to display a two dimensional table holding PHP generated random numbers in each cell.
    Do not use PHP to display the actual table tags.
    This will require several opening and closing PHP tags.
-->

<html lang="en">
    <head>
        <title>Edgar Table2</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            h1 {
                text-align: center;
            }

            table {
                width: 50%;
                border-collapse: collapse;
                margin: 20px auto;
            }

            th, td {
                border: 1px solid black;
                padding: 10px;
                text-align: center;
                border-collapse: collapse;
        </style>
    </head>
    <body>
        <h1>The Table of random numbers</h1>
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
                        <td><?php echo "Row $i"; ?></td>
                        <?php for ($j = 1; $j <= 5; $j++) { ?>
                        <td><?php echo rand(1, 100); ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>