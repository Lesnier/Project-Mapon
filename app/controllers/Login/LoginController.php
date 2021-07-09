<?php

require_once __DIR__ . '/../../models/Login/LoginModel.php';
//require_once LIBS_ROUTE . 'Session.php';
require_once __DIR__ . '/../../../system/libs/Session.php';
require_once __DIR__ . '/../../../system/core/Controller.php';

/**
 * Login controller
 */
class LoginController extends Controller
{
    private $model;

    private $session;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->session = new Session();
    }

    public function exec()
    {
        $this->render(__CLASS__);
    }

    public function signin($request_params)
    {
        if ($this->verify($request_params))
            return $this->renderErrorMessage('El email y password son obligatorios');

        $result = $this->model->signIn($request_params['email']);

        if (!$result->num_rows)
            return $this->renderErrorMessage("El email {$request_params['email']} no fue encontrado");

        $result = $result->fetch_object();

        if (!password_verify($request_params['password'], $result->password))
            return $this->renderErrorMessage('La contraseña es incorrecta');

        $this->session->init();
        $this->session->add('email', $result->email);
        $this->session->add('from', '2020-02-13T12:17:21Z');
        $this->session->add('to', '2020-02-27T12:17:21Z');
        header('location: /mapon-project/main');
    }

    private function verify($request_params)
    {
        return empty($request_params['email']) OR empty($request_params['password']);
    }

    private function renderErrorMessage($message)
    {
        $params = array('error_message' => $message);
        $this->render(__CLASS__, $params);
    }

}