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
    $username = $_SESSION['username'];
    $deadline = date('Y-m-d', strtotime(date('y-m-d') . ' + 14 days'));
    $odg = Book::zaduzi($id, $deadline, $username, $conn);
} else {
    echo "Ne radi";
}
?>