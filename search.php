<?php
    
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=blogs', 'sunav', 'harry');
        // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $all_blogs = $pdo->query("SELECT * FROM blogs WHERE name LIKE '%".$_GET['search']."%'|| author LIKE '%".$_GET['search']."%' ||
    description LIKE '%".$_GET['search']."%'|| category LIKE '%".$_GET['search']."%'");

    while ( $row = $all_blogs->fetch(PDO::FETCH_OBJ) ) 
    {
        $blogs[] = $row;
    }
    
    include 'main.php';

?>
