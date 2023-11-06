<!--Barra de navegacion-->
<?php
include "./models/users.php";
    $user     = new Users();
    $correo       = isset($_GET['correo'])?$_GET['correo']:null;
    $users    = $user->getUserByEmail($correo);
    $nombre   = '';
    $id   = '';
    $pass     = '';
    if($users){
        $nombre    =$users[0]['nombre'];
        $id =$users[0]['id'];
        $pass    =$users[0]['pass'];
      }
    ?>
    <?php
    if(!empty($nombre)){
    
            if (isset($users)) {
                ?>
                <script type="text/javascript">
                    var nombre = <?php echo json_encode([$nombre]) ?>;
                    $(document).ready(function () {
                        alertify.success("Bienvenido: " + nombre);
                    })
                </script>

                <?php
            } else if (!isset($users)) {
                ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            alertify.error("correo vacio");
                        })
                    </script>
                </div>
            <?php
}
            }
            ?>
<div class="container-fluid text-bg-secondary">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid col-12 col-lg-6 me-lg-auto mb-2 justify-content-center mb-md-0">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="./index.php?page=floreria&folder=usuario&title=Flowers House ♥">

                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="./index.php?page=categorias&folder=usuario&title=Categorias">
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="./index.php?page=carrito&folder=usuario&title=Carrito">
                                Carrito
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="./index.php?page=about&folder=usuario&title=Sobre Nosotros ♥">Nosotros</a>
                        </li>
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            <input type="search" class="form-control form-control-dark" placeholder="Buscar..."
                                aria-label="Buscar">

                        </form>
                        <a class="">
                            <button type="submit" name="btnSearch" class="btn mb-2">
                                <i class="fa-solid fa-magnifying-glass fa-shake fa-2xl" style="color: #53f9e5;"></i>
                            </button>
                        </a>
                        <a class="navbar-brand list-items" href="./index.php?folder=&page=login&id=" style="padding-left: 30%;">
		<i class="fa-solid fa-right-from-bracket" style="font-size: 40px;color: white;"></i>
</a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<!--Termina, barra de navegacion-->