<?php

    //connecting with MySQL database
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=blogs', 'sunav', 'harry');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $name = htmlentities($_POST['name']);
    $description= htmlentities($_POST['description']);
    $category= htmlentities($_POST['category']);
    $author = htmlentities($_POST['author']);
    $status = htmlentities($_POST['status']);
    $stmt = $pdo->prepare(" INSERT INTO blogs (name, description, category, author, date, time, status) VALUES (:name, :description, :category, :author,NOW(), NOW(), :status)");

    $stmt->execute([
    ':name' => $name, 
    ':description' => $description, 
    ':category' => $category,
    ':author' => $author,
    ':status' => $status
    ]);

    header("Location: index.php");
    return;
?>