<?php

namespace App;

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/../Models/User.php";

use App\Database;
use Models\User;

class Controller
{
    /**
     * Get Image URL
     */
    public static function getImage(String $name): String
    {
        return "./assets/images/$name";
    }

    public static function getUser()
    {
        return (new User)->user();
    }

    /**
     * Login
     */
    public static function login(array $data): array
    {
        return (new User)->login($data);
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
        header("location : $url");
        echo "<h1>you are being redirected to <a href='$url'>To</a></h1><script>location.href = '$url'</script>";
        exit();
    }
}