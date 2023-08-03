<nav class="navbar bg-dark border-body mb-0 pb-0 d-flex justify-content-center align-items-center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-white" href="./index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="./index.php?action=blog">Blog</a>
        </li>
        <?php if(isset($_SESSION['user_pseudo'])): ?>
            <li class="nav-item header-userName">
                <p class="nav-link text-white"><?= $_SESSION['user_pseudo']; ?></p>
            </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_pseudo'])) : ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="./index.php?action=deconnexion">Déconnexion</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="./index.php?action=connexion">Connexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>