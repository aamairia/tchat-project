<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 09/10/2018
 * Time: 11:29
 */

namespace App\Core;


class AppPDO extends \PDO
{

    public function __construct()
    {
        $config = require __DIR__ . '/../../app/config.php';

        $default_options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ];
        $dsn = "mysql:dbname=".$config['db_name'].";host=".$config['host'].";port=".$config['port'];
        try {
            parent::__construct($dsn, $config['user'], $config['password'], $default_options);
        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }


    public function run($sql, array $args = [])
    {
        if (empty($args))
        {
            return $this->query($sql);
        }

        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}