<?php
require "../dbBroker.php";
require "../model/books.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<?php
$book = new Book($_POST['id'], $_POST['title'], $_POST['author'], null, null);
$odg = Book::add($book, $conn);
return $odg;
?>