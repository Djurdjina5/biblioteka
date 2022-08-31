<?php
require "dbBroker.php";
require "model/user.php";
$username = $_SESSION['username'];
$type = $_SESSION['type'];
?>

<!DOCTYPE html>
<nav class="navbar navbar-expand navbar-light bg-warning fixed-top">
    <a class="navbar-brand" href="#">
        <img src="./img/books.png" width="30" height="30" alt="">Biblioteka</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <?php if (!isset($username)) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"> Početna</a>
                </li>

            <?php } ?>

            <?php if ($type == "bibliotekar") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="bibliotekar.php">Bibliotekar</a>
                </li>
            <?php } ?>

            <?php if ($type == "citalac") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="citalac.php">Čitalac</a>
                </li>
            <?php } ?>
            <?php if ($type == "citalac") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="knjige.php">Knjige</a>
                </li>
            <?php } ?>


        </ul>
    </div>
    <?php if (isset($username)) { ?>
        <div class="nav-item ml-0">
            <a class="nav-link" href="logout.php">
                <h5>Log out</h5>
            </a>
        </div>
    <?php } ?>

</nav>