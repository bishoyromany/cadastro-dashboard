<?php

namespace App;

session_start();

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../Models/Config.php";
require_once __DIR__ . "/../Models/Visitor.php";
require_once __DIR__ . "/../Models/Registiration.php";

use App\Database;
use Models\User;
use Models\Config;
use Models\Visitor;
use Models\Registiration;

class Controller
{
    /**
     * Get Image URL
     */
    public static function getImage(String $name): String
    {
        return "./assets/images/$name";
    }

    public static function datatable(Object $class, string $order, string $column, string $search, int $start, int $end, array $map, string $searchColumn): array
    {
        $result = [];
        $where = [];
        if (strlen($search) > 0) {
            $where = [[$searchColumn, 'LIKE', '%' . $search . '%']];
        }

        $d = $class->datatable($where, ['start' => $start, 'end' => $end], ['column' => $column, 'sort' => $order]);
        $count = $class->whereCount($where);
        $mapedData = [];

        foreach ($d as $data) {
            $data['created_at'] = date('d/m/Y H:i:s', strtotime($data['created_at']));
            $tempData = [];
            foreach ($map as $key => $value) {
                if (is_string($value)) {
                    $tempData[$key] = $data[$value];
                } else {
                    if ($value['key'] === "CUSTOM_HANDLER") {
                        $tempData[$key] = $value['handler']($data);
                    }
                }
            }

            $mapedData[] = $tempData;
        }

        $result['recordsTotal'] = $count[0]['count'] ?? 0;
        $result['recordsFiltered'] = $count[0]['count'] ?? 0;
        $result['data'] = $mapedData;

        return $result;
    }

    public static function addVisitor(): array
    {
        return (new Visitor)->visitor();
    }

    public static function visitorsCount(): int
    {
        return (new Visitor)->count();
    }

    public static function deleteAllVisits(): int
    {
        return (new Visitor)->delete([]);
    }

    public static function addRegisteration(array $data): array
    {
        return (new Registiration)->create($data);
    }

    public static function registrationsCount(): int
    {
        return (new Registiration)->count();
    }

    public static function deleteRegisteration(int $id): int
    {
        return (new Registiration)->delete([['id', '=', $id]]);
    }

    public static function getUser()
    {
        return (new User)->user();
    }

    public static function setTimezone()
    {
        date_default_timezone_set(self::getConfig("TIME_ZONE"));
    }

    /**
     * Login
     */
    public static function login(array $data): array
    {
        return (new User)->login($data);
    }


    public static function getConfig(String $key)
    {
        return (new Config)->getConfig($key);
    }

    public static function getCon()
    {
        return Database::getInstance()->getConnection();
    }

    /**
     * Debug Tools
     */
    public static function dd(...$data)
    {
        foreach ($data as $d) {
            self::dnl($d);
        }
        die;
    }

    private static function d($data)
    {
        if (is_null($data)) {
            $str = "<i>NULL</i>";
        } elseif ($data == "") {
            $str = "<i>Empty</i>";
        } elseif (is_array($data)) {
            if (count($data) == 0) {
                $str = "<i>Empty array.</i>";
            } else {
                $str = "<table style=\"border-bottom:0px solid #000;\" cellpadding=\"0\" cellspacing=\"0\">";
                foreach ($data as $key => $value) {
                    $str .= "<tr><td style=\"background-color:#008B8B; color:#FFF;border:1px solid #000;\">" . $key . "</td><td style=\"border:1px solid #000;\">" . self::d($value) . "</td></tr>";
                }
                $str .= "</table>";
            }
        } elseif (is_object($data)) {
            $str = self::d(get_object_vars($data));
        } elseif (is_bool($data)) {
            $str = "<i>" . ($data ? "True" : "False") . "</i>";
        } else {
            $str = $data;
            $str = preg_replace("/\n/", "<br>\n", $str);
        }
        return $str;
    }

    private static function dnl($data)
    {
        echo self::d($data) . "<br>\n";
    }

    public static function redirect(String $url)
    {
        // header("location : $url");
        echo "<script>location.href = '$url'</script>";
        exit();
    }
}
