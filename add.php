<?php

    //connecting with MySQL database
    include 'pdo_helper.php';
    $pdo = pdoHelper();
    

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