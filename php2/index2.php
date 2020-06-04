<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>snack oop</title>
    <?php
        class Player{
            protected $name;
            protected $lastname;
            protected $role;
            protected $year;
            protected $foot;
            public function __construct($name,
                                        $lastname,
                                        $role,
                                        $year,
                                        $foot){
                $this-> name = $name;
                $this-> lastname = $lastname;
                $this-> role = $role;
                $this-> year = $year;
                $this-> foot = $foot;
            }
            public function year(){
                return date("Y") - $this-> year;
                
            }
            public function printMe(){
                echo "name: ". $this-> name . "<br>"
                . "lastname: ". $this-> lastname . "<br>"
                . "role: ". $this-> role . "<br>"
                . "year: ". $this-> year() . "<br>"
                . "foot: ". $this-> foot . "<br>";
                 
            }
        }
        class Ability extends Player{
            private $offence;
            private $defence;
            private $shot;
            private $dribbling;
            private $speed;
            public function __construct($name,
                                        $lastname,
                                        $role,
                                        $year,
                                        $foot,
                                        $offence,
                                        $defence,
                                        $shot,
                                        $dribbling,
                                        $speed){
            parent:: __construct($name,
                                $lastname,
                                $role,
                                $year,
                                $foot);
            $this-> offence = $offence;
            $this-> defence = $defence;
            $this-> shot = $shot;
            $this-> dribbling = $dribbling;
            $this-> speed = $speed;
            }
            public function abilityAverage(){
                $abilityAv = round(($this-> offence +
                $this-> defence +
                $this-> shot +
                $this-> dribbling +
                $this-> speed)/5);
                return $abilityAv;
            }
            public function printMe(){
                echo parent:: printMe();
                echo "Ability: <br>
                Offence: ". $this-> offence . "<br>"
                . "Defence: ". $this-> defence. "<br>"
                . "Shot: ". $this-> shot. "<br>"
                . "dribbling: ". $this-> dribbling. "<br>"
                . "Speed: ". $this-> speed. "<br>"
                . "Total: ". $this-> abilityAverage(). "<br><br>";
            }
        }
        class Team{
            private $nameTeam;
            private $title;
            private $color;
            private $city;
            private $player1;
            private $player2;
            public function __construct($nameTeam,
                                        $title,
                                        $color,
                                        $city,
                                        $player1,
                                        $player2){
            $this-> nameTeam = $nameTeam;
            $this-> title = $title;
            $this-> color = $color;
            $this-> city = $city;
            $this-> player1 = $player1;
            $this-> player2 = $player2;

            }
            public function printMe(){
                echo "Name Team: " . $this-> nameTeam. "<br>"
                . "Title: ". $this-> title. "<br>"
                . "Color: ". $this-> color. "<br>"
                . "City: ". $this-> city. "<br><br>"
                . "Players: <br>";
                $this-> player1-> printMe();
                $this-> player2-> printMe();
                echo "<br>-------------------------<br>";
            }
            

        }

        
        $playerJ1A = new Ability("Alessandro", "Del Piero", "Forward", 1974, "right", 99, 99, 99, 99, 99);
        $playerJ2A = new Ability("Gianluigi", "Buffon", "Goalkeeper", 1978, "right", 20, 99, 20, 20, 20);
        $playerB1A = new Ability("Lionel", "Messi", "Forward", 1987, "left", 98, 40, 95, 99, 95);
        $playerB2A = new Ability("Arturo", "Vidal", "Midfielder", 1987, "right", 85, 80, 85, 80, 80);
        $barcelona = new Team("Barcelona", 26, "Blue&Garnet", "Barcelona", $playerB1A, $playerB2A);
        $juventus = new Team("Juventus", 37, "White&Black", "Turin", $playerJ1A, $playerJ2A);
        $juventus-> printMe();
        $barcelona-> printMe();

    ?>
</head>
<body>
    

</body>
</html>