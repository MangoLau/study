<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/16
 * Time: 18:54
 */

/*require_once 'HTML/QuickForm.php';

$form = new HTML_QuickForm('login', 'post');
$form->addElement('text', 'username', 'User name:', 'size="10"');
$form->addRule('username', 'Please enter your user name!', 'required', null, 'client');
$form->addElement('password', 'password', 'Password:');
$form->addElement('submit', 'submit', 'Log in');
$form->display();*/


require_once 'HTML/QuickForm.php';

// Instantiate the HTML_QuickForm object
$form = new HTML_QuickForm('firstForm');

// Set defaults for the form elements
$form->setDefaults(array(
    'name' => 'Joe User'
));

// Add some elements to the form
$form->addElement('header', null, 'QuickForm tutorial example');
$form->addElement('text', 'name', 'Enter your name:', array('size' => 50, 'maxlength' => 255));
$form->addElement('submit', null, 'Send');

// Define filters and validation rules
$form->applyFilter('name', 'trim');
$form->addRule('name', 'Please enter your name', 'required', null, 'client');

// Try to validate a form
if ($form->validate()) {
    echo '<h1>Hello, ' . htmlspecialchars($form->exportValue('name')) . '!</h1>';
    exit;
}

// Output the form
$form->display();