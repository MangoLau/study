<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 14:16
 */

abstract class User
{
    private $name = null;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function hasReadPermission()
    {
        return true;
    }

    public function hasModifyPermission()
    {
        return false;
    }

    public function hasDeletePermission()
    {
        return false;
    }

    public function wantsFlashInterface()
    {
        return true;
    }
}

class GuestUser extends User
{

}

class CustomerUser extends User
{
    function hasModifyPermission()
    {
        return true;
    }
}

class AdminUser extends User
{
    public function hasModifyPermission()
    {
        return true;
    }

    public function hasDeletePermission()
    {
        return true;
    }

    public function wantsFlashInterface()
    {
        return false;
    }
}

class UserFactory
{
    private static $users = [
        'Andi' => 'admin',
        'Stig' => 'guest',
        'Derick' => 'customer',
    ];

    public static function create($name)
    {
        if (!isset(self::$users[$name])) {
            echo 'Error: User not exists', PHP_EOL;
        }
        switch (self::$users[$name]) {
            case 'guest' :
                return new GuestUser($name);
            case 'customer' :
                return new CustomerUser($name);
            case 'admin' :
                return new AdminUser($name);
            default :
                echo 'Error: User not exists', PHP_EOL;
                break;
        }
    }
}

function boolToStr($b)
{
    if ($b == true) {
        return "Yes\n";
    } else {
        return "No\n";
    }
}

function displayPermissions(User $obj)
{
    echo $obj->getName(), "'s permission:\n";
    echo "Read:", boolToStr($obj->hasReadPermission());
    echo "Modify:", boolToStr($obj->hasModifyPermission());
    echo "Delete:", boolToStr($obj->hasDeletePermission());
}

function displayRequirements(User $obj)
{
    if ($obj->wantsFlashInterface()) {
        echo $obj->getName(), " requires Flash\n";
    }
}

$logins = ['Andi', 'Stig', 'Derick'];

foreach ($logins as $login) {
    displayPermissions(UserFactory::create($login));
    displayRequirements(UserFactory::create($login));
}

