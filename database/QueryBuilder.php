<?php

class QueryBuilder{

    protected $pdo;

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

    public function update($table, $date, $id)
    {
       $keys = array_keys($date);

       $string = '';

       foreach ($keys as $key){
           $string .= $key . '=:' . $key . ',';
       }
       $keys = rtrim($string, ',');

       $date['id'] = $id;

       $sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
       $statement = $this->pdo->prepare($sql);
       $statement->execute($date);
    }

    public function delete($table, $id){

        $sql = "DELETE FROM {$table} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

    }
}