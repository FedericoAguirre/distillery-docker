<?php 
   //Connecting to Redis server on docker 

   try {
       $redis = new Redis();
       $redis->connect('redis', 6379);
       echo "Conexión exitosa\n";
       echo "Servidor corriendo: ".$redis->ping();
       echo "\nLlave \"test\" en Redis: ".$redis->get("test");
   }
   catch(Exception  $exc){
       echo "Excepción: ".$exc->getMessage();
   }
?>