<?php
//defined('BASEPATH') or exit('No se permite acceso directo');

require_once __DIR__ .  '/../../models/Login/LoginModel.php';
require_once __DIR__  . '/../../../system/libs/Session.php';
require_once __DIR__  . '/../../../system/core/Controller.php';

/**
 * Main controller
 */
class MainController extends Controller
{
    private $session;
    private $client;
    private $apiKey = '5333a9720180356462a0d9615a38f6dfff4581aa';


    public function __construct()
    {
        $this->session = new Session();
            $this->session->init();
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://mapon.com/api/v1/',
            'headers' => [
                'Accept' => 'application/x-www-form-urlencoded'
            ]]);
    }

    public function exec()
{
    $dateFrom = $this->session->get('from');
    $dateTo = $this->session->get('to');
    $routeData = $this->getUnitsRoutesData($dateFrom, $dateTo);
    $unitsData = $this->getUnitsLocation();
    $params = array('email' => $this->session->get('email'), 'unitsRoutesData' => $routeData, 'unitsData' => $unitsData, 'dateFrom' => \Carbon\Carbon::parse($dateFrom)->format('D, d-M-Y'), 'dateTo' => \Carbon\Carbon::parse($dateTo)->format('D, d-M-Y'));
    $this->render(__CLASS__, $params);
}

    public function logout()
    {
        $this->session->close();
        header('location: /mapon-project/login');
    }

    public function getUnitsRoutesData($dateFrom = '2020-02-13T12:17:21Z', $dateTo = '2020-02-27T12:17:21Z')
    {
        $response = $this->client->get('route/list.json?key=5333a9720180356462a0d9615a38f6dfff4581aa&from=' . $dateFrom . '&till=' . $dateTo . '&include[]=decoded_route');
        $routesData = $response->getBody()->getContents();
        return $routesData;
    }

    public function getUnitsLocation()
    {
        $response = $this->client->get('unit/list.json?key=5333a9720180356462a0d9615a38f6dfff4581aa');
        $units = $response->getBody()->getContents();
        return $units;
    }

    public function getDataByRange($request_params)
    {
        $dateFrom = \Carbon\Carbon::createFromDate($request_params['date-from'])->toIso8601ZuluString();
        $dateTo = \Carbon\Carbon::createFromDate($request_params['date-to'])->toIso8601ZuluString();

        $this->session->add('from', $dateFrom);
        $this->session->add('to', $dateTo);

        header('location: /mapon-project/main');
    }


}
