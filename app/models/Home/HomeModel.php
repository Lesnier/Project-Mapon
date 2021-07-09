<?php

/**
 * Home Model
 */

require __DIR__ . "/../../../system/core/Model.php";

class HomeModel extends Model
{
    /**
     * DB connection
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get user from database by ID
     */
    public function getUser($id)
    {
        return $this->db->query("SELECT * FROM `usuario` WHERE `id_dev` = $id")->fetch_array(MYSQLI_ASSOC);
    }

}