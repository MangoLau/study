<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/27/16
 * Time: 10:51 PM
 */

include_once 'Executive.php';
class CEO extends Executive {

    function __construct($name) {
        Employee::__construct($name);
        Executive::__construct();
        echo '<p>CEO object created!</p>';
    }
}