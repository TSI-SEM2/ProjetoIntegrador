function validacao ();{
    //nome valida
    if(document.dados.tx_nome.value=="" || document.dados.tx_nome.value.length < 8){
        alert( "Preencha campo NOME corretamente!" );
        document.dados.tx_nome.focus();
        return false;
    } //fechamento do IF 
  
 
    //email valida
    if( document.dados.tx_email.value=="" || document.dados.tx_email.value.indexOf('@')==-1 || document.dados.tx_email.value.indexOf('.')==-1 ){
                alert( "Preencha campo E-MAIL corretamente!" );
                 document.dados.tx_email.focus();
                 return false;
                 
                 
                 
}
                 return true;
                 document.cadastro.submit();

}







