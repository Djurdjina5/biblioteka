<?php
require "dbBroker.php";
require "./model/books.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$books = Book::getAll($conn);
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
    <div class="container">
        <div class="row d-flex justify-content-left text-center mt-5 pt-5">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h1>Spisak knjiga</h1>
                <table class="table  table-warning table-striped mt-5 pt-5">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Person</th>
                            <th scope="col">Rok za vraćanje</th>
                            <th scope="col">Izbriši</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $books->fetch_assoc()) :
                        ?>
                            <tr>
                                <td id="red"><?php echo $row['id'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['author'] ?></td>
                                <td><?php echo $row['person'] ?></td>
                                <td><?php echo $row['deadline'] ?></td>
                                <td>
                                    <button id="btnIzbrisi" type="button" class="btn btn-danger btn-block" onclick="izbrisi()">Izbrisi</button>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        // }
                        ?>
                    </tbody>
                </table>
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