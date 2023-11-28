<?php

namespace App;
class Model {
    protected $sqli;

    public function __construct(string $user, string $pass, string $db, string $host){
        // create connection using sqli
        $this->sqli = mysqli_connect($host, $user, $pass, $db);

        //check if database connection is successful
        if(!$this->sqli){
            die('Cannot connect to database');
        }
    }

    public function find(string $tablename, array $ids){
        
    }
}