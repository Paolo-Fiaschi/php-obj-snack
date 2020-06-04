<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oop snack</title>
    <?php
        // creare classe Book (titol, author, price) + classe Author (name, lastname)
        // definire per entrambe le classi costruttore che accetta tutti gli attributi 
        // definire per entrambe le classi metodo printMe()
        class Author {
            protected $name;
            protected $lastanme;
            public function __construct($name, $lastanme){
                $this-> name = $name;
                $this-> lastname= $lastanme;
            }
            public function printMe(){
                echo "Author:<br>
                name:". $this-> name."<br>"
                . "lastname:". $this-> lastname. "<br>";
            }
            
        }
        class Book{
            protected $title;
            protected $price;
            protected $author1;
            public function __construct($title, $price, $author1){
                $this-> title = $title;
                $this-> price = $price;
                $this-> author1 = $author1;
            }
            public function printMe(){
                
                echo "Book:<br>
                title:". $this-> title. "<br>"
                . "price:". $this-> price. "<br>"
                . $this-> author1-> printMe();
            }
        }

        $author1 = new Author("Gioia", "Maina");
        $book1 = new Book("Un giorno in pretura", "30$", $author1);
        $book1-> printMe();
    ?>
</head>
<body>
    
</body>
</html>