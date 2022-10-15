<?php
include('../../config/connection.php');


try {
    $stmt = $conn->prepare("DELETE FROM categorys WHERE id = :id");
    $stmt->bindValue(":id", $_GET['id']);

    $stmt->execute();
    // header("Location:create_category.php");
    header("Location:../../different_index.php?state=2");
} catch (PDOException $e) {
    echo $e->getMessage();
}
