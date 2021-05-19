<?php

namespace Models;

require_once __DIR__ . "/Model.php";

use Models\Model;

class User extends Model
{
    protected $table = "users";
    protected $cookieDays = (86400 * 30 * 30);

    public function login(array $data): array
    {
        $errors = [];

        $user = $this->where([['username', '=', $data['username'] ?? null], ['password', '=', sha1($data['password'] ?? null)]]);

        if (!empty($user)) {
            $user = $user[0];
            $_SESSION['user'] = $user;
            $cookieHash = sha1(uniqid() . rand(100000, 10000000));
            setcookie("login", $cookieHash, isset($data['remember_me']) ? time() + $this->cookieDays : 0);
            $this->update([
                'cookie' => $cookieHash
            ], [['id', '=', $user['id']]]);
        } else {
            $username = $this->where([['username', '=', $data['username'] ?? null]]);
            if (empty($username)) {
                $errors['username'] = "Username is invalid";
            }

            $password = $this->where([['password', '=', $data['password'] ?? null]]);
            if (empty($password)) {
                $errors['password'] = "Password is invalid";
            }
        }

        return $errors;
    }


    public function user()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        if (isset($_COOKIE['login'])) {
            $user = $this->where([['cookie', '=', $_COOKIE['login']]]);

            if (!empty($user)) {
                return $user[0];
            }
        }

        return false;
    }
}
