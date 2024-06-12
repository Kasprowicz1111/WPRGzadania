<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        trait A {
            public function smallTalk() {
                echo 'a';
            }
            public function bigTalk() {
                echo 'A';
            }
        }
        
        
        trait B {
            public function smallTalk() {
                echo 'b';
            }
            public function bigTalk() {
                echo 'B';
            }
        }
        class ten{
            use A, B {
                A::smallTalk as smallTalk1;
                A::bigTalk as bigTalk1;
                B::smallTalk insteadof A;
                B::bigTalk insteadof A;
            }
            public function small() {
                $this->smallTalk1();
                $this->smallTalk();
            }
            public function big() {
                $this->bigTalk1();
                $this->bigTalk();
            }
        
        }
        $to = new ten;
        $to->small();
        $to->big();
    ?>
</body>
</html>