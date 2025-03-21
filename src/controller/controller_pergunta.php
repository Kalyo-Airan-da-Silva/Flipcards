<?php

require_once '../model/model_pergunta.php';

class ControllerPergunta{
    public function montaPerguntas(){
        require_once '../view/view_pergunta.php';
        $view = new viewPergunta();
        $view->montaPerguntas();
    }

    public function montaFlashCard(){
        require_once '../view/view_pergunta.php';
        $view = new viewPergunta();
        $view->montaFlashCard();
    }

    public function getForm(){
        require_once "../view/view_pergunta.php";
        $view = new viewPergunta();
        $view->formPergunta();
    }

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