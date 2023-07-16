<?php if (!isset($_SESSION['user_pseudo'])) : ?>
    <div class="container-lg mt-5 mb-5">
        <form action="./index.php?action=connexion" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Addresse mail:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            <a href="./index.php?action=register" class="btn btn-primary">S'enregistrer</a>
        </form>
    </div>
<?php elseif (isset($_SESSION['user_pseudo'])) : ?>
    <div class="alert alert-success" role="alert">
        <p>Bonjour <?= $_SESSION['user_pseudo'] ?> vous êtes déjà connecté(e).</p>
    </div>
<?php endif; ?>