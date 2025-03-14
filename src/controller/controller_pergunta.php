<?php

require_once '../model/model_pergunta.php';

class ControllerPergunta{
    public function get(){
        $model = new modelPergunta();
        $model->getAll();
    }
    
    public function post(){
        $model = new modelPergunta();
        $model->insert();
    }
    
    public function put(){
        $model = new modelPergunta();
        $model->update();
    }

    public function delete(){
        $model = new modelPergunta();
        $model->delete();
    }
}