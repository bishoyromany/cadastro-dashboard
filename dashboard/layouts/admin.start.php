<?php
require __DIR__ . "/../App/Controller.php";

global $controller;
$controller = new App\Controller();


if (isset($_POST['logout'])) {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    if (isset($_COOKIE['login'])) {
        unset($_COOKIE['login']);
        setcookie('login', null, 0, '/');
    }
}

$user = $controller::getUser();
$controller::setTimezone();

if (!isset($user['id'])) {
    $controller::redirect("index.php");
}

if (isset($_POST['action'])) {
    if ($_POST['action'] === "DELETE_ALL_VISITS") {
        $controller::deleteAllVisits();
    }

    if ($_POST['action'] === "DELETE_REGISTRATION") {
        $controller::deleteRegisteration((int)$_POST['id'] ?? 0);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "Please Define Title"; ?></title>
    <link rel="stylesheet" href="./libraries/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./libraries/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./assets/css/index.css">


    <script src="./libraries/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="./libraries/jquery/jquery.validate.js"></script>
    <script src="./libraries/jquery/popper.min.js"></script>
    <script src="./libraries/bootstrap/bootstrap.min.js"></script>
    <script src="./libraries/datatable/jquery.dataTables.min.js"></script>

    <script src="./assets/js/index.js"></script>
</head>

<body>
    <div class="container-fluid admin-body-content">
        <nav class="admin-navbar d-felx p-2" id="AdminNavbar">
            <div class="row">
                <div class="col-6 text-left">
                    <?php if ($back) : ?>
                        <a href="admin.php"><img src="<?php echo $controller::getImage("previous.svg"); ?>" alt="Back" class="img-fluid"></a>
                    <?php endif; ?>
                </div>
                <div class="col-6 text-right">
                    <form action="admin.php" method="POST">
                        <input type="hidden" value="1" name="logout" />
                        <button><img src="<?php echo $controller::getImage("shut-down.svg"); ?>" alt="Logout" class="img-fluid"></button>
                    </form>
                </div>
            </div>

        </nav>

        <div class="content">