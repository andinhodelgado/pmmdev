<?php

require_once('./control/InserirDadosMMCTR.class.php');

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($info)):

    $inserirDadosMMCTR = new InserirDadosMMCTR();
    echo $inserirDadosMMCTR->salvarDadosBolFechadoMM($info, "inserirbolfechadodt");
    
endif;