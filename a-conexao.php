

<?php
$host = "127.0.0.1";
$db_name = "crud";
$porta = "3306";
$conexao = new PDO('mysql:host='.$host.'; 
            port='.$porta.'; 
            dbname='.$db_name,"root","senha"); 

?>