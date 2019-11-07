<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('./dbutil_v1/Conn.class.php');
/**
 * Description of OSDAO
 *
 * @author anderson
 */
class OSDAO extends Conn {
    //put your code here

    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados($os) {

        $select = " SELECT DISTINCT "
                . " NRO_OS AS \"nroOS\" "
                . " , PROPRAGR_CD AS \"codProprOS\" "
                . " , CARACTER(PROPRAGR_DESCR) AS \"descrProprOS\" "
                . " , NVL(AREA_PROGR, 10) AS \"areaProgrOS\" "
                . " FROM "
                . " USINAS.V_PMM_OS "
                . " WHERE "
                . " NRO_OS = " . $os
                . " ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
    public function dadosClear() {

        $select = " SELECT DISTINCT "
                    . " NRO_OS AS \"nroOS\" "
                    . " , NVL(PROPRAGR_CD, 0)  AS \"codProprOS\" "
                    . " , NVL(CARACTER(PROPRAGR_DESCR), 'ESTRUTURAL') AS \"descrProprOS\" "
                    . " , NVL(AREA_PROGR, 10) AS \"areaProgrOS\" "
                . " FROM "
                    . " USINAS.V_PMM_OS ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}