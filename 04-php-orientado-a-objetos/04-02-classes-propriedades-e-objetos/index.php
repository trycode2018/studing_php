<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

require __DIR__.'/classes/User.php';
/* 
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);
echo "<pre>";
$user = new User();
var_dump($user);
echo "</pre>";
/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);
echo "<pre>";

$user->firstName = "Wilson";
$user->lastName = "Ventura";
$user->email = "cursophp";
var_dump($user);
echo "</pre>";
/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Henrique");
$user->setLastName("Ventura");
$user->setEmail("henrique2022");

if(!$user->setEmail("henrique2022@gmail")){
    echo "<p class='trigger error'> O e-mail e invalido!</p>";
}
echo "<pre>";
var_dump($user);
echo "</pre>";



