<html>
    <head>
        <title>Imprimir</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                
            }

            body{
                margin-right: 30px;
            }
            table, td, th {    
                border: 1px solid #ddd;
                text-align: center;
                margin: auto;
            }

            table {
                border-collapse: collapse;
                border-radius: 10px;
                width: 80%;
                align-items: center;
                margin: auto ;
            }

            th, td {
                padding: 15px;
                background-color: #FFFFFF;
            }

            p {
            	margin-left: 60px;
            }
			.div-esquerda{
				float: left;
				margin-left: 60px;
			}

			.div-centro {
				float:  center;
			}

			.div-data {
				float: right;
				margin-right: 60px;
			}
           
        </style>


        <?php
        if(isset($_GET['id'])){
        print '<center>';
        print '<img src="img/topo.jpg" width="100%">';
        print '</center>';
    }else{
        print '<center>';
        print '<img src="img/topo2.jpg" width="100%">';
        print '</center>';
    }


        ?>
    </head>
    <body>


<?php
	header('Content-Type: text/html; charset=utf-8');
	include_once 'includes/Sessao.php';
	include_once 'classes/Registros.class.php';
	include_once 'classes/Aluno.class.php';

	
    

    $aluno = new Aluno;
    $ocorrencia = new Registro;

    // Verifica se o botao imprimir foi pressionado 
     if(isset($_POST['btn_imprimir']) ){


        if($_POST['opcaoimprimir']==0){
            $matricula = trim($_POST['txtmatricula']);
            $aluno->BuscaMatriculaAluno($matricula);
            $array = $ocorrencia->getIdOcorrencias($matricula);

            print '<h3><b><center>OcorrĂȘncias</b></h3></center><br>';


            print '<p><b>Nome do Aluno(a): </b>'.$aluno->getNome().'</p>';
            print '<p><b>Matricula: </b>'.$aluno->getMatricula().'</p>';
            print '<p><b>Turma: </b>'.$aluno->getTurma().'</p>';
        
            print '<br>';

            $resp = count($array);
            for($i=0;$i<$resp;$i++){
                $ocorrencia->ImprimirOcorrencia($matricula,$array[$i]);

                print '<p><b>IdentificaĂ§ĂŁo NÂș: '.$i.'</b></p>';
                print '<p><b>Data: '.$ocorrencia->getData().'</b><p>';
                print '<p><b>Efetuado por: </b>'.$ocorrencia->getUsuario().'</p>';
                print '<p><b>Relato: </b></p>';
                print '<div style="witdh="60%; right:10%;">';
                print '<p align="justify">'.$ocorrencia->getRelato().'</p>';
                print '</div>';
                print '<br><br>';
            }

            print '<h3><b><center>SuspensĂ”es</b></h3></center><br>';

                    $array = $ocorrencia->getIdSuspensoes($matricula);

                    $resp = count($array);
                    for($i=0;$i<$resp;$i++){
                        $ocorrencia->ImprimirSuspensao($matricula,$array[$i]);
                        $ano = preg_replace("/[^0-9]/", "", $aluno->getTurma());

                        print '<p><b>ColĂ©gios Univap- SP</b></p>';
                        print '<p><b>Ata n.Âș '.$ocorrencia->getAta().' - PĂĄg. n.Âș '.$ocorrencia->getPagina().'/'.$ocorrencia->ContaPaginas().'</b></p><br>';
                        print '<p align="justify"><b>'.$ocorrencia->getData().'</b>,ĂĄs '.$ocorrencia->getHorario().', no '.'ColĂ©gios Univap - Unidade '.utf8_encode($ocorrencia->TrocaLocalUnidade($ocorrencia->getUnidade())).', foi realizada a reuniĂŁo do <b>Conselho de Classe e SĂ©rie</b>. A reuniĂŁo foi Presidida pela Professora Mestra Ărica Reis Costa Carvalho, Diretora do ColĂ©gio e teve a participaĂ§ĂŁo dos Coordenadores Professor Mestre Carlos Roberto Serafim, Professora Especialista Ana Paula de Oliveira Fornaziero e Professora Kelly Cristina dos Santos. Na reuniĂŁo foi discutida a ocorrĂȘncia com o aluno <b>'.$aluno->getNome().'</b> matriculado no '.$ano.' ano, do Ensino MĂ©dio TĂ©cnico em '.utf8_encode($ocorrencia->getCurso()).', perĂ­odo Diurno</p><br>';
                        print '<h3><p><b>Relato:</b></p></h3><br>';

                        print '<p>'.utf8_encode($ocorrencia->getRelato()).'</p><br>';

                        print '<p align="justify">Devido ao(s) encaminhamento(s) citado(s) acima o(a) aluno(a) '.$aluno->getNome().' deverĂĄ ser suspenso pelo perĂ­odo de '.$ocorrencia->getPeriodo(). ' dias, que deverĂŁo ser cumpridos nos dias '.str_replace(".",",", $ocorrencia->getDiasCumpridos()).'. Nada mais a se tratar, deu-se por encerrada a reuniĂŁo ĂĄs '.$ocorrencia->getHorariofinal().'. E eu, '.$_SESSION['nomeUser'].', '.$_SESSION['cargo'].' deste ColĂ©gio, lavrei a presente ata que, apĂłs lida e aprovada serĂĄ assinada por mim e pelos demais participantes.</p>'; 
                    }

            print '<br><br><br>';
            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbspĂrica Reis Costa Carvalho, Prof. Ma.<br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDiretora do ColĂ©gio';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbspCarlos Roberto Serafim, Prof. Me.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCoordenador do Ensino TĂ©cnico';
            print '</div>';
            print '<br><br><br><br><br>';

            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbspAna Paula O. Fornaziero, Prof. Esp.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCoordenador do Ensino MĂ©dio';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKelly Cristina dos Santos, Prof.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrientadora Educacional';
            print '</div>';
            print '<br><br><br><br><br>';
            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResponsĂĄvel(a)<br>';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAluno(a)<br>';
            print '</div>';
        }

        
            if($_POST['opcaoimprimir']==1){
        
                    $matricula = trim($_POST['txtmatricula']);
                    $aluno->BuscaMatriculaAluno($matricula);
                    $array = $ocorrencia->getIdOcorrencias($matricula);


                    print '<p><b>Nome do Aluno(a): </b>'.$aluno->getNome().'</p>';
                    print '<p><b>Matricula: </b>'.$aluno->getMatricula().'</p>';
                    print '<p><b>Turma: </b>'.$aluno->getTurma().'</p>';
        
                    print '<br>';

                    $resp = count($array);
                    for($i=0;$i<$resp;$i++){
                            $ocorrencia->ImprimirOcorrencia($matricula,$array[$i]);

                            print '<p><b>IdentificaĂ§ĂŁo NÂș: '.$i.'</b></p>';
                            print '<p><b>Data: '.$ocorrencia->getData().'</b><p>';
                            print '<p><b>Efetuado por: </b>'.$ocorrencia->getUsuario().'</p>';
                            print '<p><b>Relato: </b></p>';
                            print '<div style="witdh="60%; right:10%;">';
                            print '<p align="justify">'.$ocorrencia->getRelato().'</p>';
                            print '</div>';
                            print '<br><br>';
                    }


                                print '<br><br><br>';
                                print '<div class="div-centro">';
                                print '<div class="div-esquerda">';
                                print '________________________________<br>';
                                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResponsĂĄvel(a)<br>';
                                print '</div>';
                                print '&nbsp';
                                print '<div class="div-esquerda">';
                                print '_________________________________<br>';
                                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAluno(a)<br>';
                                print '</div>';
                                print '<br><br><br><br><br>';
                                print '<div class="div-centro">';
                                print '<div class="div-esquerda">';
                                print '________________________________<br>';
                                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrientaĂ§ĂŁo/CoordenaĂ§ĂŁo/DireĂ§ĂŁo<br>';
                                print '</div>';

                                print '&nbsp';

                                print '<div class="div-esquerda">';
                                print '_________________________________<br>';
                                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProfessor(a)<br>';
                                print '</div>';
                                print '</div>';

            }

             if($_POST['opcaoimprimir']==2){
                $matricula = trim($_POST['txtmatricula']);
                $aluno->BuscaMatriculaAluno($matricula);
                
                $array = $ocorrencia->getIdSuspensoes($matricula);

                $resp = count($array);
                for($i=0;$i<$resp;$i++){

                    $ocorrencia->ImprimirSuspensao($matricula,$array[$i]);
                    $ano = preg_replace("/[^0-9]/", "", $aluno->getTurma());

                    print '<p><b>ColĂ©gios Univap- SP</b></p>';
                    print '<p><b>Ata n.Âș '.$ocorrencia->getAta().' - PĂĄg. n.Âș '.$ocorrencia->getPagina().'/'.$ocorrencia->ContaPaginas().'</b></p><br>';
                    print '<p align="justify"><b>'.$ocorrencia->getData().'</b>,ĂĄs '.$ocorrencia->getHorario().', no '.'ColĂ©gios Univap - Unidade '.utf8_encode($ocorrencia->TrocaLocalUnidade($ocorrencia->getUnidade())).', foi realizada a reuniĂŁo do <b>Conselho de Classe e SĂ©rie</b>. A reuniĂŁo foi Presidida pela Professora Mestra Ărica Reis Costa Carvalho, Diretora do ColĂ©gio e teve a participaĂ§ĂŁo dos Coordenadores Professor Mestre Carlos Roberto Serafim, Professora Especialista Ana Paula de Oliveira Fornaziero e Professora Kelly Cristina dos Santos. Na reuniĂŁo foi discutida a ocorrĂȘncia com o aluno <b>'.$aluno->getNome().'</b> matriculado no '.$ano.' ano, do Ensino MĂ©dio TĂ©cnico em '.utf8_encode($ocorrencia->getCurso()).', perĂ­odo Diurno</p><br>';

                    print '<h3><p><b>Relato:</b></p></h3><br>';

                    print '<p>'.utf8_encode($ocorrencia->getRelato()).'</p><br>';

                    print '<p align="justify">Devido ao(s) encaminhamento(s) citado(s) acima o(a) aluno(a) '.$aluno->getNome().' deverĂĄ ser suspenso pelo perĂ­odo de '.$ocorrencia->getPeriodo(). ' dias, que deverĂŁo ser cumpridos nos dias '.str_replace(".",",", $ocorrencia->getDiasCumpridos()).'. Nada mais a se tratar, deu-se por encerrada a reuniĂŁo ĂĄs '.$ocorrencia->getHorariofinal().'. E eu, '.$_SESSION['nomeUser'].', '.$_SESSION['cargo'].' deste ColĂ©gio, lavrei a presente ata que, apĂłs lida e aprovada serĂĄ assinada por mim e pelos demais participantes.</p>';
                    print '<br><br>';
                    
            }

            print '<br><br><br>';
            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbspĂrica Reis Costa Carvalho, Prof. Ma.<br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDiretora do ColĂ©gio';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbspCarlos Roberto Serafim, Prof. Me.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCoordenador do Ensino TĂ©cnico';
            print '</div>';
            print '<br><br><br><br><br>';

            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbspAna Paula O. Fornaziero, Prof. Esp.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCoordenador do Ensino MĂ©dio';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKelly Cristina dos Santos, Prof.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrientadora Educacional';
            print '</div>';
             print '<br><br><br><br><br>';
                print '<div class="div-centro">';
                print '<div class="div-esquerda">';
                print '________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResponsĂĄvel(a)<br>';
                print '</div>';
                print '&nbsp';
                print '<div class="div-esquerda">';
                print '_________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAluno(a)<br>';
                print '</div>';


        }


        }else{
            header("Location:Ocorrencia.php");
        }

      if(isset($_GET['id'])){
         $matricula = $_GET['matricula'];
         $id = $_GET['id'];
         $aluno->BuscaMatriculaAluno($matricula);
         $ocorrencia->ImprimirOcorrencia($matricula,$id);

         print '<p><b>Nome do Aluno(a): </b>'.$aluno->getNome().'</p>';
         print '<p><b>Matricula: </b>'.$aluno->getMatricula().'</p>';
         print '<p><b>Turma: </b>'.$aluno->getTurma().'</p>';
                print '<p><b>Efetuado por: </b>'.$ocorrencia->getUsuario().'</p>';
                print '<br>';

                print '<div class="div-data">';
                print '<b>Data: '.$ocorrencia->getData().'</b>';
                print '</div>';
                print '<br>';

                print '<p><b>Relato: </b></p>';
                print '<div style="witdh="60%; right:10%;">';
                print '<p align="justify">'.$ocorrencia->getRelato().'</p>';
                print '</div>';

                print '<br><br><br>';
                print '<div class="div-centro">';
                print '<div class="div-esquerda">';
                print '________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResponsĂĄvel(a)<br>';
                print '</div>';
                print '&nbsp';
                print '<div class="div-esquerda">';
                print '_________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAluno(a)<br>';
                print '</div>';
                print '<br><br><br><br><br>';
                print '<div class="div-centro">';
                print '<div class="div-esquerda">';
                print '________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrientaĂ§ĂŁo/CoordenaĂ§ĂŁo/DireĂ§ĂŁo<br>';
                print '</div>';

                print '&nbsp';

                print '<div class="div-esquerda">';
                print '_________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProfessor(a)<br>';
                print '</div>';
                print '</div>';
      }
      
      if(isset($_GET['idSuspensao'])){

            $matricula = $_GET['matricula'];
            $aluno->BuscaMatriculaAluno($matricula);
            $id = $_GET['idSuspensao'];
            $ocorrencia->ImprimirSuspensao($matricula,$id);

            $ano = preg_replace("/[^0-9]/", "", $aluno->getTurma());



            print '<p><b>ColĂ©gios Univap- SP</b></p>';
            print '<p><b>Ata n.Âș '.$ocorrencia->getAta().' - PĂĄg. n.Âș '.$ocorrencia->getPagina().'/'.$ocorrencia->ContaPaginas().'</b></p><br>';
            print '<p align="justify"><b>'.$ocorrencia->getData().'</b>,ĂĄs '.$ocorrencia->getHorario().', no '.'ColĂ©gios Univap - Unidade '.utf8_encode($ocorrencia->TrocaLocalUnidade($ocorrencia->getUnidade())).', foi realizada a reuniĂŁo do <b>Conselho de Classe e SĂ©rie</b>. A reuniĂŁo foi Presidida pela Professora Mestra Ărica Reis Costa Carvalho, Diretora do ColĂ©gio e teve a participaĂ§ĂŁo dos Coordenadores Professor Mestre Carlos Roberto Serafim, Professora Especialista Ana Paula de Oliveira Fornaziero e Professora Kelly Cristina dos Santos. Na reuniĂŁo foi discutida a ocorrĂȘncia com o aluno <b>'.$aluno->getNome().'</b> matriculado no '.$ano.' ano, do Ensino MĂ©dio TĂ©cnico em '.utf8_encode($ocorrencia->getCurso()).', perĂ­odo Diurno</p><br>';

            print '<h3><p><b>Relato:</b></p></h3><br>';

            print '<p>'.utf8_encode($ocorrencia->getRelato()).'</p><br>';

            print '<p align="justify">Devido ao(s) encaminhamento(s) citado(s) acima o(a) aluno(a) '.$aluno->getNome().' deverĂĄ ser suspenso pelo perĂ­odo de '.$ocorrencia->getPeriodo(). ' dias, que deverĂŁo ser cumpridos nos dias '.str_replace(".",",", $ocorrencia->getDiasCumpridos()).'. Nada mais a se tratar, deu-se por encerrada a reuniĂŁo ĂĄs '.$ocorrencia->getHorariofinal().'. E eu, '.$_SESSION['nomeUser'].', '.$_SESSION['cargo'].' deste ColĂ©gio, lavrei a presente ata que, apĂłs lida e aprovada serĂĄ assinada por mim e pelos demais participantes.</p>';

            print '<br><br><br>';
            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbspĂrica Reis Costa Carvalho, Prof. Ma.<br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDiretora do ColĂ©gio';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbspCarlos Roberto Serafim, Prof. Me.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCoordenador do Ensino TĂ©cnico';
            print '</div>';
            print '<br><br><br><br><br>';

            print '<div class="div-centro">';
            print '<div class="div-esquerda">';
            print '________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbspAna Paula O. Fornaziero, Prof. Esp.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCoordenador do Ensino MĂ©dio';
            print '</div>';
            print '&nbsp';
            print '<div class="div-esquerda">';
            print '_________________________________<br>';
            print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKelly Cristina dos Santos, Prof.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrientadora Educacional';
            print '</div>';
             print '<br><br><br><br><br>';
                print '<div class="div-centro">';
                print '<div class="div-esquerda">';
                print '________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResponsĂĄvel(a)<br>';
                print '</div>';
                print '&nbsp';
                print '<div class="div-esquerda">';
                print '_________________________________<br>';
                print '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAluno(a)<br>';
                print '</div>';
      }
            
        

	echo "<script>window.print();setTimeout(function() { window.close(); }, 200);</script>";
        

	
?>
    </body>
</html>