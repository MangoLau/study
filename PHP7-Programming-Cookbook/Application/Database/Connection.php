<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 2019/7/27
 * Time: 9:28 PM
 */

namespace Application\Database;

use Exception;
use PDO;

class Connection
{
    const ERROR_UNABLE = 'EOORO: no database connection';
    public $pdo;

    public function __construct(array $config)
    {
        if (!isset($config['driver'])) {
            $message = __METHOD__ . ' : ' . self::ERROR_UNABLE . PHP_EOL;
            throw new Exception($message);
        }
        $dsn = $this->makeDsn($config);
        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password'], [PDO::ATTR_ERRMODE => $config['errmode']]);
            return true;
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * @param $config
     * @return string
     */
    public function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        foreach ($config as $key => $v) {
            $dsn .= $key . '=' . $v . ';';
        }
        return substr($dsn, 0, -1);
    }

    /**
     * @param $driver
     * @param $dbname
     * @param $host
     * @param $user
     * @param $pwd
     * @param array $options
     * @return PDO
     */
    public static function factory($driver, $dbname, $host, $user, $pwd, array $options = [])
    {
        $config = [
            'driver' => $driver,
            'user' => $user,
            'password' => $pwd,
            'host' => $host,
        ];
        $dsn = self::makeDsn($config);
        try {
            return new PDO($dsn, $user, $pwd, $options);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
        }
    }
}