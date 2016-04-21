<?php 
// http://php.net/manual/en/function.odbc-connect.php

$connection_string = 'DRIVER={SQL Server};SERVER=koo2dzw5dy.database.windows.net;DATABASE=SenaQuiz'; 
$user = 'TSI'; 
$pass = 'SistemasInternet123'; 

$conexao = odbc_connect( $connection_string, $user, $pass ); 

if ($conexao) {
    echo "CONECTADO";
} else{
    die("SEM CONEXÃO!");
}
/* 
$user = 'TSI';
$pass = 'SistemasInternet123';
$server = 'koo2dzw5dy.database.windows.net';
$database = 'SenaQuiz';

$connection_string = "DRIVER={SQL Server};SERVER=$server;DATABASE=$database"; 
$conn = odbc_connect($connection_string,$user,$pass);

if ($conn) {
    echo "Connection established.";
} else{
    die("Connection could not be established.");
}

*/

?>