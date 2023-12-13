<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="vistas/img/plantilla/logo.jpg" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Correo electrónico</label>
                            <input type="email" class="form-control" id="ingemail" name="ingemail" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="ingpassword" name="ingpassword" placeholder="Ingresa tu contraseña">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Recordar
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ingresar</button>
                        <?php
$login = new ControladorAdministrador();
$login->ctrIngresoAdministrador();

?>

                    </form>



                </div>
            </div>
        </div>
    </div>
