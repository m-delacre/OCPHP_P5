<div class="container-sm d-flex flex-column blogpage">
    <h1 class="blogpage-title">Tous nos articles :</h1>
    <div class="d-flex flex-wrap blogpage-allCard">
        <?php foreach ($posts as $post) : ?>
            <article class="blogpage-card">
                <h3 class="blogpage-card-title"><?= $post->getTitle(); ?></h3>
                <p class="text-body-secondary blogpage-card-author">Auteur : <?= $post->getAuthorPseudo(); ?>
                    <?php if ($post->getLastUpdate() != null) : ?>
                        - Dernière mise à jour : <?= $post->getLastUpdate() ?>
                    <?php endif; ?>
                </p>
                <p class="blogpage-card-chapo"><?= $post->getChapo(); ?></p>
                <a class="blogpage-card-btn card-link" href=<?= "./index.php?action=showPost&id=" . $post->getId(); ?>>Voir plus</a>
            </article>
        <?php endforeach; ?>
    </div>
</div>