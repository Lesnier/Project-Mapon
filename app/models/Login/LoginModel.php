<?php
require_once __DIR__ . '/../../../system/core/Model.php';

/**
 * Login Model
 */
class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get user by email
     */
    public function signIn($email)
    {
        $email = $this->db->real_escape_string($email);
        $sql = "SELECT email, password FROM usuarios WHERE email = '{$email}'";
        return $this->db->query($sql);
    }
}