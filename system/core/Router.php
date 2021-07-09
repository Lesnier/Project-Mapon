<?php

/**
 * URI Identification
 */
class Router
{
  /**
   * @var string
   */
  public $uri;

  /**
   * @var string
   */
  public $controller;

  /**
   * @var string
   */
  public $method;

  /**
   * @var string
   */
  public $param;

  /**
   * Initialize attributes
   */
  public function __construct()
  {
    $this->setUri();
    $this->setController();
    $this->setMethod();
    $this->setParam();
  }

  /**
   * Assign the full uri
   */
  public function setUri()
  {
    $this->uri = explode('/', URI);
  }

  /**
   * Assign the controller name
   */
  public function setController()
  {
    $this->controller = $this->uri[2] === '' ? DEFAULT_CONTROLLER : $this->uri[2];
  }

  /**
   * Assign the name of the method
   */
  public function setMethod()
  {
    $this->method = ! empty($this->uri[3]) ? $this->uri[3] : 'exec';
  }

  /**
   * Assign the value of the parameter if it exists according to the request method
   */
  public function setParam()
  {
    if(REQUEST_METHOD === 'POST')
      $this->param = $_POST;
    else if (REQUEST_METHOD === 'GET')
      $this->param = ! empty($this->uri[4]) ? $this->uri[4] : '';
  }

  /**
   * @return $uri
   */
  public function getUri()
  {
    return $this->uri;
  }

  /**
   * @return $controller
   */
  public function getController()
  {
    return $this->controller;
  }

  /**
   * @return $method
   */
  public function getMethod()
  {
    return $this->method;
  }

  /**
   * @return $param
   */
  public function getParam()
  {
    return $this->param;
  }
}