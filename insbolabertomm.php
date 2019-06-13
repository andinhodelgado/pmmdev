<?php

require('./dao/InsBolAbertoMMDAO.class.php');
require('./dao/InserirDadosDAO.class.php');

$insBolAbertoMMDAO = new InsBolAbertoMMDAO();
$inserirDadosDAO = new InserirDadosDAO();
$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$retorno = '';

if (isset($info)):

//$dados = '{"boletim":[{"ativPrincBoletim":532,"codEquipBoletim":2733,"codMotoBoletim":1,"codTurnoBoletim":61,"dthrInicioBoletim":"27/12/2017 11:25","hodometroFinalBoletim":0.0,"hodometroInicialBoletim":5398.0,"idBoletim":1,"idExtBoletim":0,"osBoletim":101991,"statusBoletim":1}]}_{"aponta":[{"atividadeAponta":532,"dthrAponta":"27/12/2017 11:29","idAponta":1,"idBolAponta":1,"idExtBolAponta":0,"osAponta":101991,"paradaAponta":0,"transbordoAponta":0}]}|{"implemento":[{"codEquipImplemento":1288,"idApontImplemento":1,"idImplemento":4,"posImplemento":1},{"codEquipImplemento":0,"idApontImplemento":1,"idImplemento":5,"posImplemento":2},{"codEquipImplemento":0,"idApontImplemento":1,"idImplemento":6,"posImplemento":3}]}';

    $dados = $info['dado'];
    $inserirDadosDAO->salvarDados($dados, "insbolabertomm");
    $pos1 = strpos($dados, "_") + 1;
    $pos2 = strpos($dados, "|") + 1;
    $pos3 = strpos($dados, "?") + 1;
    $b = substr($dados, 0, ($pos1 - 1));
    $amm = substr($dados, $pos1, (($pos2 - 1) - $pos1));
    $i = substr($dados, $pos2, (($pos3 - 1) - $pos2));
    $af = substr($dados, $pos3);

    $jsonObjBoletim = json_decode($b);
    $jsonObjAponta = json_decode($amm);
    $jsonObjImplemento = json_decode($i);
    $jsonObjApontaAplicFert = json_decode($af);
    $dadosBoletim = $jsonObjBoletim->boletim;
    $dadosAponta = $jsonObjAponta->aponta;
    $dadosImplemento = $jsonObjImplemento->implemento;
    $dadosApontaAplicFert = $jsonObjApontaAplicFert->apontaaplicfert;

    $retorno = $insBolAbertoMMDAO->salvarDados($dadosBoletim, $dadosAponta, $dadosImplemento, $dadosApontaAplicFert);

    echo $retorno;

endif;

//echo $retorno;