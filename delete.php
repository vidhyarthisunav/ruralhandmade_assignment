<?php

    include 'pdo_helper.php';
    $pdo = pdoHelper();

    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id =".$_GET['id']);

    $stmt->execute([':id' => $_GET['id'],]);

    header('Location: index.php');
    return;
?>