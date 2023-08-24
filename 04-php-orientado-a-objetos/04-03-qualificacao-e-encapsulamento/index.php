<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require __DIR__.'/classes/App/Template.php';
require __DIR__.'/classes/Web/Template.php';

use App\Template;
use Web\Template as WebTemplate;

$appTemplate = new Template();
$webTemplate = new WebTemplate();
echo "<pre>";
var_dump(
    $appTemplate,
    $webTemplate
);

echo "</pre>";

/* 
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);


/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);
