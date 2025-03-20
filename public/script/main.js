var flipped = false;

function flip(){
    if (!flipped){
        document.getElementById("flashcard").style = "transform : rotateY(180deg)";
        document.getElementById("Content").style = "transform : rotateY(180deg)";
        document.getElementById("side").style = "transform : rotateY(180deg)";
        document.getElementById("Questao").innerText = "Resposta";
    }
    else{
        document.getElementById("flashcard").style = "";
        document.getElementById("Content").style = "";
        document.getElementById("side").style = "";
        document.getElementById("Questao").innerText = "Questão";
    }

    flipped = !flipped;
}

function dropQuestion(button){
    let question = button.parentElement;

    question.remove();
}