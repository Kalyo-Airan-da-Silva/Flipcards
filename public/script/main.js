var flipped = false;
var flash = [];

function flip(){
    if (!flipped){
        document.getElementById("flashcard").style = "transform : rotateY(180deg)";
        document.getElementById("Content").style = "transform : rotateY(180deg)";
        document.getElementById("side").style = "transform : rotateY(180deg)";
        document.getElementById("Questao").innerText = "Resposta";
        document.getElementById("questionText").innerText = flash.perresposta;
    }
    else{
        document.getElementById("flashcard").style = "";
        document.getElementById("Content").style = "";
        document.getElementById("side").style = "";
        document.getElementById("Questao").innerText = "Questão";
        document.getElementById("questionText").innerText = flash.perpergunta;
    }

    flipped = !flipped;
}

function dropQuestion(button){
    let question = button.parentElement.id;

    sendRequest("../src/lib/main.php", [{'rt' : 'pergunta', 'op' : 'delete', 'percodigo' : question}])
    updateScreen();
}

function getQuestions(){
    let questions = sendRequest("../src/lib/main.php", [{'rt' : 'pergunta', 'op' : 'montaPerguntas', 'matcodigo' : document.getElementById("Materia").value}])

    document.getElementById("infoContent").innerHTML = questions;
}

function getMaterias(){
    let materias = sendRequest("../src/lib/main.php", [{'rt' : 'materia', 'op' : 'montaMaterias'}])

    document.getElementById("Materia").innerHTML = materias;
}

function getFlashCard(){
    if (flipped){
        flip()
    } ;
    flash = JSON.parse(sendRequest("../src/lib/main.php", [{'rt' : 'pergunta', 'op' : 'montaFlashCard', 'matcodigo' : document.getElementById("Materia").value}]))

    document.getElementById("Content").innerHTML = flash.html;
}

function AddForm(tabela){
    switch (tabela) {
        case 'materia':
            document.getElementById("ModelContent").innerHTML = sendRequest("../src/lib/main.php", [{'rt' : 'materia', 'op' : 'getForm'}]);
            break;
        case 'pergunta':
            document.getElementById("ModelContent").innerHTML = sendRequest("../src/lib/main.php", [{'rt' : 'pergunta', 'op' : 'getForm'}]);
            
            sel = document.getElementById('Materia');
            document.getElementById("matdescricao").value = sel.options[sel.selectedIndex].text;
            break;
        default:
            break;
    }
}

function inserirMateria(){
    let matdescricao = document.getElementById("matdescricao").value;

    sendRequest("../src/lib/main.php", [{'rt' : 'materia', 'op' : 'post', "matdescricao" : matdescricao}]);

    updateScreen();
    destroyModal();
}

function inserirPergunta(){
    let matcodigo = document.getElementById("Materia").value;
    let perpergunta = document.getElementById("perpergunta").value;
    let perresposta = document.getElementById("perresposta").value;

    sendRequest("../src/lib/main.php", [{'rt' : 'pergunta', 
                                         'op' : 'post',
                                         'matcodigo' : matcodigo,
                                         'perpergunta' : perpergunta,
                                         'perresposta' : perresposta}]);

    updateScreen();
    destroyModal();
}

function updateScreen(){
    getMaterias()
    getQuestions()
    getFlashCard()
}

updateScreen();