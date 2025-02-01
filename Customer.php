<!--
***** Customer.php *****
Edgar D Rosales
CSD440 Server-Side SScripting
31 Jan 2025
-->

<?php
class Customer {
    private $firstName;
    private $lastName;
    private $age;
    private $phone;

    public function __construct($firstName, $lastName, $age, $phone) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function getAge() {
        return $this->age;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    public function setAge($age) {
        $this->age = $age;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function __toString() {
        return "{$this->firstName} {$this->lastName} ({$this->age})";
    }
    public function display() {
        echo $this->__toString();
        echo "<br />";
        echo "Phone: {$this->phone}";
        echo "<br />";
        echo "------------------------------------";
        echo "<br />";
    }
}

?>
