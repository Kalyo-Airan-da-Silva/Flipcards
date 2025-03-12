<?php

require_once '../model/model_materia.php';

class ControllerMateria{
    public function get(){
        $model = new modelMateria();
        $model->getAll();
    }
    
    public function post(){
        $model = new modelMateria();
        $model->insert();
    }
    
    public function put(){
        
    }

    public function delete(){
        
    }
}