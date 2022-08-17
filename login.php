<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.php";
    ?>
    <title>Login</title>
</head>

<body>
    <?php
    include "header.php"
    ?>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-left align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="#">
                        <h1>Ulogujte se</h1>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="username" class="form-control form-control-lg" placeholder="Unesite username" required />
                            <label class="form-label" for="username">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" class="form-control form-control-lg" placeholder="Unesite šifru" required />
                            <label class="form-label" for="password">Šifra</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-warning btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>

</html>