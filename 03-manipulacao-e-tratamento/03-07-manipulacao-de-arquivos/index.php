<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

$file = __DIR__."/file.txt";
if(file_exists($file) && is_file($file)){
    echo "Existe";
}else{
    echo "Nao existe";
}
/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if(!file_exists($file) || !is_file($file)){
    $fileOpen = fopen($file,"w");
    fwrite($fileOpen,"Linha 01");
    fwrite($fileOpen,"Linha lorem  ipsun dolor.");
    fclose($fileOpen);
}else{
    //$open = fopen($file,"r");
    $data = "Dados aroba";
    //file_put_contents($file,$data);
    var_dump(file_get_contents($file));
}
/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);


//var_dump(class);
