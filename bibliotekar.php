<?php
require "dbBroker.php";
require "./model/books.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div class="container">
        <div class="row d-flex justify-content-left text-center mt-5 pt-5">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h1>Dodaj novu knjigu</h1>
                <form name="addForm">
                    <div class="form group">
                        <label for="id" class="mb-1 text-align-left">ID</label>
                        <input type="number" class="form-control" name="id" placeholder="Unesite ID">
                    </div>
                    <div class="form group">
                        <label for="title" class="mb-1 mt-3">Naziv</label>
                        <input type="text" class="form-control" name="title" placeholder="Unesite naziv">
                    </div>
                    <div class="form group">
                        <label for="author" class="mb-1 mt-3">Autor</label>
                        <input type="text" class="form-control" name="author" placeholder="Unesite autora">
                    </div>
                    <div class="form group">
                        <button id="btnDodaj" type="button" class="btn btn-warning btn-block mt-3" onclick="dodaj()">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php
    include "footer.php";
    ?>
</body>

</html>

<script>
    <?php require_once("./js/main.js"); ?>
</script>