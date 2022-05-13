<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">La Costeña</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <label class="switch">
                            <input class="btn btn-dark" type="checkbox" id="toggleTheme" <?php if (isset($_COOKIE["theme"])) {
                                                                                                if ($_COOKIE["theme"] == "dark") {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            } ?>>
                        </label>
                    </a>
                </li>
            </ul>
            <form class="d-flex">
                <a href="Login/login.php" class="btn btn-light" style="background-color:#01d28e; border:#01d28e;">Iniciar sesión</a>
            </form>
        </div>
    </div>
</nav>