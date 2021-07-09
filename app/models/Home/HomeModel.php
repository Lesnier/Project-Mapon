<?php
//defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */

require __DIR__ . "/../../../system/core/Model.php";

class HomeModel extends Model
{
  /**
  * Inicia conexión DB
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Obtiene el usuario de la DB por ID
  */
  public function getUser($id)
  {
    return $this->db->query("SELECT * FROM `usuario` WHERE `id_dev` = $id")->fetch_array(MYSQLI_ASSOC);
  }

}