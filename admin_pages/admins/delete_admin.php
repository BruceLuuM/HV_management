<?php
include('../../config/connection.php');


try {
    $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = :id_admin");
    $stmt->bindValue(":id_admin", $_GET['id']);

    $stmt->execute();
    // header("Location:create_admin.php");
    header("Location:../../different_index.php?state=1");
} catch (PDOException $e) {
    echo $e->getMessage();
}
