<?php
require "../dbBroker.php";
require "../model/books.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
} ?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $odg = Book::delete($id, $conn);
} else {
    echo "Ne radi";
}
?>