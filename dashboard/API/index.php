<?php
require_once __DIR__ . "/../App/Controller.php";
require_once __DIR__ . "/../Models/Visitor.php";
require_once __DIR__ . "/../Models/Registiration.php";

use App\Controller;
use Models\Visitor;
use Models\Registiration;

Controller::setTimezone();

if (isset($_GET['section'])) {
    $map = [];
    $class = [];
    if ($_GET['section'] === "visitors") {
        $map = [
            '0' => 'id',
            '1' => 'created_at',
            '2' => 'ip',
            '3' => 'useragnt',
            '4' => 'host_of_ip'
        ];

        $class = new Visitor;
    } else {
        $map = [
            '0' => 'id',
            '1' => 'created_at',
            '2' => 'full_name',
            '3' => 'cpf',
            '4' => 'telephone',
            '5' => 'email',
            '6' => 'purchase_type',
            '7' => 'requisition_number',
            '8' => 'date_year',
            '9' => 'lucky_number',
            '10' => [
                'key' => 'CUSTOM_HANDLER',
                'handler' => function ($item) {
                    return "
                        <form method='POST'>
                            <input type='hidden' name='action' value='DELETE_REGISTRATION' />
                            <input type='hidden' name='id' value='" . $item['id'] . "' />
                            <button class='btn-reset'><img src='" . Controller::getImage('trash-bin.svg') . "' class='img-fluid' alt='Delete' /></button>
                        </form>";
                    Controller::dd($item);
                }
            ]
        ];

        $class = new Registiration;
    }

    $sortColumn = $map[$_GET['order'][0]['column'] ?? 0];

    if (!is_string($sortColumn)) {
        $sortColumn = $map[0];
    }

    echo json_encode(Controller::datatable(
        $class,
        $_GET['order'][0]['dir'] ?? 'asc',
        $sortColumn,
        $_GET['search']['value'] ?? '',
        $_GET['start'] ?? 0,
        $_GET['length'] ?? 10,
        $map,
        $map[2]
    ));


    die;
}

if (isset($_GET['telephone'])) {
    echo json_encode(Controller::addRegisteration($_GET));
    die;
}
