<div>
    <h1>Tous les articles du site :</h1>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h3><?= $post->getTitle(); ?></h3>
            <p>Auteur : <?= $post->getAuthorPseudo(); ?> - Date de publication : <?= $post->getDateFr(); ?>
                <?php if ($post->getLastUpdate() != null) : ?>
                    - Dernière modification : <?= $post->getLastUpdate() ?>
                <?php endif; ?>
            </p>
            <h4><?= $post->getChapo(); ?></h4>
            <a href=<?= "./index.php?action=modifyArticle&articleId=" . $post->getId(); ?>>Modifier</a>
        </article>
    <?php endforeach; ?>
</div>