<?php
class RedisSingleton {
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new Redis();
        $this->conn->pconnect('redis', 6379);
    }
    
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new RedisSingleton();
        }
        return self::$instance;
    }
    
    public function getConnection()
    {
        return $this->conn;
    }
}
?>