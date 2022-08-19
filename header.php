<?php
require "dbBroker.php";
require "model/user.php";
?>
<!DOCTYPE html>
<nav class="navbar navbar-expand navbar-light bg-warning fixed-top">
    <a class="navbar-brand" href="#">
        <img src="./img/books.png" width="30" height="30" alt="">Biblioteka</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bibliotekar.php">Bibliotekar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="citalac.php">Čitalac</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="knjige.php">Knjige</a>
            </li>
        </ul>
    </div>
    <div class="nav-item ml-0">
        <a class="nav-link" href="logout.php">
            <h5>Log out</h5>
        </a>
    </div>
</nav>