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
    $rows = "";
    $id = 0;
    foreach ($todoList as $todo) 
    { 
        $rows .= "<tr class=\"todo:td\"><td class=\"check\"><input type=\"checkbox\" name=\"todo_".$id."\" id=\"todo_".$id."\"></td><td class=\"todo\">".$todo."</td></tr>\n";
        $id += 1;
    } 
    //print_r($todoList);
    echo $rows;
}
catch(Exception  $exc) {
    echo "<tr><td>Excepción</td>"."<td>".$exc->getMessage()."</td></tr>";
}
?>