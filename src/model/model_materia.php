<?php

class ModelMateria{
    private $matcodigo;
    private $matdescricao;

    public function setMatcodigo(){
        $this->matcodigo = filter_var($_REQUEST['matcodigo'], FILTER_SANITIZE_NUMBER_INT);
    }

    public function setMatdescricao(){
        $this->matdescricao = filter_var($_REQUEST['matdescricao'], FILTER_SANITIZE_SPECIAL_CHARS); 
    }

    public function getAll(){
        $result = [];
        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSql("SELECT * FROM TBMATERIA");
        $query->open();

        while($row = $query->Next()) {
            array_push($result, $row);
        }

        echo json_encode($result);
    }
    
    private function getNextMatCodigo(){
        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSql("select coalesce(max(matcodigo),0)+1 as cod from tbmateria");
        $query->open();

        return $query->Next()['cod'];
    }


    public function insert(){
        $this->matcodigo = $this->getNextMatCodigo();
        $this->setMatdescricao();

        
        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSQL("INSERT INTO TBMATERIA VALUES($1, $2, 1)");
        $query->setValues([$this->matcodigo, $this->matdescricao]);
        $query->DML();

        if(!$query->DML()){
            echo false;
        }
        else{
            echo true;
        }
    }
}