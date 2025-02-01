<!--
    ***** MyInteger.php *****
    Edgar D Rosales
    CSD440 Server-Side Scripting
    1 Feb 2025

    Write a program that defines a class titled MyInteger.
    The class is to hold a single integer that is set in the constructor by parameter.
    The class is to have methods isEven(int) and isOdd(int).

-->

<?php

class MyInteger {
    // Constructor
    private $myDigit;

    public function __construct($myDigit) {
        $this->myDigit = $myDigit;
    }

    public function getMyDigit()
    {
        return $this->myDigit;
    }

    public function setMyDigit($myDigit)
    {
        $this->myDigit = $myDigit;
    }



    public function isEven() {
        return $this->myDigit % 2 == 0;
    }
    public function isOdd() {
        return $this->myDigit % 2 != 0;
    }

    public function isPrime($number) {
        if ($number < 2) {
            return false;
        }
        if ($number == 2) {
            return true;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
    public function __toString() {
        return "{$this->myDigit} ";
    }
    public function display() {
        echo $this->__toString();
    }
}

?>