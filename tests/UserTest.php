<?php
#require '/var/www/vimkid/vendor/autoload.php';
require_once('/var/www/vimkid/Users.php');
class UserTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testHello()
    {
        $userModel = new Users() ;
        $this->assertEquals($userModel->hello(),'hello');

    }
}
?>
