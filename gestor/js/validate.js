function validar(option, elementID) {


    if (option == 1) {
        validarRegistro(elementID);

    } else if (option == 2) {
        validarLogIn(elementID)
    }


}



function validarRegistro(elementID) {


    let form = document.getElementById(elementID);
    let send = true;

    let elementCounter = 0;

    while (send && elementCounter < form.length - 1) {

        if (form[elementCounter].value != "") {


            elementCounter++;
        } else {
            alert("El campo no debe estar vacio (" + form[elementCounter].name + ")");

            send = false;
        }




    }

    let pass1 = form[2];
    let passVerified = form[3];

    if (pass1.value != passVerified.value && pass1.value != "") {
        send = false;
        alert("las constraseñas no coinciden");

    }

    if (send) {
        form.submit();
    }

    // alert(pass1.value + passVerified.value);




    // for (let i = 0; i < form.length - 1; i++) {

    //     if (form[i].value != "") {
    //         send = true;
    //     } else {
    //         alert("El campo no debe estar vacio (" + form[i].name + ")");
    //         send = false;
    //     }

    // }






}

function validarLogIn(elementID) {

}