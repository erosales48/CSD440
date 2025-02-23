<!--
    ***** EdgarBTIndex.php *****

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
    <title>Battletech Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="btStyle.css">
    <script>
        window.addEventListener('beforeunload', () => {
            document.querySelector('form').reset();
        });
    </script>
</head>
<body class="btIndex">
<header>
    <h1>Battletech Index</h1>
</header>
<div class="btMenu">
    <div class="banner">
        <img src="images/Battlefield_851x315.png" alt="Battletech Banner">
    </div>
    <div class="btLinks">
        <div class="buttonSpace">
            <form action="EdgarAddRecordForm.php" method="post">
                <input type="submit" value="Add Record">
            </form>
        </div>
        <div class="buttonSpace">
            <form action="EdgarQueryRecord.php" method="post">
                <input type="submit" value="Query Record">
            </form>
        </div>
    </div>
    <div class="banner">
        <img src="images/Banners_851x315.png" alt="Battletech Banner">
    </div>
</div>
<footer>
    <p>Copyright &copy; 2025 Edgar Rosales</p>
    <p>Battletech art and logos by Catalyst Game Labs with permission</p>
    <p>All Rights Reserved</p>
</footer>
</body>
</html>