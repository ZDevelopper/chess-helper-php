<?php
function appel($classe) {
    echo "Fichier chargé:".$classe.'.class.php'.PHP_EOL;
    include('Class/'.$classe.'.class.php');
}

spl_autoload_register("appel");