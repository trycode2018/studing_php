<?php

use Source\Related\Company;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

$fsphp = new \Source\Related\Company();
$fsphp->bootCompany("UpInside","Rua 3 , casa 3339");

echo "<pre>";
var_dump($fsphp);
echo "</pre>";


$adress = new \Source\Related\Adress("Sequele","Bloco 7, Rua 3, Entrada B",202);
$fsphp->setAdress($adress);

//$fsphp->boot("UpInside",$adress);
var_dump($fsphp);
/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$laradev = new \Source\Related\Product("Laravel Developer",10997);
$vuejs = new \Source\Related\Product("Vuejs 3 ",1237);

$fsphp->addProduct($laradev);
$fsphp->addProduct($vuejs);

echo "<pre>";

var_dump($fsphp);

echo "</pre>";

foreach($fsphp->getProducts() as $product){
    echo "<p> {$product->getName()} por R$ {$product->getPrice()}";
}
/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);










