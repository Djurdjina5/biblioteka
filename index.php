<?php

require "dbBroker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    error_log("usao sam ovde");

    $korisnik = new User($uname, $upass);
    $odg = User::logInUser($korisnik, $conn);

    if ($odg->num_rows == 1) {
        echo `
        <script>
        console.log("Uspesno ste se prijavili");
        </script>
        `;
        $tip = '';
        while ($row = $odg->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $tip = $row['type'];
        }
        if ($tip == 'bibliotekar') {
            header('Location: bibliotekar.php');
        } else {
            header('Location:citalac.php');
        }
        exit();
    } else {
        echo `
        <script>
        console.log("Niste se prijavili");
        </script>
        `;
    }
}
?>

!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head.php"
    ?>
    <title>Biblioteka</title>
</head>

<body>
    <?php include "header.php"
    ?>
    <div class="login-form">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-left align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="#">
                        <h1>Ulogujte se</h1>
                        <div class="form-outline mb-4 ml-4">
                            <label class="username">Korisničko ime</label>
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Unesite username" required>
                        </div>

                        <div class=" form-outline mb-4 ml-4">
                            <label for="password">Lozinka</label>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Unesite šifru" required>
                        </div>

                        <div class=" text-center text-lg-start mt-4 pt-2 ml-4">
                            <button type="submit" class="btn btn-warning btn-lg" name="submit" style="padding-left: 2.5rem; padding-right: 2.5rem;">Prijavi se</button>
                        </div>

                    </form>
                </div>


            </div>




            <?php include "footer.php"
            ?>



</body>

</html>