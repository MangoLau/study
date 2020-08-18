<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 2019/8/3
 * Time: 1:10 PM
 */

$params = [
    'host' => 'localhost',
    'user' => '',
    'pwd' => '',
    'db' => 'test',
];

try {
    $dsn = sprintf('mysql:charset=UTF8;host=%s;dbname=%s', $params['host'], $params['db']);
    $pdo = new PDO($dsn, $params['user'], $params['pwd']);
    $stmt = $pdo->query('SELECT * FROM customer ORDER BY id limit 20');
    printf('%4s | %20s | %5s | %7s' . PHP_EOL, 'ID', 'NAME', 'LEVEL', 'BALANCE');
    printf('%4s | %20s | %5s | %7s' . PHP_EOL, '----', str_repeat('-', 20), '-----', '-------');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        printf('%4d | %20s | %5s | %7.2f' . PHP_EOL, $row['id'], $row['name'], $row['level'], $row['balance']);
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
} catch (Throwable $e) {
    error_log($e->getMessage());
}