<?php

namespace Models;

require_once __DIR__ . "/Model.php";

use Models\Model;

class Registiration extends Model
{
    protected $table = "registrations";

    public function create(array $data): array
    {
        return $this->insert([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'created_at' => date('Y-m-d H:i:s'),
            'cpf' => $data['cpf'],
            'telephone' => $data['telephone'],
            'purchase_type' => $data['purchasetype'],
            'requisition_number' => $data['requestno'],
            'date_year' => $data['monthyear'],
            'lucky_number' => $data['luckyno']
        ]);
    }
}
