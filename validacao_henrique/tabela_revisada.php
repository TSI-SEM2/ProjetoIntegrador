<!DOCTYPE html>
<html>
<?php

$query = array
  (
  array("cod","cod2","cod3",111,222),
  array("nome","nome2","nome3",1111,2222),
  array("email","email2","email3",1111,2222),
  array("id","id2","id3",1111,2222),
  array("tipo","tipo2","tipo3",1111,2222)
  );  
echo"
    <table>
    <thead>
    <th>codProfessor</th>
    <th>nome</th>
    <th>email</th>
    <th>idsenac</th>
    <th>tipo</th>

</thead>
<tbody>
";
$tamanhoArray=count($query);
for($i=0;$i<=$tamanhoArray;$i++){
   echo" <tr> 
  
   <td> {$query [$i][0]}</td> 
   
   </tr>";
}
echo"
    </tbody>
    </table>";

?>
</html>
