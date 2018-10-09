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

class RoomModel
{
    use BaseModel;


    public function __construct()
    {
        $this->setTableName('rooms');
        $this->pdo = new AppPDO();
    }
}