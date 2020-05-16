<?php

function pdoHelper() 
{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=blogs', 'sunav', 'harry');
    //$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id13731217_blogs', 'id13731217_onewdrost', 'ySyA2$%ifk]~[4)^');
        // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}
?>