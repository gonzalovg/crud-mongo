function borrarUser(id, num) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {


            let element = document.getElementById(num);


            element.innerHTML = "";

        }
    };
    xmlhttp.open("GET", "borrarUsuario.php?id=" + id, true);
    xmlhttp.send();
}

function borrarProd(id, num) {



    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {


            let element = document.getElementById(num);
            element.innerHTML = "";

        }
    };
    xmlhttp.open("GET", "borrarProducto.php?id=" + id, true);
    xmlhttp.send();
}

