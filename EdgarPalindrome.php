<!--
    Edgar Rosales
    CSD440 Server-Side Scripting
    January 22, 2021

    Write a program that checks to see if a string is a palindrome.
    Include six examples in your code that displays the string in both orders,
    three being a palindrome and three not.
    Indicate in your display the resulting test in a function you have written to test each of the six strings.
-->
<html lang="en">
    <head>
        <title>Edgar Palindrome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css"
    </head>
    <header>
        <h1>Is it a Palindrome</h1>
    </header>
    <body>
        <hr />
        <?php
            function reverseString($string) {
                return strrev($string);
            }
            function isPalindrome($string) {
                return $string === reverseString($string);
            }
            $words = ["dragon", "apple", "madam", "radar", "airplane", "level"];
            foreach ($words as $word) {
                echo "<table style='border-collapse: separate'><tr class='no-border'><td class='no-border'>";
                echo "<h2>The string is $word </h2>";
                echo "<h3>The reverse of the string is <strong style='color: royalblue'>";
                echo reverseString($word);
                echo "</strong></h3>";
                if (isPalindrome($word)) {
                    echo "<h2 style='color: green'>The string is a palindrome. </h2>";
                } else {
                    echo "<h2 style='color: red'>The string is not a palindrome. </h2>";
                }
                echo "</td></tr></table>";
            }

        ?>
    </body>