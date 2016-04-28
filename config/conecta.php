<?php
/* http://php.net/manual/en/function.odbc-connect.php */
$connection_string = 'DRIVER={SQL Server};SERVER=koo2dzw5dy.database.windows.net;DATABASE=SenaQuiz'; 
$user = 'TSI'; 
$pass = 'SistemasInternet123'; 

$conexao = odbc_connect( $connection_string, $user, $pass ); 

if ($conexao) {
    echo "<h2 hidden>CONECTADO</h2>";
} else{
    die("<h2>SEM CONEXÃO!<h2>");
}

?>