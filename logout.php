<?php
include "./dbBroker.php";

    session_destroy();
    header('Location:index.php');
