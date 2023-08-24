<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);

$model = new \Source\Models\User();

$user = $model->load(34);
echo "<pre>";
var_dump($user,"{$user->first_name} {$user->last_name}");

echo "</pre>";
/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

$data = ['first_name','last_name','email','document'];

echo "<pre>";
$user = $model->all(5,0,implode(', ',array_values($data)));
var_dump($user);





