<?php
//defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mapon-project/app/models/Home/HomeModel.php';
/**
 * Home controller
 */
class HomeController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;

  /**
   * Init values
   */
  public function __construct()
  {
    $this->model = new HomeModel();
    $this->nombre = 'Mapon';
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    $this->show();
  }

  /**
  * Método de ejemplo
  */
  public function show()
  {
    $params = array('nombre' => $this->nombre);
    $this->render(__CLASS__, $params); 
  }

  /**
  * Método de ejemplo con model. Obtiene un usuario segun ID
  */
  public function usuario($param)
  {
    $res = $this->model->getUser($param);
    $this->nombre = $res['usuario_dev'];
    $this->show();
  }


}