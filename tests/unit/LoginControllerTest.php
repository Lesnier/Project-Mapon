<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../app/controllers/Login/LoginController.php';

class LoginControllerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testSingin()
    {
        $emailTest = 'test@dev.com';
        $_SERVER['REQUEST_URI'] = '/project-mapon/login/singin';
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $requestParam = [
            'email' => $emailTest,
            'password' => '123456'
        ];
        $main = new LoginController();
         $main->signin($requestParam);
        $this->assertEquals($_SESSION['email'], $emailTest);
    }


}
