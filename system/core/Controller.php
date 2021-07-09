<?php
//defined('BASEPATH') or exit('No se permite acceso directo');
/**
* Controlador base
*/

require_once __DIR__ . '/View.php';
abstract class Controller
{
  /**
   * @var object
   */
  private $view;

  /**
   * Inicializa la vista
   */
  public function render($controller_name = '', $params = array())
  {
    $this->view = new View($controller_name, $params);
  }

  /**
   * Metodo estándar
   */
  abstract public function exec();
}