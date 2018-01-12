<?php
abstract class ModelAbs
{
    protected static $db = null;

    protected static function getDB()
    {
        if (self::$db) {
            return self::$db;
        }
        self::$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        return self::$db;
    }

    public function rows($table, $select)
    {
        $result = mysqli_query(self::getDB(), "SELECT " . $select . " FROM `" . $table);
        if (!$result) return array();
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function rowsWhere ($table, $where, $select)
    {

        $result = mysqli_query(self::getDB(), "SELECT " . $select . " FROM `" . $table . "` WHERE " . $where ."");
        if (!$result) return array();
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function row($table, $where, $select = '*')
    {
        $result = mysqli_query(self::getDB(), "SELECT " . $select . " FROM `" . $table . "` WHERE " . $where);
        return mysqli_fetch_assoc($result);
    }

    public function selectLimit ($table, $where, $start, $limit, $select = '*')
    {
        $result = mysqli_query(self::getDB(), "SELECT " . $select . " FROM `" . $table . "` WHERE " . $where . " LIMIT " . $start . ", " . $limit . "");
        if (!$result) return array();
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function select($table, $select, $where)
    {
        $result = mysqli_query(self::getDB(),"SELECT " . $select . " FROM " . $table . " WHERE " . $where);
        return mysqli_fetch_assoc($result);
    }

    public function column($table, $where, $valueField, $textField)
    {
        $rows = $this->rows($table, $where, $valueField. ', ' . $textField);
    }

    public function cell($table, $where, $field)
    {
        $row = $this->row($table, $where, $field);
        return $row[$field];
    }
    protected function delete ($table, $id)
    {
        $delete = mysqli_query(self::getDB(), "DELETE FROM `" . $table . "`WHERE" . $id);
        return $delete;
    }
    protected function update ($table, $field, $id)
    {
        $update = mysqli_query(self::getDB(), "UPDATE `" . $table . "` SET". $field . "WHERE" . $id);
        return $update;
    }
    protected  function insert($table, $field, $value)
    {
        $result = mysqli_query(self::getDB(), "INSERT INTO `". $table ."`(".$field.")VALUE(" . $value . ")");
        return mysqli_insert_id(self::getDB());
    }

    protected function fullTextSeatch ($select, $table, $text = '', $type)
    {
        $query = "SELECT * FROM `" . $table . "` WHERE MATCH(`" . $select . "`) AGAINST ('" . $text . "' IN " . $type .")";
//        var_dump($query);
        $result = mysqli_query(self::getDB(), $query);
        if (!$result) return array();
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}