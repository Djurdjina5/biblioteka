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
                <h1>Pretraži knjige</h1>
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Unesite naziv knjige">
                <div id=searchresult>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-left text-center mt-5 pt-5">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1>Spisak svih knjiga</h1>
                    <table id="spisak" class="table  table-warning table-striped mt-2 pt-2 mb-5 pb-5">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Naziv</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Person</th>
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
                                    <td><?php echo $row['person'] ?></td>
                                    <td><?php echo $row['deadline'] ?></td>
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

        <script type="text/javascript">
            $(document).ready(function() {
                $("#live_search").keyup(function() {
                    var input = $(this).val();
                    if (input != "") {
                        $.ajax({
                            url: "search.php",
                            method: "POST",
                            data: {
                                input: input
                            },

                            success: function(data) {
                                $("#searchresult").html(data);
                            }
                        });
                    } else {
                        $("#searchresult").css("display");

                    }
                });
            });
        </script>


        <?php
        include "footer.php";
        ?>
</body>

</html>