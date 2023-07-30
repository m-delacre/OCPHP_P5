<div class="adminArticlePage container-sm blogpage">
    <h1 class="adminArticlePage-title">Tous les articles du site :</h1>
    <div class="adminArticlePage-articles">
        <?php foreach ($posts as $post) : ?>
            <article class="adminArticlePage-card">
                <h3 class="adminArticlePage-card-title"><?= $post->getTitle(); ?></h3>
                <p class="adminArticlePage-card-author">Auteur : <?= $post->getAuthorPseudo(); ?> - Date de publication : <?= $post->getDateFr(); ?>
                    <?php if ($post->getLastUpdate() != null) : ?>
                        - Dernière modification : <?= $post->getLastUpdate() ?>
                    <?php endif; ?>
                </p>
                <h4 class="adminArticlePage-card-chapo"><?= $post->getChapo(); ?></h4>
                <a class="adminArticlePage-card-btn card-link" href=<?= "./index.php?action=modifyArticle&articleId=" . $post->getId(); ?>>Modifier</a>
            </article>
        <?php endforeach; ?>
    </div>
</div>