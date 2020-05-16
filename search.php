<?php
    
    include 'pdo_helper.php';
    $pdo = pdoHelper();

    $all_blogs = $pdo->query("SELECT * FROM blogs WHERE name LIKE '%".$_GET['search']."%'|| author LIKE '%".$_GET['search']."%' ||
    description LIKE '%".$_GET['search']."%'|| category LIKE '%".$_GET['search']."%'");

    while ( $row = $all_blogs->fetch(PDO::FETCH_OBJ) ) 
    {
        $blogs[] = $row;
    }
    
    include 'main.php';

?>
