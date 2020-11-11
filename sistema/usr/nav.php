<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"> <img src="../../img/logo.bmp" style="width:65px"> <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <?php 
                    if($idusu == 24 or $idusu == 49){
                ?>
                <li class="nav-item">
                    <a href="reg.php" class="nav-link">Registrar Usuario</a>
                </li>
                <li class="nav-item">
                    <a href="editusr.php" class="nav-link">Editar Usuario</a>
                </li>

                <?php
                    }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="<?php echo $nombre?>" disabled>
                <a href="salir.php" class="btn btn-outline-danger"> Salir</a>
            </form>
        </div>
    </nav>