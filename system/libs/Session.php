<?php

/**
 * Basic class for managing sessions
 */
class Session
{
    private $started = false;

    /**
     * @return bool
     */
    public function isStarted()
    {
        return $this->started;
    }


    /**
     * Initialize the session
     */
    public function init()
    {
            session_start();
    }

    /**
     * Add an item to the session
     * @param string $key the session array key
     * @param string $value the value for the session element
     */
    public function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Returns an element to the session
     * @param string $key the session array key
     * @return string the value of the session array if it has value
     */
    public function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Returns all the values of the session array
     * @return the full session array
     */
    public function getAll()
    {
        return $_SESSION;
    }

    /**
     * Remove an item from the session
     * @param string $key the session array key
     */
    public function remove($key)
    {
        if (!empty($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    /**
     * Close the session by removing the values
     */
    public function close()
    {
        session_unset();
        session_destroy();
        $this->started = false;
        return $this;
    }

    /**
     * Returns the status of the session
     * @return string the status of the session
     */
    public function getStatus()
    {
        return session_status();
    }

}