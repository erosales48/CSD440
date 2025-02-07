<!--
    Edgar Rosales
    CSD440 Server-Side Scripting
    January 8, 2021

    This program is a simple example of a class, using php.
-->

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>First Program</title>
    </head>
    <body>
        <h1>My First Program</h1>
        <br>
        <hr>
        <?php
            class Car {
                public $color;
                public $model;
                public $year;
                public $engine;
                public function __construct($color, $model, $year, $engine) {
                    $this->color = $color;
                    $this->model = $model;
                    $this->year = $year;
                    $this->engine = $engine;
                }

                public function drive() {
                    return "My car is a $this->year $this->color $this->model<br>It has a $this->engine. ";
                }
            }

            $car = new Car('white', 'Jeep Cherokee', '2018', 'V6 Engine');
            echo $car->drive();
            echo "<br><br>";
            var_dump($car);

        ?>
    </body>
</html>
