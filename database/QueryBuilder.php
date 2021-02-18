<?php

class QueryBuilder{

    protected $pdo, $query, $queryStatus = false;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


   public function getAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function create($table, $date){

        $keys = implode(',', array_keys($date));
        $tags = ":" . implode(', :', array_keys($date));

        $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($date);

    }

    public function getOne($table, $id){
        $sql = "SELECT * FROM users WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);

    }


    public function insert($table, $fields = [])
    {
        $values = '';
        foreach ($fields as $field) {
            $values .= '?,';
        }
        $values = rtrim($values, ',');

        $keys = array_keys($fields);
        $sql = "INSERT INTO {$table} (" . '`' . implode("`, `", $keys) . '`' . ") VALUES ({$values})";

        $this->query($sql, $fields);

        return $this->queryStatus;
    }


    public function update($table, $id, $fields)
    {
        $set = '';
        foreach ($fields as $key => $field) {
            $set .= "`{$key}` = ?, ";
        }

        $set = rtrim($set, ', ');
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
        $this->query($sql, $fields);

        return $this->queryStatus;
    }



    public function delete($table, $id){

        $this->action('DELETE', $table, ['id', '=', $id]);
        return $this->queryStatus;
    }



    public function query($sql, $params = []){
        $this->error = false;
        $this->query = $this->pdo->prepare($sql);

        if(count($params)){
            $i = 1;
            foreach ($params as $param){
                $this->query->bindValue($i, $param);
                $i++;
            }
            //$this->query->bindValue(1, $params[0]);
        }

        $this->queryStatus = $this->query->execute();
        return $this->query;
    }


    public function action($action, $table, $where = []){
        if (count($where) === 3){

            $operators = ['=', '>', '<', '>=', '<='];
            list($field, $operator, $value) = $where;

            if (in_array($operator, $operators)) {


                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                //var_dump($sql);die();
                $query = $this->query($sql, [$value]);
                if ($action == 'SELECT *'){
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($result)) {
                        return $result;
                    } else {
                        return false;
                    }
                }
                return $this->queryStatus;
            }
        }
        return false;
    }


    public function get($table, $where = []){
        //var_dump($table);die();
        return $this->action('SELECT *', $table, $where);
    }

    public function getById($table, $id)
    {
        return $this->action('SELECT *', $table, ['id', '=', $id])[0];
    }

}