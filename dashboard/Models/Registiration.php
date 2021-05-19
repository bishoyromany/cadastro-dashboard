<?php

namespace Models;

require_once __DIR__ . "/Model.php";

use Models\Model;

class Registiration extends Model
{
    protected $table = "registrations";

    public function create(array $data): array
    {
        var_dump($data);
        die;
        return $this->insert($data);
    }
}
