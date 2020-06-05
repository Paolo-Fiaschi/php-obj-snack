<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Magazzino - PHP - OOP</title>
  </head>
  <body>
    <?php

        /*
        *     MAGAZZINO
        *
        *     Prodotto
        *       Prodotto elettronico
        *       Prodotto mobile
        *       Prodotto alimentare
        *
        *     Fornitore
        *
        *     Cliente
        *
        *     Acquisto
        *
        *     Punto vendita
        */

        class Prodotto {

          private $id;

          private $nome;
          private $weight;
          private $buyPrice;
          private $sellPrice;

          private $code;

          private $quantity;

          public function __construct($id, $nome, $weight, $buyPrice,
                                      $sellPrice, $code, $quantity) {

              $this -> id = $id;
              $this -> nome = $nome;
              $this -> weight = $weight;
              $this -> buyPrice = $buyPrice;
              $this -> sellPrice = $sellPrice;
              $this -> code = $code;
              $this -> quantity = $quantity;
          }

          public function getId() {

            return $this -> id;
          }
          public function setId($id) {

            $this -> id = $id;
          }

          public function minusQuantity($quantity) {

            $this -> quantity -= $quantity;
          }

          public function getSellPrice() {

            return $this -> sellPrice;
          }

          public function toString() {

              return  "id: " . $this -> id . "<br>"
                      . "nome: " . $this -> nome . "<br>"
                      . "weight: " . $this -> weight . "<br>"
                      . "buyPrice: " . $this -> buyPrice . "<br>"
                      . "sellPrice: " . $this -> sellPrice . "<br>"
                      . "code: " . $this -> code . "<br>"
                      . "quantity: " . $this -> quantity . "<br>";
          }
        }

        class ProdottoElettronico extends Prodotto {

          private $watt;
          private $volt;
          private $isPortable;
          private $energyClass;
          private $year;

          public function __construct($id, $nome, $weight, $buyPrice,
                                      $sellPrice, $code, $quantity,
                                      $watt, $volt, $isPortable, $energyClass,
                                      $year) {

              parent::__construct($id, $nome, $weight, $buyPrice,
                                  $sellPrice, $code, $quantity);

              $this -> watt = $watt;
              $this -> volt = $volt;
              $this -> isPortable = $isPortable;
              $this -> energyClass = $energyClass;
              $this -> year = $year;
          }

          public function toString() {

              return  parent::toString() . "---<br>"
                      . "watt: " . $this -> watt . "<br>"
                      . "volt: " . $this -> volt . "<br>"
                      . "isPortable: " .
                          ($this -> isPortable ? "true" : "false")
                          . "<br>"
                      . "energyClass: " . $this -> energyClass . "<br>"
                      . "year: " . $this -> year . "<br>";
          }
        }

        class ProdottoMobile extends Prodotto {

          private $materials;
          private $width;
          private $height;
          private $depth;

          private $tipology;

          public function __construct($id, $nome, $weight, $buyPrice,
                                      $sellPrice, $code, $quantity,
                                      $materials, $width, $height,
                                      $depth, $tipology) {

              parent::__construct($id, $nome, $weight, $buyPrice,
                                $sellPrice, $code, $quantity);

              $this -> materials = $materials;
              $this -> width = $width;
              $this -> height = $height;
              $this -> depth = $depth;
              $this -> tipology = $tipology;
          }

          public function toString() {

            return  parent::toString() . "---<br>"
                    . "materials: " . $this -> materials . "<br>"
                    . "width: " . $this -> width . "<br>"
                    . "height: " . $this -> height . "<br>"
                    . "depth: " . $this -> depth . "<br>"
                    . "tipology: " . $this -> tipology . "<br>";
          }
        }

        class ProdottoAlimentare extends Prodotto {

            private $expireDate;
            private $origin;
            private $tipology;

            public function __construct($id, $nome, $weight, $buyPrice,
                                        $sellPrice, $code, $quantity,
                                        $expireDate, $origin, $tipology) {

              parent::__construct($id, $nome, $weight, $buyPrice,
                                  $sellPrice, $code, $quantity);

              $this -> expireDate = $expireDate;
              $this -> origin = $origin;
              $this -> tipology = $tipology;
            }

            public function toString() {

              return parent::toString() . "---<br>"
                      . "expireDate: " . $this -> expireDate . "<br>"
                      . "origin: " . $this -> origin . "<br>"
                      . "tipology: " . $this -> tipology . "<br>";
            }
        }

        class Warehouse {

          private $products;

          public function __construct() {

            $this -> products = [];
          }

          public function addProduct($product) {

            $this -> products[] = $product;
          }

          public function buyProduct($id, $quantity) {

            foreach ($this -> products as $prod) {

                $idProd = $prod -> getId();

                if ($id === $idProd) {

                  echo "Magazzino<br>";

                  echo $prod -> toString();

                  echo "---<br>";

                  $prod -> minusQuantity($quantity);
                  $price = $prod -> getSellPrice();
                  $fullPrice = $price * $quantity;

                  echo $prod -> toString();

                  return $fullPrice;
                }
            }
          }

          public function toString() {

            $res = "Magazzino:<br>";

            foreach ($this -> products as $prod) {
              $res .= $prod -> toString() . "<br>-----------<br><br>";
            }

            return $res;
          }
        }

        class Client {

          private $id;

          private $name;
          private $lastname;

          private $paymantMethod;

          public function __construct($id, $name, $lastname, $paymantMethod) {

            $this -> id = $id;
            $this -> name = $name;
            $this -> lastname = $lastname;
            $this -> paymantMethod = $paymantMethod;
          }

          public function toString() {

            return "id: " . $this -> id . "<br>"
                   . "name: " . $this -> name . "<br>"
                   . "lastname: " . $this -> lastname . "<br>"
                   . "paymantMethod: " . $this -> paymantMethod . "<br>";
          }
        }

        $prod1 = new Prodotto(1, "pc", 3, 1000, 1500, 1234, 5);
        $prod2 = new Prodotto(2, "lavatrice", 25, 300, 600, 3456, 10);
        //
        // echo $prod1 -> toString() . "<br>-----------<br><br>";
        // echo $prod2 -> toString();

        $prodElet1 = new ProdottoElettronico(3, "pc", 3, 1000, 1500, 1234, 5,
                                             600, 220, false, "A", 2020);
        //
        // echo $prodElet1 -> toString();

        $prodMob = new ProdottoMobile(4, "lavatrice", 25, 300, 600, 3456, 10,
                                      "metal", 1, 1.5, 2, "pulizia");
        //
        // echo $prodMob -> toString();

        $prodAlim = new ProdottoAlimentare(5, "pere", 10, 3, 10, 7890,
                                           100, "2020/06/15", "italy", "fruit");
        // echo $prodAlim -> toString();

        $wh = new Warehouse();
        $wh -> addProduct($prod1);
        $wh -> addProduct($prod2);
        $wh -> addProduct($prodElet1);
        $wh -> addProduct($prodMob);
        $wh -> addProduct($prodAlim);

        // echo $wh -> toString();

        // $client1 = new Client(1, "Mario", "Rossi", "cash");
        // $client2 = new Client(2, "Francesca", "Da Rimini", "bancomat");

        $fullPrice = $wh -> buyProduct(5, 5);

        echo "------<br>";

        echo "Esterno<br>";

        echo "------<br>";

        echo "full price: " . $fullPrice;

        echo "<br>------<br>";

        echo $prodAlim -> toString();
    ?>
  </body>
</html>
