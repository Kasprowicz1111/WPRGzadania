<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        trait Speed{
            public $speed=0;
            public function increaseSpeed(int $a){
                $this->speed+=$a;
            }

            function decreaseSpeed(int $a){
                $this->speed-=$a;
            }
        }

        class Car{
            use Speed;

            function start(){
                $this->speed=0;
                $this->increaseSpeed(10);
            }

            function getspeed(){
                return $this->speed;
            }
        }

        $auto = new Car;
        echo $auto->getspeed();
        $auto->start();
        echo "<br>";
        echo $auto->getspeed();

    ?>
</body>
</html>