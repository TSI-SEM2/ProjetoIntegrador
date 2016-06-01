<?php 
function RetornoMSG ($retorno, $cod) {	//Parametros retornados sendo: Retorno= 1,2 3 ... e o Cod do item referenciado no banco.	
	switch ($retorno){
		case 1: //  INCLUSÃO NO BANCO OK .
			$msg = '<p class="bg-success">Registro inserido com sucesso!<p>';
			break;
		case 2: //  SUCESSO 
			$msg = '<p class="bg-success">A ação solicitada para o código  <b>'.$cod.'</b>  foi realizada com sucesso.</p>';
			break;
		case 3: // ALERTA SOBRE DEPENDENCIAS NO SISTEMA PARA CONCLUIR A OPERAÇÃO.
			$msg = '<p class="bg-warning">Não foi possível realizar a ação solicitada para o Código = <b>'.$cod.'</b> .  Já em uso no sistema.</p>';
			break;
		case 4: // MSG REF AO IMPEDITIVO DE ACESSO A CRIAÇÃO / ALTERAÇÃO / DELEÇÃO
			$msg = '<p class="bg-danger">Você não possui o perfil necessário para acessar essa área!</p>';
			break;
		case 5: // ESPECIAL PARA TIPO QUESTÃO EVITANDO CRIAÇÃO DE NOVO TIPO COM UM CÓDIGO QUE JÁ EXISTE
			$msg = '<p class="bg-danger">Falha ao Criar.  O código = <b>'.$cod.'</b> já existe como um Tipo de Questão. </p>';
			break;
	}
	echo $msg; //FIM DA FUNÇÃO.
}

?>