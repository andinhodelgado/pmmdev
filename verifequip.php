<?php

require('./control/EquipCTR.class.php');

$equipCTR = new EquipCTR();
$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($info)):

    echo $retorno = $equipCTR->verif($info);

endif;