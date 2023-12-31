<?php if (!isset($_SESSION['user_pseudo'])) : ?>
    <?php if (isset($message)) : ?>
        <div class="container-lg alert alert-danger mt-5" role="alert">
            <p>Erreur dans les champs renseignés !</p>
        </div>
    <?php endif; ?>
    <div class="container-lg">
        <form class="loginpage" action="./index.php?action=connexion" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Addresse mail:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            <a href="./index.php?action=register" class="btn btn-primary">S'enregistrer</a>
        </form>
    </div>
<?php elseif (isset($_SESSION['user_pseudo'])) : ?>
    <div class="container-lg alert alert-success loginpage" role="alert">
        <p>Bonjour <?= $_SESSION['user_pseudo'] ?> vous êtes déjà connecté(e).</p>
    </div>
<?php endif; ?>