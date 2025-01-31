<!--
Edgar D Rosales
CSD440 Server-Side SScripting
31 Jan 2025
-->

<html lang="en">
<head>
    <title>Customer Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css"
</head>
<header>
    <h1>Customer INFO</h1>
</header>

<?php
    // get Class for customers
    require_once("Customer.php");

    // Define Array of Customers
    $customers = [
        new Customer('Harry', 'Potter', 17, '(202) 555-0170'),
        new Customer('Frodo', 'Baggins', 50, '(206) 555-0199'),
        new Customer('Tony', 'Stark', 48, '(310) 555-0130'),
        new Customer('Luke', 'Skywalker', 19, '(818) 555-0111'),
        new Customer('Darth', 'Vader', 45, '(909) 555-0142'),
        new Customer('Hannibal', 'Lecter', 55, '(212) 555-0163'),
        new Customer('Indiana', 'Jones', 40, '(415) 555-0124'),
        new Customer('Jack', 'Sparrow', 35, '(305) 555-0155'),
        new Customer('Neo', 'Anderson', 25, '(617) 555-0186'),
        new Customer('Elsa', 'Frozen', 21, '(303) 555-0107')
     ];

    // Function to Display all Customers in a Table
    function displayAllCustomers($customers) {
        echo "<h2>List ALL Customers</h2>";
        echo "<table style='border: 1px; border-collapse: collapse;'>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone</th></tr>";
        foreach($customers as $customer) {
            echo "<tr>";
            echo "<td>" , $customer->getFirstName() , "</td>";
            echo "<td>" , $customer->getLastName() , "</td>";
            echo "<td>" , $customer->getAge() , "</td>";
            echo "<td>" , $customer->getPhone() , "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Function to find a customer by last name
    function findCustomerByLastName($customers, $lastName) {
        return array_filter($customers, function($customer) use ($lastName) {
            return strtolower($customer->getLastName()) === strtolower($lastName);
        });
    }

    // Function to find customers above a certain age
    function findCustomersAboveAge($customers, $age) {
        return array_filter($customers, function($customer) use ($age) {
            return $customer->getAge() > $age;
        });
    }

    // Display all customers
    displayAllCustomers( $customers);
    echo "<br />";
    echo "<hr />";
    echo "<br />";


    // Example of finding a customer by last name
    $foundCustomers = findCustomerByLastName($customers, 'Skywalker');

    // Example of finding customers above a certain age
    $olderCustomers = findCustomersAboveAge($customers, 30);

    // Display results in side by side containers
    echo "<div class='side-by-side'>";
    echo "<div class='left'>";
    echo "<h2>Find Customers by last name: Skywalker: </h2>";
    echo "<br />";
    if (empty($foundCustomers)) {
        echo "No customers found";
    } else {
        foreach ($foundCustomers as $customer) {
            $customer->display();
            echo "<br />";
        }
    }
    echo "</div>";

    echo "<div class='right'>";
    echo "<h2>Customers above age 30: </h2>";
    echo "<br />";
    echo "<ul>";
    if (empty($olderCustomers)) {
        echo "<li>No customers found</li>";
    } else {
        foreach ($olderCustomers as $customer) {
            echo "<li>";
            $customer->display();
            echo "</li>";
        }
    }
    echo "</ul>";
?>
