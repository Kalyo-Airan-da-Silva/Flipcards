var flipped = false;

function flip(){
    if (!flipped){
        document.getElementById("flashcard").style = "transform : rotateY(180deg)";
        document.getElementById("Content").style = "transform : rotateY(180deg)";
    }
    else{
        document.getElementById("flashcard").style = "";
        document.getElementById("Content").style = "";
    }

    flipped = !flipped;
}