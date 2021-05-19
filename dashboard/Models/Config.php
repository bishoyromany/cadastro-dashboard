<?php

namespace Models;

require_once __DIR__ . "/Model.php";

use Models\Model;

class Config extends Model
{
    protected $table = "configs";
    protected $cookieDays = (86400 * 30 * 30);

    public function getConfig(string $key)
    {
        return $this->where([['key_name', '=', $key]])[0]['value'] ?? null;
    }
}
