<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/27 0027
 * Time: 16:24
 */

class book {
    private $title;
    private $isbn;
    private $copies;

    function __construct($isbn) {
        $this->setIsbn($isbn);
        $this->getTitle();
        $this->getNumberCopies();
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function getTitle() {
        $this->title = 'Easy PHP Websites with the Zend Framework';
        echo 'Title: ',$this->title,'<br />';
    }

    public function getNumberCopies() {
        $this->copies = '5';
        echo 'Number copies available: ',$this->copies,'<br />';
    }

    function __destruct() {
        echo '<p>Book class instance destroyed.</p>';
    }
}