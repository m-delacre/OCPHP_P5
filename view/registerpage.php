<?php if (!isset($_SESSION['user_pseudo'])) : ?>
    <div class="container-lg mt-5 mb-5">
        <form action="./index.php?action=register" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Addresse mail:</label>
                <input type="email" name="email" class="form-control" id="email" maxlength="255" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" name="password" class="form-control" id="password" maxlength="255" required>
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prénom :</label>
                <input type="firstName" name="firstName" class="form-control" id="firstName" maxlength="255" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Nom :</label>
                <input type="lastName" name="lastName" class="form-control" id="lastName" maxlength="255" required>
            </div>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo :</label>
                <input type="pseudo" name="pseudo" class="form-control" id="pseudo" maxlength="15" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description (280 caractère max) :</label>
                <textarea type="textarea" name="description" class="form-control" id="description" maxlength="280"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">S'enregistrer</button>
        </form>
    </div>
<?php elseif (isset($_SESSION['user_pseudo'])) : ?>
    <div class="alert alert-success" role="alert">
        <p>Bonjour <?= $_SESSION['user_pseudo'] ?> vous êtes déjà connecté(e).</p>
    </div>
<?php endif; ?>