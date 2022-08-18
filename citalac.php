<?php
require "dbBroker.php";
require "./model/books.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$books = Book::getByUser($username, $conn);
if (!$books) {
    echo "Greška";
    die();
}
if (!$books) {
    echo "Nemate zaduženih knjiga!";
} else {
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
        <section>
            <div class="container h-custom mt-5 pt-5">
                <h1><?php
                    echo "Zdravo, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "!";
                    ?>
                </h1>
                <p>Spisak tvojih zaduženih knjiga je dat u tabeli:</p>
                <table class="table  table-warning table-striped mt-5 pt-5">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Rok za vraćanje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $books->fetch_assoc()) :
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['author'] ?></td>
                                <td><?php echo $row['deadline'] ?></td>
                            </tr>
                        <?php
                        endwhile;
                        // }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

    <?php
}
include "footer.php";
    ?>

    </body>

    </html>