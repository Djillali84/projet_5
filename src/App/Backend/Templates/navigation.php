<?php
use function OpenFram\escape_to_html as h;
use function OpenFram\u;

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">


        <div class="navbar-wrapper">
            <a class="navbar-brand" href="/">

                <i class="material-icons">home</i>

            </a>
        </div>


        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end">

            <form class="navbar-form">
                <!-- meme vide elle est  necessaire pour l'affichage de la navbar sur periphérique mobile  -->
            </form>


            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Compte
                        </p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- End Navbar -->