<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of EquipSegDAO
 *
 * @author anderson
 */
class EquipSegDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados($base) {

        $select = " SELECT "
                        . " E.EQUIP_ID AS \"idEquip\" "
                        . " , E.NRO_EQUIP AS \"nroEquip\" "
                        . " , E.CLASSOPER_CD AS \"codClasseEquip\" "
                        . " , CARACTER(E.CLASSOPER_DESCR) AS \"descrClasseEquip\" "
                        . " , " 
                        . " CASE "
                            . " WHEN R.TP_EQUIP = 1 THEN 1 "
                            . " WHEN E.CLASSOPER_CD IN (4, 23, 227) THEN 2 "
                            . " WHEN E.CLASSOPER_CD IN (9, 6) THEN 3 "
                            . " WHEN E.CLASSOPER_CD = 211 OR R.TP_EQUIP = 2 THEN 4 "
                        . " END AS \"tipoEquip\" "
                    . " FROM "
                        . " V_EQUIP E "
                        . " , USINAS.ROLAO R "
                    . " WHERE "
                        . " E.EQUIP_ID = R.EQUIP_ID(+) "
                        . " AND " 
                        . " (R.TP_EQUIP IN (1, 2) "
                        . " OR " 
                        . " E.CLASSOPER_CD IN (4, 9, 6, 23, 211, 227)) ";
        
        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
    public function dadosECM($base) {

        $select = " SELECT "
                        . " E.EQUIP_ID AS \"idEquip\" "
                        . " , E.NRO_EQUIP AS \"nroEquip\" "
                        . " , E.CLASSOPER_CD AS \"codClasseEquip\" "
                        . " , CARACTER(E.CLASSOPER_DESCR) AS \"descrClasseEquip\" "
                        . " , CASE " 
                            . " WHEN E.CLASSOPER_CD = 35 "
                            . " THEN 1 "
                            . " ELSE 2 "
                        . " END AS \"tipoEquip\" "
                    . " FROM "
                        . " V_EQUIP E "
                    . " WHERE "
                        . " E.CLASSOPER_CD IN (5, 21, 35, 36, 216) ";
        
        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}
