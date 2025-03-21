<?php

header('Content-type: text/html; charset=utf-8');  

class viewPergunta{
    public function montaPerguntas(){
        require_once '../model/model_pergunta.php';
        $model = new ModelPergunta();

        $html = "";
        foreach ($model->getAll() as $pergunta) {
            $html .= "
                <div class = 'Question' id = '".$pergunta['percodigo']."'>
                    <svg xmlns='http://www.w3.org/2000/svg' height='40px' viewBox='0 -960 960 960' width='40px' fill='#000000'><path d='M428.67-326.67q.66-75 15.83-108.83t59.5-73.83q41.67-37.34 63.83-67.84 22.17-30.5 22.17-66.5 0-43.66-29.17-72.66-29.16-29-81.5-29-51.66 0-79.16 30t-39.84 62L270-692.67q21.67-60.66 75.33-104Q399-840 479.33-840q101.67 0 156.5 56.5 54.84 56.5 54.84 135.83 0 48.67-20.84 86.5-20.83 37.84-66.16 81.5-49 47-59.17 71.84-10.17 24.83-10.83 81.16h-105ZM479.33-80Q449-80 427.5-101.5T406-153.33q0-30.34 21.5-51.84 21.5-21.5 51.83-21.5 30.34 0 51.84 21.5 21.5 21.5 21.5 51.84 0 30.33-21.5 51.83T479.33-80Z'/></svg>
                    <h3>".$pergunta['perpergunta']."</h3>
                    <div class = 'iconEvents' onclick = 'dropQuestion(this)'>
                        <svg xmlns='http://www.w3.org/2000/svg' height='40px' viewBox='0 -960 960 960' width='40px' fill='#000000'><path d='M267.33-120q-27.5 0-47.08-19.58-19.58-19.59-19.58-47.09V-740H160v-66.67h192V-840h256v33.33h192V-740h-40.67v553.33q0 27-19.83 46.84Q719.67-120 692.67-120H267.33Zm425.34-620H267.33v553.33h425.34V-740Zm-328 469.33h66.66v-386h-66.66v386Zm164 0h66.66v-386h-66.66v386ZM267.33-740v553.33V-740Z'/></svg>
                    </div>
                </div>";     
        } 

        echo $html;
    }


    public function montaFlashCard(){
        require_once '../model/model_pergunta.php';
        $model = new ModelPergunta();

        $html = "";

        foreach ($model->getRandom() as $pergunta) {
            $html .= "<h2 Id = 'Questao'>Questão</h2>
                      <h3 id = 'questionText'>".$pergunta['perpergunta']."</h3>";     
                      
            $data['perresposta'] = $pergunta['perresposta'];
            $data['perpergunta'] = $pergunta['perpergunta'];
        } 

        $data['html'] = $html;

        echo json_encode($data);        
    }

    
    public function formPergunta(){
        $html ='<form>
                    <label for="matdescricao">Matéria</label>
                    <input type="text" disabled id ="matdescricao" name="matdescricao">

                    <label for="perpergunta">Pergunta</label>
                    <textarea id ="perpergunta" name="perpergunta"></textarea>
                    
                    <label for="perresposta">Resposta</label>
                    <textarea id ="perresposta" name="perresposta"></textarea>
                    
                    <button type="submit" onclick = "inserirPergunta()">Cadastrar</button>
                </form>';

        echo $html;
    }
}