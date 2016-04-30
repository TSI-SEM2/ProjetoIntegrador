<?php

include "../config/conecta.php";

echo "<p><h2/>TABELA PROFESSOR CONTEM</h2></p>";

$query = "SELECT * FROM Professor";

if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
  echo"<table class='table table-bordered table-striped table-hover'>
  <thead>
  <th>Código De Acesso</th>
  <th>Nome Do Usuário</th>
  <th>Email</th>
  <th>Id Senac</th>
  <th>Tipo De Acesso</th>
  </thead>";
  
  while( $row = odbc_fetch_array($res) ) {
    echo "<tr>";
    echo "<td>$row[codProfessor]</td>";  
    echo "<td>$row[nome]</td>"; 
    echo "<td>$row[email]</td>";      
    echo "<td>$row[idSenac]</td>"; 
    echo "<td>$row[tipo]</td>"; 
    echo "</tr>"; 
    } 
  
    echo "</table>"; 

}
  
?>