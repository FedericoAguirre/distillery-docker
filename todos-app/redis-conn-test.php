<?php 
    include 'RedisSingleton.php';
    //Connecting to Redis server on docker 

    try {
        $redisInstance = RedisSingleton::getInstance();
        $redis = $redisInstance->getConnection();
        echo "Conexión exitosa\n";
        echo "Servidor corriendo: ".$redis->ping();
        echo "\nLlave \"test\" en Redis: ".$redis->get("test");
    }
    catch(Exception  $exc){
        echo "Excepción: ".$exc->getMessage();
    }
?>