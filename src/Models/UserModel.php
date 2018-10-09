<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 15:52
 */

namespace App\Models;


use App\Core\AppPDO;
use App\Traits\BaseModel;

class UserModel
{
    use BaseModel;


    public function __construct()
    {
        $this->setTableName('users');
        $this->pdo = new AppPDO();
    }


    public function findUserByCredentials($pseudo, $password){

        return $this->pdo->run("SELECT * from {$this->getTableName()} where pseudo = ? and password = ?", [
            $pseudo,
            md5($password)
        ])->fetch();
    }


    public function findLoggedByRoomId($roomId){

        $sql = "SELECT * FROM {$this->getTableName()}                    
                    WHERE users.currentRoom =  ?                    
                    ;";

        return $this->pdo->run($sql, [
            $roomId
        ])->fetchAll();
    }


    public function isLogged($id = null, $status){

        try {

            $sql = "UPDATE {$this->getTableName()} SET isLogged={$status} WHERE id=".$id;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

        }
        catch(\PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    public function hasCurrentRoom($id = null, $roomId = null,  $status = 0){

        try {
            if(!$status) $roomId = 0;
            $sql = "UPDATE {$this->getTableName()} SET currentRoom='{$roomId}' WHERE id=".$id;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

        }
        catch(\PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}