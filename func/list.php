<?php

include "../config/conecta.php";

echo "TABELA PROFESSOR CONTEM<br>";

echo "<br>";

$query = "SELECT * FROM Professor";

if (!$res = odbc_exec($conexao,$query)) { /* error */}
    while($row = odbc_fetch_array($res)) {
      echo "<br>";
      print_r($row);
      echo "<br>";
    }


echo "<br> <br> TABELAS DISPONÍVEIS NO BANCO: <br>";

$result = odbc_tables($conexao);

$tables = array();
while (odbc_fetch_row($result)){
 if(odbc_result($result,"TABLE_TYPE")=="TABLE")
   echo"<br>".odbc_result($result,"TABLE_NAME");
}
?>