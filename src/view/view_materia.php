<?php

header('Content-type: text/html; charset=utf-8');  

class viewMateria{
    public function montaMaterias(){
        require_once '../model/model_materia.php';
        $model = new ModelMateria();

        $html = "";

        foreach ($model->getAll() as $materia) {
            $html .= "<option value=".$materia['matcodigo'].">".$materia['matdescricao']."</option>";     
        } 

        echo $html;
    }

    public function formMateria(){
        $html ='<form>
                    <label for="matdescricao">Nome da Matéria</label>
                    <input type="text" id ="matdescricao" name="matdescricao">

                    <button type="submit" onclick = "inserirMateria()">Cadastrar</button>
                </form>';

        echo $html;
    }
}