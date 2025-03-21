function createModal(title){
    let modalBg = document.createElement('Div');
    modalBg.className = 'modalBG';
    let modalContainer = document.createElement('Div');
    modalContainer.id = "modalContainer";

    document.body.appendChild(modalBg);
    modalBg.appendChild(modalContainer)

    let header = document.createElement('header');
    modalContainer.appendChild(header);

    let h2 = document.createElement('h2');
    h2.innerText = title;

    header.appendChild(h2);
    header.innerHTML += '<svg onclick = "destroyModal()" xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000000"><path d="m332-285.33 148-148 148 148L674.67-332l-148-148 148-148L628-674.67l-148 148-148-148L285.33-628l148 148-148 148L332-285.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/></svg>';

    let content = document.createElement('div');
    content.id = "ModelContent";

    modalContainer.appendChild(content);
}

createModal('Adicionar Questão');
destroyModal();

function destroyModal(){
    let modal = document.getElementById("modalContainer");

    if (modal != undefined){
        modal.parentElement.remove();
    }
}

