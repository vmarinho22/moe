<?php
// Dados de confirmação


require_once 'includes/Sessao.php'; 

/**
 * 0= neutro
 * 1 = Cadastros
 * 2 = Alterações 
 * 3 = Exclusao
 * 4 = Erro
 * 5 = Usuario Invalido
 * 6 = Tempo de usuario expirado
 * 7 = Já registrado
 * 8 = Sem alteração
 * 9 = Aluno não selecionado
 */
	

if($_SESSION['confirmacao']==1){ echo '<font color="blue"><b>Cadastrado com sucesso</b></font><br>';};
if($_SESSION['confirmacao']==2){ echo '<font color="blue"><b>Alterado com sucesso</b></font><br>';};
if($_SESSION['confirmacao']==3){ echo '<font color="blue"><b>Excluido com sucesso</b></font><br>';};

if($_SESSION['confirmacao']==4){ echo '<font color="red"><b>Erro na operação</b></font><br>';};
if($_SESSION['confirmacao']==5){ echo '<font color="red"><b>Usuário Inválido</b></font><br>';};
if($_SESSION['confirmacao']==6){ echo '<font color="red"><b>Tempo de usuario expirado</b></font><br>';};
if($_SESSION['confirmacao']==7){ echo '<font color="red"><b>Login de usuário já cadastrado</b></font><br>';};
if($_SESSION['confirmacao']==8){ echo '<font color="red"><b>Sem alteração ou Campos iguais</b></font><br>';};
if($_SESSION['confirmacao']==9){ echo '<font color="red"><b>Aluno não selecionado</b></font><br>';};


$_SESSION['confirmacao']=0;

?>