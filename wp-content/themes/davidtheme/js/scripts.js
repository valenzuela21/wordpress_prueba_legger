
function validateCaracteresEspeciales(elemento) {
    let valorInput = elemento.value;
 
    if (elemento.required && valorInput.trim() == "" ) {
        messageAlert(elemento, 'El campo es requerido');
        return;
    }

  
    let expresionRegular = /[#"*,+¿¡?]/;

    if (expresionRegular.test(valorInput)) {
        messageAlert(elemento, 'Hay un error no son permitidos caracteres especiales ( # “ , * + ¿ ¡?)');
    }

}

function validateCheck(elemento){
    if (elemento.required && !elemento.checked) {
        messageAlert(elemento, 'El campo es requerido');
        return;
    }
}

function messageAlert(elemento, mensage) {;
    
    let nuevoElementoDiv = document.createElement('div');
    if (elemento.required && elemento.value.trim() == "") {
        nuevoElementoDiv.classList.add('alert_form');
        nuevoElementoDiv.innerHTML = "<p>" + mensage + "</p>";
        elemento.parentNode.insertBefore(nuevoElementoDiv, elemento.nextSibling);
    }else{
        nuevoElementoDiv.classList.add('alert_form');
        nuevoElementoDiv.innerHTML = "<p>" + mensage + "</p>";
        elemento.parentNode.insertBefore(nuevoElementoDiv, elemento.nextSibling);
        elemento.value = "";
    }
    setTimeout(function() {
        nuevoElementoDiv.remove();
    }, 3000);
}

