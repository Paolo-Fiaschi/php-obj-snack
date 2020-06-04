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
            private $name;
            private $lastname;
            public function __construct($name, $lastname){
                $this-> name = $name;
                $this-> lastname= $lastname;
            }
            public function printMe(){
                echo "Author:<br>
                name: ". $this-> name."<br>"
                . "lastname: ". $this-> lastname. "<br>";
            }
            
        }
        class Book{
            private $title;
            private $price;
            private $author;
            public function __construct($title, $price, $author){
                $this-> title = $title;
                $this-> price = $price;
                $this-> author = $author;
            }
            public function printMe(){
                
                echo "Book:<br>
                title: ". $this-> title. "<br>"
                . "price: ". $this-> price. "<br>";
                $this-> author-> printMe();
            }
        }

        $author1 = new Author("Gioia", "Maina");
        $author2 = new Author("Mario", "Rossi");
        $book1 = new Book("Un giorno in pretura", "30$", $author1);
        $book1-> printMe();
    ?>
</head>
<body>
    
</body>
</html>