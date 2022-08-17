
<?php
require "dbBroker.php";
require "model/user.php";


function clean($str)
{
    return htmlentities($str);
}

function redirect($location)
{
    header("location: {$location}");
    exit();
}

function set_message($message)
{
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function login_check_pages()
{
    if (isset($_SESSION['username'])) {
        redirect('index.php');
    }
}
function user_restrictions()
{
    if (!isset($_SESSION['username'])) {
        redirect('login.php');
    }
}

?>