// Funciones para iniciar sesión
function login()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
        {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta["respuesta"] === false)
            {
                alert("Revise usuario y contraseña");
            } else {
                document.getElementById("login").style.display = "none";
                document.getElementById("menu").style.display = "block";
                switch (respuesta["perfil"]) {
                    case "Admin":
                        document.getElementById("Admin").style.display = "block";
                        document.getElementById("menu_usuario").innerHTML = "Usuario: " + respuesta["alias"];
                        break;
                    case "Gestor":
                        document.getElementById("Gestor").style.display = "block";
                        document.getElementById("menu_usuario").innerHTML = "Usuario: " + respuesta["alias"];
                        break;
                    case "Cliente":
                        document.getElementById("Cliente").style.display = "block";
                        document.getElementById("menu_usuario").innerHTML = "Usuario: " + respuesta["alias"];
                        break;
                    default:
                        break;
                }
            }
        }
    }
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    var params = "usuario=" + usuario + "&clave=" + clave;
    xhttp.open("POST", "login", true);
    xhttp.setRequestHeader('X-CSRF-TOKEN', token);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}

// Funcion para cerrar sesion
function logout()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200)
        {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta["respuesta"] === true)
            {
                alert("Sesion cerrada con éxito");
                document.getElementById("login").style.display = "block";
                document.getElementById("usuario").value = "";
                document.getElementById("clave").value = "";
                document.getElementById("menu").style.display = "none";
                document.getElementById("Admin").style.display = "none";
                document.getElementById("Gestor").style.display = "none";
                document.getElementById("Cliente").style.display = "none";
                document.getElementById("titulo").innerHTML = "";
                document.getElementById("contenido").innerHTML = "";
            } else {
                alert("Error al cerrar sesion");
            }
        }
    }
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.open('POST', 'logout', true);
    xhttp.setRequestHeader('X-CSRF-TOKEN', token);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

// Funcion para listar modulos en función de los permisos del usuario y del tipo de perfil
function listar()
{
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
        {
            var respuesta = JSON.parse(this.responseText);
            var modulos = respuesta["modulos"];
            // Si el usuario no tiene permiso para listar modulos se muestra un mensaje de error
            if (respuesta["respuesta"] === false)
            {
                var titulo = document.getElementById("titulo");
                titulo.innerHTML = "<h2>Listado de Modulos</h2>";
                var contenido = document.getElementById("contenido");
                contenido.innerHTML = "<h2 class='bg-danger'>El usuario no tiene permiso para listar modulos</h2>";
            // Si el usuario tiene permiso para listar modulos se muestra la tabla con los modulos
            } else {
                var titulo = document.getElementById("titulo");
                titulo.innerHTML = "<h2>Listado de Modulos</h2>";
                var contenido = document.getElementById("contenido");
                var tabla = "<table class='table table-bordered table-hover'><thead class='table-dark'><tr><th scope='col'>Id</th><th scope='col'>Nombre</th><th scope='col'>Curso</th><th scope='col'>Horas Semanales</th><th scope='col'>Ciclo</th></tr></thead><tbody>";
                for(var i = 0; i < modulos.length; i++)
                {
                    tabla +=
                        "<tr><th scope='row'>" + modulos[i]["id"] + "</th>" +
                        "<td>" + modulos[i]["nombre"] + "</td>" +
                        "<td>" + modulos[i]["curso"] + "</td>" +
                        "<td>" + modulos[i]["horasSemanales"] + "</td>" +
                        "<td>" + modulos[i]["ciclo"] + "</td></tr>";
                }
                tabla += "</tbody></table>";
                contenido.innerHTML = tabla;
            }
        }
    }
    xhttp.open("GET", "modulo", true);
    xhttp.send();
}
