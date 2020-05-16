<?php

    include 'pdo_helper.php';
    $pdo = pdoHelper();
    
    $id= htmlentities($_POST['id']);
    $name = htmlentities($_POST['name']);
    $description= htmlentities($_POST['description']);
    $category= htmlentities($_POST['category']);
    $author = htmlentities($_POST['author']);
    $status = htmlentities($_POST['status']);
    
    $stmt = $pdo->prepare("
        UPDATE blogs
        SET name = :name, description = :description, category = :category, author = :author, date = NOW(), time = NOW(), status = :status
        WHERE id =".$id
    );

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