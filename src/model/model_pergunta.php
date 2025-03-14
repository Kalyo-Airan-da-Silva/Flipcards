<?php

class modelPergunta{
    private $matcodigo;
    private $percodigo;
    private $perpergunta;
    private $perresposta;

    public function setPercodigo(){
        $this->percodigo = filter_var($_REQUEST['percodigo'], FILTER_SANITIZE_NUMBER_INT);
    }


    public function setMatcodigo(){
        $this->matcodigo = filter_var($_REQUEST['matcodigo'], FILTER_SANITIZE_NUMBER_INT);
    }

    public function setPerPergunta(){
        $this->perpergunta = filter_var($_REQUEST['perpergunta'], FILTER_SANITIZE_SPECIAL_CHARS); 
    }

    public function setPerResposta(){
        $this->perresposta = filter_var($_REQUEST['perresposta'], FILTER_SANITIZE_SPECIAL_CHARS); 
    }

    public function getAll(){
        $result = [];
        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSql("SELECT * FROM TBPERGUNTA");
        $query->open();

        while($row = $query->Next()) {
            array_push($result, $row);
        }

        echo json_encode($result);
    }
    
    private function getNextPerCodigo(){
        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSql("SELECT COALESCE(MAX(PERCODIGO),0)+1 AS COD FROM TBPERGUNTA");
        $query->open();

        return $query->Next()['cod'];
    }


    public function insert(){
        $this->percodigo = $this->getNextPerCodigo();
        $this->setPerPergunta();
        $this->setPerResposta();
        $this->setMatcodigo();

        
        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSQL("INSERT INTO TBPERGUNTA VALUES($1, $2, $3, $4)");
        $query->setValues([$this->percodigo, $this->perpergunta, $this->perresposta, $this->matcodigo]);
        $query->DML();

        if(!$query->DML()){
            echo false;
        }
        else{
            echo true;
        }
    }
    public function update(){
        $this->setPercodigo();
        $this->setPerPergunta();
        $this->setPerResposta();
        $this->setMatcodigo();


        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSQL("UPDATE TBPERGUNTA SET PERPERGUNTA = $2, PERRESPOSTA = $3, MATCODIGO = $4 WHERE PERCODIGO = $1");
        $query->setValues([$this->percodigo, $this->perpergunta, $this->perresposta, $this->matcodigo]);

        if(!$query->DML()){
            echo false;
        }
        else{
            echo true;
        }
    }        

    public function delete(){
        $this->setPercodigo();

        $query = Application::getInstance()->getDbConn()->newQuery();
        $query->setSQL("DELETE FROM TBPERGUNTA WHERE PERCODIGO = $1");
        $query->setValues([$this->percodigo]);

        if(!$query->DML()){
            echo false;
        }
        else{
            echo true;
        }
    }
}