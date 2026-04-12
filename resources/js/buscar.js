var input2 = document.getElementById("DocumentoUser");

var TBodyUsuarios = document.getElementById("TBodyUsuarios");

input2.addEventListener("input", function () {
    realizarBusqueda2(input2);
});

function realizarBusqueda2(input2) {
    var _token = document.querySelector("[data-id=_token]");
    var valorABuscar = input2.value;

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "/Usuario/buscar", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", _token.value);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var usuarios = JSON.parse(xhr.responseText);
            // console.log(usuarios);
            TBodyUsuarios.innerHTML = usuarios;
        } else {
            console.error(
                "Error en la solicitud. Código de estado: " + xhr.status
            );
        }
    };

    // Puedes enviar datos en el cuerpo de la solicitud
    var data =
        "input=" +
        encodeURIComponent(input2.name) +
        "&value=" +
        encodeURIComponent(valorABuscar);
    xhr.send(data);
}

realizarBusqueda2(input2);
