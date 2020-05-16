<?php

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=blogs', 'sunav', 'harry');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id =".$_GET['id']);

    $stmt->execute([':id' => $_GET['id'],]);

    header('Location: index.php');
    return;
?>