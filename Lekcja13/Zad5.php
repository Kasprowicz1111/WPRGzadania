<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        interface Animal{
            function makeSound();
            function eat();
        }

        class Dog implements Animal{
            function makeSound(){
                return "Woof!";
            }

            function eat(){
                return "The dog is eating.";
            }
        }
        $pies= new Dog;
        echo $pies->makeSound();
        echo $pies->eat();
    ?>
</body>
</html>