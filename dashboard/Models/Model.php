<?php

namespace Models;

require_once __DIR__ . "/../App/Controller.php";

use App\Controller as DB;

abstract class Model
{
    protected $table;

    public function setTable($table)
    {
        $this->table = $table;
    }

    public static function con()
    {
        return DB::getCon();
    }

    /**
     * Handle dynamic static method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    public function fetch($stmt)
    {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $stmt = $this->con()->prepare("SELECT * FROM " . $this->table . " ORDER BY `id` DESC");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function buildWhere(array $data)
    {
        $where = count($data) > 0 ? " WHERE " : "";
        for ($x = 0; $x < count($data); $x++) {
            $sep = $x > 0 ? " AND " : "";
            $where .= $sep . "`" . $data[$x][0] . "`" . $data[$x][1] . "'" . $data[$x][2] . "'";
        }

        return $where;
    }

    public function pagination($start, $end)
    {
        $stmt = $this->con()->prepare("SELECT * FROM " . $this->table . " ORDER BY `id` DESC LIMIT $start,$end");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function count()
    {
        $stmt = $this->con()->prepare("SELECT COUNT(*) FROM " . $this->table);
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function buildData(array $data)
    {
        $d = "";
        $x = 0;
        foreach ($data as $key => $value) {
            $sep = ", ";
            if ($x == count($data) - 1) {
                $sep = "";
            }
            $d .= "`" . $key . "`" . " = " . ":" . $key . $sep;
            $x++;
        }
        return $d;
    }

    public function buildInsertData($data)
    {
        $d = "(";
        $values = " VALUES (";
        $x = 0;
        foreach ($data as $key => $value) {
            $sep = ", ";
            if ($x == count($data) - 1) {
                $sep = "";
            }
            $d .= $key . $sep;
            $values .= "'" . $value . "'" . $sep;
            $x++;
        }
        $d .= ")";
        $values .= ")";
        return $d . $values;
    }

    public function where(array $data)
    {
        $where = $this->buildWhere($data);
        $stmt = $this->con()->prepare("SELECT * FROM " . $this->table . "$where");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function whereCount(array $data)
    {
        $where = $this->buildWhere($data);
        $stmt = $this->con()->prepare("SELECT COUNT(*) as `count` FROM " . $this->table . "$where");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function query(string $query)
    {
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function update(array $data, array $where = [])
    {
        $whereArray = $where;
        $where = $this->buildWhere($where);
        $q = $this->buildData($data);
        $query = "UPDATE " . $this->table . " SET " . $q . $where;
        $stmt = $this->con()->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        $data = $this->where($whereArray);
        return count($data) > 0 ? $data[0] : [];
    }


    public function insert($data)
    {
        $q = $this->buildInsertData($data);
        $query = "INSERT INTO " . $this->table . " " . $q;
        $stmt = $this->con()->prepare($query);
        $stmt->execute();

        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key, '=', $value];
        }
        $data = $this->where($where);
        return count($data) > 0 ? $data[0] : [];
    }


    public function delete(array $data)
    {
        $where = $this->buildWhere($data);
        $stmt = $this->con()->prepare("DELETE FROM " . $this->table . "$where");
        $stmt->execute();
        return $stmt->rowCount();
    }
}
