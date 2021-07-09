<?php

use PHPUnit\Framework\TestCase;


require_once __DIR__ . '/../../app/controllers/Main/MainController.php';

class MainControllerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetUnitsRoutesData()
    {
        $_SESSION['email'] = 'test@dev.com';
        $main = new MainController();
        $routes = $main->getUnitsRoutesData();
        $arrayRoutes = json_decode($routes, true);
        $this->assertArrayHasKey('data', $arrayRoutes);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetUnitsLocation()
    {
        $_SESSION['email'] = 'test@dev.com';
        $main = new MainController();
        $routes = $main->getUnitsLocation();
        $arrayRoutes = json_decode($routes, true);
        $this->assertArrayHasKey('data', $arrayRoutes);
    }


    /**
     * @runInSeparateProcess
     */
    public function testGetDataByRange()
    {
        $_SESSION['email'] = 'test@dev.com';
        $main = new MainController();
        $paramRequest = [
            'date-from' => '2020-02-13T12:17:21Z',
            'date-to' => '2020-02-27T12:17:21Z'
        ];
        $routes = $main->getDataByRange($paramRequest);
        $this->assertEquals($_SESSION['to'], $paramRequest['date-to']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testLoguot()
    {
        $_SESSION['email'] = 'test@dev.com';
        $main = new MainController();
        $main->logout();
        $sessionStatus = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        $this->assertEquals($sessionStatus, false);
    }


}
