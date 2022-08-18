<?php
require "dbBroker.php";
include "./model/books.php";

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $query = sprintf(
        "SELECT id,title,author,deadline FROM books WHERE title LIKE '%s%%'",
        mysqli_real_escape_string($conn, $input)
    );
    $result = $conn->query($query);


    if (mysqli_num_rows($result) > 0) {
?>
        <table class="table  table-warning table-striped mt-5 pt-5" id="table1">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Rok za vraćanje</th>
                    <th scope="col">Zaduži</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        <!-- <div class="form-group"> -->
                        <td id="myrow"><?php echo $row['id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['author'] ?></td>
                        <td name="deadline"><?php echo  $row['deadline'] ?></td>
                        <td><?php if ($row['deadline'] == null) { ?>

                                <button id="btnZaduzi" type="submit" class="btn btn-warning btn-block" onclick="zaduzi()">Zaduži</button>
                                <!-- </div> -->
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                endwhile;
                // }
                ?>
            </tbody>
        </table>
<?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>Nisu nađeni rezultati</h6>";
    }
}
?>


<script>
    <?php require_once("./js/main.js"); ?>
</script>