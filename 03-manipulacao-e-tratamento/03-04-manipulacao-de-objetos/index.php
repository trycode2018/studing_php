<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    'name'=>'Henrique Ventura',
    'mail'=> 'trycode2018@gmail.com',
    'company'=> 'Ventech'
];

$arrProfile = (object)$arrProfile;

//echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
echo "<p>{$arrProfile->name} trabalha na {$arrProfile->company}</p>";

echo "<pre>";
var_dump($arrProfile);


$ceo = $arrProfile;
unset($ceo->company);
var_dump($ceo);

$company = new stdClass();
$company->company = 'Ventech';
$company->ceo = $ceo;
$company->manager = new stdClass();
$company->manager->name = "Romeu";
$company->manager->mail = "romeu@gmail.com";

var_dump($company);

echo "</pre>";
/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);