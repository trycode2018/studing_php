<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

/*
$stmt = Connect::getInstance()->prepare("INSERT INTO users (first_name,last_name)
                VALUES(:first_name,:last_name);");
                $user = [
                    'first_name'=>'Ventura',
                    'last_name'=>'Henrique'
                ];

    $stmt->execute($user);
var_dump($stmt->rowCount());
*/
/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);


$pdo = Connect::getInstance();
$stmt = $pdo->prepare("SELECT first_name,last_name,document FROM users WHERE first_name=:first_name");

$name = "Robson";
$stmt->bindParam(":first_name",$name,PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->fetch());
/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);


/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();
$stmt->bindColumn('first_name',$name);
$stmt->bindColumn('email',$email);

while($user = $stmt->fetch()){
    var_dump($user);
    echo "<pre> O email de ".$name." e ".$email."</pre>";
}
