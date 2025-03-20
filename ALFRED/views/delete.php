<?php
require_once __DIR__ . "/../config/database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("DELETE FROM personal_information WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit();
}
?>

