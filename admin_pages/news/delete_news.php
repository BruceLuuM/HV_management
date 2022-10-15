<?php
include('../../config/connection.php');


try {
    $stmt_unlink = $conn->prepare("SELECT * FROM news WHERE id_news = :id_news LIMIT 1");
    $stmt_unlink->bindValue(":id_news", $_GET['id']);
    $stmt_unlink->execute();

    while ($fetch = $stmt_unlink->fetch()) {
        unlink('uploads/' . $fetch['image']);
    }
    $stmt = $conn->prepare("DELETE FROM news WHERE id_news = :id_news");
    $stmt->bindValue(":id_news", $_GET['id']);

    $stmt->execute();

    // header("Location:create_product.php");
    header("Location:../../different_index.php?state=3");
} catch (PDOException $e) {
    echo $e->getMessage();
}
