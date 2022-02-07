<!DOCTYPE html>
<html>
<head>
    <title>Aluno</title>
    <!--<link rel="stylesheet" type="text/css" href="Style/style.css">-->
        <style>
            table, td, th {    
                border: 1px solid #ddd;
                margin: auto;
            }

            table {
                border-collapse: collapse;
                border-radius: 10px;
                width: 100%;
                margin: auto;
            }

            th, td {
                padding: 15px;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>   

    <?php 
        header('Content-Type: text/html; charset=utf-8');
        require_once 'includes/Sessao.php';
        include_once 'classes/Registros.class.php';
        include_once 'classes/Aluno.class.php';

        $aluno = new Aluno;
        $ocorrencia = new Registro;

        $matricula = $_GET['matricula'];
        $aluno->BuscaMatriculaAluno($matricula);
        $array = $ocorrencia->getIdOcorrencias($matricula);

        


        print '<p><b>Nome do Aluno(a): </b>'.$aluno->getNome().'</p>';
        print '<p><b>Matricula: </b>'.$aluno->getMatricula().'</p>';
        print '<p><b>Turma: </b>'.$aluno->getTurma().'</p>';
        
        print '<br>';


        print '<h3><b><center>Ocorrências</b></h3></center><br>';

        $resp = count($array);
        for($i=0;$i<$resp;$i++){
                $ocorrencia->ImprimirOcorrencia($matricula,$array[$i]);
                if($ocorrencia->getApp()==1){
                    print '<p><b>Identificação Nº: '.$i.'</b></p>';
                    print '<p><b>Data: '.$ocorrencia->getData().'</b><p>';
                    print '<p><b>Efetuado por: </b>'.$ocorrencia->getUsuario().'</p>';
                    print '<p><b>Relato: </b></p>';
                    print '<div style="witdh="60%; right:10%;">';
                    print '<p align="justify">'.$ocorrencia->getRelato().'</p>';
                    print '</div>';
                    print '<br><br>';
                }
        }

        print '<h3><b><center>Suspensões</b></h3></center><br>';

        $array = $ocorrencia->getIdSuspensoes($matricula);

        $resp = count($array);
        for($i=0;$i<$resp;$i++){
            $ocorrencia->ImprimirSuspensao($matricula,$array[$i]);
            $ano = preg_replace("/[^0-9]/", "", $aluno->getTurma());

            print '<p><b>Colégios Univap- SP</b></p>';
            print '<p><b>Ata n.º '.$ocorrencia->getAta().' - Pág. n.º '.$ocorrencia->getPagina().'/'.$ocorrencia->ContaPaginas().'</b></p><br>';
            print '<p align="justify"><b>'.$ocorrencia->getData().'</b>, ás '.$ocorrencia->getHorario().', no '.'Colégios Univap - Unidade '.utf8_encode($ocorrencia->TrocaLocalUnidade($ocorrencia->getUnidade())).', foi realizada a reunião do <b>Conselho de Classe e Série</b>. A reunião foi Presidida pela Professora Mestra Érica Reis Costa Carvalho, Diretora do Colégio e teve a participação dos Coordenadores Professor Mestre Carlos Roberto Serafim, Professora Especialista Ana Paula de Oliveira Fornaziero e Professora Kelly Cristina dos Santos. Na reunião foi discutida a ocorrência com o aluno <b>'.$aluno->getNome().'</b> matriculado no '.$ano.' ano, do Ensino Médio Técnico em '.utf8_encode($ocorrencia->getCurso()).', período Diurno</p><br>';
            print '<h3><p><b>Relato:</b></p></h3><br>';

            print '<p>'.utf8_encode($ocorrencia->getRelato()).'</p><br>';

            print '<p align="justify">Devido ao(s) encaminhamento(s) citado(s) acima o(a) aluno(a) '.$aluno->getNome().' deverá ser suspenso pelo período de '.$ocorrencia->getPeriodo(). ' dias, que deverão ser cumpridos nos dias '.str_replace(".",",", $ocorrencia->getDiasCumpridos()).'. Nada mais a se tratar, deu-se por encerrada a reunião ás '.$ocorrencia->getHorariofinal().'. E eu, '.$_SESSION['nomeUser'].', '.$_SESSION['cargo'].' deste Colégio, lavrei a presente ata que, após lida e aprovada será assinada por mim e pelos demais participantes.</p>'; 
        }




    ?>

</body>
</html>