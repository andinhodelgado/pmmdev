<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('./model/dao/EquipSegDAO.class.php');
/**
 * Description of EquipSegCTR
 *
 * @author anderson
 */
class EquipSegCTR {

    //put your code here

    public function dados() {

        $equipSegDAO = new EquipSegDAO();

        $dados = array("dados" => $equipSegDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
        
    }

}
