
function sendRequest(request, values){
    let params = '';

    for (let i = 0; i < Object.keys(values[0]).length; i++) {
        if (i == 0){
            params += Object.keys(values[0])[i] +'='+ Object.values(values[0])[i];
        } else{
            params += '&'+Object.keys(values[0])[i] +'='+ Object.values(values[0])[i];
        }
    }

    let result = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            result = xhttp.response;
        }
    };
    xhttp.open("POST", request, false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);   

    console.log(result);

    return result;
}
