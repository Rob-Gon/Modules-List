<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/funciones.js') }}"></script>

    <style>
        .abs-center {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
        }
    </style>
    <title>Aplicación de IES</title>
</head>

<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                    <!-- Menu -->
                    <section id="menu" style="display:none">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-body">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">
                                    <div id="menu_usuario"></div>
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item" id="listar">
                                            <a class="nav-link active" aria-current="page" onclick="return listar()" href="#">Listar</a>
                                        </li>
                                        <li class="nav-item" id="logout">
                                            <a class="nav-link active" aria-current="page" onclick="return logout()" href="#">Cerrar Sesión</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </section>

                    <br>

                    <!-- Titulo -->
                    <section id="Admin" style="display:none">
                        <h2 class='bg-success'>Contenido de usuario admin</h2>
                    </section>
                    <section id="Cliente" style="display:none">
                        <h2 class='bg-info'>Contenido de usuario cliente</h2>
                    </section>
                    <section id="Gestor" style="display:none">
                        <h2 class='bg-warning'>Contenido de usuario gestor</h2>
                    </section>

                    <section id="titulo">

                    </section>
                    <section id="contenido">

                    </section>

                    <!-- Login -->
                    <section id="login">
                        <div class="abs-center">
                            <div class="card-deck">
                                <div class=" card text-bg-primary text-center p-3" style="max-width: 18rem;">
                                    <div class="card-header">
                                        <h4 class="card-title">Login de IES</h4>
                                        <p class="card-category"></p>
                                    </div>
                                    <div class="card-body">
                                        <form onsubmit="return login()" method="post">
                                            @csrf
                                            <div class="form-group has-label">
                                                Usuario
                                                <input aria-describedby="addon-right addon-left" type="text" id="usuario" name="usuario" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group has-label">
                                                Password
                                                <input aria-describedby="addon-right addon-left" type="password" id="clave" name="clave" placeholder="" class="form-control">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                            </div>
                                            <button type="submit" btn btn-fill btn-info>Iniciar Sesión</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
