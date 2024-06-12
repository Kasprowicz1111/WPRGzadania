<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        interface Volume{
            function increaseVolume();
            function decreaseVolume();
        }

        interface Playable {
            function play();
            function stop();
        }

        class MusicPlayer implements Volume, Playable{
            public $volume = 1;
            public $isPlaying = false;
            function increaseVolume(){
                if ($this->volume!=10)
                {
                    $this->volume+=1;
                }
                
            }

            function decreaseVolume(){
                if ($this->volume!=0)
                {
                    $this->volume-=1;
                }
            }

            function play(){
                $this->isPlaying=true;
            }

            function stop(){
                $this->isPlaying=false;
            }

            function getVolume() {
                return $this->volume;
            }

            function getisPlaying() {
                return $this->isPlaying;
            }
    
        }

        $ten = new MusicPlayer;
        $ten->increaseVolume();
        $ten->play();
        $ten->stop();
        echo $ten->getVolume();
        echo "<br>";
        echo $ten->getisPlaying();
        
    ?>
</body>
</html>