<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?action=blog">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?action=contact">Contact</a>
        </li>
        <?php if (isset($_SESSION['USER_ID'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Déconnexion</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Connexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>