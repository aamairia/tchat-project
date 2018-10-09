<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 15:46
 */

namespace App\Traits;

trait BaseModel
{

    private $table_name;

    private $pdo;

    public function find($id)
    {


        return $this->pdo->run("SELECT * from {$this->getTableName()} where id = ?", [
            $id
        ])->fetch();
    }

    public function findAll()
    {

        return $this->pdo->run("SELECT * from {$this->getTableName()}")->fetchAll();
    }




    /**
     * @param $table_name
     */
    public function setTableName($table_name){
        $this->table_name = $table_name;
    }

    /**
     * @return string
     */
    public function getTableName(){
       return $this->table_name ;
    }

}