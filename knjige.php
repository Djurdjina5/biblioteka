<?php
require "dbBroker.php";
require "./model/books.php";
session_start();
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
                <h1>Spisak knjiga</h1>
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Unesite ime knjige">
                <div id=searchresult>

                </div>
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
                    $("#searchresult").css("display", "none");

                }
            });
        });
    </script>


    <?php
    include "footer.php";
    ?>
</body>

</html>