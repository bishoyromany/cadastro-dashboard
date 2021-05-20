<?php
require_once __DIR__ . "/../App/Controller.php";
require_once __DIR__ . "/../Models/Visitor.php";
require_once __DIR__ . "/../Models/Registiration.php";

use App\Controller;
use Models\Visitor;
use Models\Registiration;

if (isset($_GET['section'])) {
    $map = [];
    $class = [];
    if ($_GET['section'] === "visitors") {
        $map = [
            '0' => 'id',
            '1' => 'created_at',
            '2' => 'ip',
            '3' => 'useragnt'
        ];

        $class = new Visitor;
    } else {
    }

    echo json_encode(Controller::datatable(
        $class,
        $_GET['order'][0]['dir'] ?? 'asc',
        $map[$_GET['order'][0]['column'] ?? 0],
        $_GET['search']['value'] ?? '',
        $_GET['start'] ?? 0,
        $_GET['length'] ?? 10,
        $map,
        $map[2]
    ));


    die;
}

Controller::dd($_GET);
