<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?action=blog">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><?php if(isset($_SESSION['user_pseudo'])){echo $_SESSION['user_pseudo'];}?></a>
        </li>
        <?php if (isset($_SESSION['user_pseudo'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?action=deconnexion">Déconnexion</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?action=connexion">Connexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>