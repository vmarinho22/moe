
<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<!-- Menu expansivel -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand"><img src="img/icone.png" align="left" width="20px" />&nbspMonitoramento de Ocorrências</a>
				</div> <!-- fim do menu expansivel -->

				<!-- inicio do menu -->
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="Aluno.php">Home(Busca Aluno)</a></li>
						<!-- OPCÃO OCORRÊNCIAS -->
						<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="Ocorrencia.php">Ver Advertências</a></li>'; } ?>
						<!-- OPÇÃO PROFESSOR -->
						<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=3) { print '<li><a href="Professor.php">Professor</a></li>'; } ?>
						<!-- MENU EXPANSIVEL -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<!-- OPÇÃO CADASTRO DE OCORRÊNCIA -->
								<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="CadastroOcorrencia.php">Cadastrar Ocorrência</a></li>'; } ?>
								<!-- OPÇÃO SUSPENSÃO -->
								<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="CadastraSuspensao.php">Cadastrar Suspensão</a></li>'; } ?>
								<!-- OPÇÃO FALTAS -->
								<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=4) { print '<li><a href="Falta.php">Gerenciamento de faltas</a></li>'; } ?>
								<!-- OPÇÃO GRÁFICOS -->
								<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="GerarGraficos.php">Gerar Gráficos</a></li>'; } ?>
								<!-- SEPARADOR MENU -->
									<li role="separator" class="divider"></li>
									<li class="dropdown-header">Outros</li>
										<!-- OPÇÃO CADASTRO USUARIO -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=1) { print '<li><a href="CadasUsuario.php">Cadastrar Usuarios</a></li>'; } ?>
										<!-- OPÇÃO CADASTRO ALUNO -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=3) { print '<li><a href="CadastraAlunos.php">Cadastrar Alunos</a></li>'; } ?>
										<!-- OPÇÃO INCLUIR ALUNO -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="IncluiAlunos.php">Incluir Alunos</a></li>'; } ?>
										<!-- OPÇÃO EDITA PAGINAS -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="EditaPaginas.php">Editar Páginas do livro</a></li>'; } ?>
										<!-- OPÇÃO Categorias de ocorrências -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="CategoriasOcorrencia.php">Categorias de Ocorrências</a></li>'; } ?>
										<!-- OPÇÃO Gerenciar  unidades -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="Unidades.php">Gerenciar Unidades</a></li>'; } ?>
										<!-- OPÇÃO VER USUARIOS -->
										<?php require_once 'includes/Sessao.php'; if($_SESSION['nivel']<=2) { print '<li><a href="VerUsuarios.php">Ver Usuários</a></li>'; } ?>
							</ul>
						</li>
					</ul>
							<!-- Parte do usuario -->
					<ul class="nav navbar-nav navbar-right">
						<!-- OPÇÃO ENTRAR NO PERFIL E VERIFICADOR DE AUTENTICIDADE -->
        				<li><a href="Perfil.php"><img src="img/avatar.png" align="left" width="20px" />&nbsp<?php  include 'loginUsuario.php'; ?></a></li>
        				<li><a href="Sair.php">Sair</a></li>
      				</ul>

				</div><!-- fim do menu -->
			</div>
		</nav>

		
<div style="background-color:#3a3a3a ; color: white; width: 100¨%; margin-top:50px;">
             <center><?php include 'DataAtual.php'; ?></center>
</div>