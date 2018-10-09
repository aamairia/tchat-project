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

class MessageModel
{
    use BaseModel;


    public function __construct()
    {
        $this->setTableName('messages');
        $this->pdo = new AppPDO();
    }


    public function findByRoomId($roomId)
    {

        $sql = "SELECT * FROM {$this->getTableName()}
                    INNER JOIN users
                    WHERE users.id = messages.insertedBy and messages.roomId = ?
                    ORDER BY messages.createdAt ASC
                    ;";


        return $this->pdo->run($sql, [
            $roomId
        ])->fetchAll();
    }


    public function insertMessage($user, $room, $message)
    {
        try {
            $date = new \DateTime('now');
            $date = $date->format('Y-m-d h:i:s');
            $sql = "INSERT INTO {$this->getTableName()} (content, insertedBy, roomId, createdAt)
                      VALUES (:message, :user_id, :room_id,  :date_t)";

            $statement = $this->pdo->prepare($sql);

            $statement->execute(array(
                "message" => $message,
                "user_id" => $user['id'],
                "room_id" => $room['id'],
                "date_t" => $date,

            ));

        } catch (\PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        return true;
    }
}