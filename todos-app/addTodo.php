<?php
include 'RedisSingleton.php';
//Connecting to Redis server on docker 

try {
    $redisInstance = RedisSingleton::getInstance();
    $redis = $redisInstance->getConnection();
    $txtTodo = $_POST["txtTodo"];
    if($txtTodo!=null) {
        $redis->lpush("todoList", htmlspecialchars($txtTodo));
    }

    $todoList = $redis->lrange("todoList", 0, 10);
    print_r($todoList);
}
catch(Exception  $exc){
    echo "Excepción: ".$exc->getMessage();
}
?>