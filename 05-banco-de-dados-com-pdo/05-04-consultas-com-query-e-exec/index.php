<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "
    INSERT INTO users(first_name,last_name,email,document)
    VALUES('Robson','Leite','cursos@upinside.com',2314456700);
    ";

    try{
       // $exec = Connect::getInstance()->exec($insert);
        var_dump(Connect::getInstance()->lastInsertId());
    }catch(PDOException $exception){
        echo $exception->getMessage();
    }

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try{
    $query = Connect::getInstance()->query("SELECT * FROM users LIMIT 3");

    echo "<pre>";
    var_dump(
        $query,
        $query->rowCount(),
        $query->fetchAll()
    );
}catch(PDOException $exception){

}
/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try{

    $exec = Connect::getInstance()->exec("UPDATE users SET first_name='Kaue', last_name='Cardoso
    ' WHERE id>50 ");
    var_dump($exec);
}catch(PDOException $exception){

}
/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try{
    $exec = Connect::getInstance()->exec("DELETE FROM users WHERE id>50");
    var_dump($exec);
}catch(PDOException $exception){

}