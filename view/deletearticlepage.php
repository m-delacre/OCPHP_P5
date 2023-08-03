<article class="container-sm blogpost">
    <div class="blogpost-header">
        <h3 class="blogpost-title"><?= $post->getTitle(); ?></h3>
    </div>
    <p class="blogpost-info">Auteur : <?= $post->getAuthorPseudo(); ?> - Date de publication : <?= $post->getDateFr(); ?>
        <?php if ($post->getLastUpdate() != null) : ?>
            - Dernière mise à jour : <?= $post->getLastUpdate() ?>
        <?php endif; ?>
    </p>
    <h4 class="blogpost-chapo"><?= $post->getChapo(); ?></h4>
    <p class="blogpost-content"><?= $post->getContent(); ?></p>
</article>
<div class="container-sm deletearticlePage-bottom">
    <p class="container-sm">Voulez vous vraiment supprimer cet article ?</p>
    <div class="container-sm deletearticlePage-btnSection">
        <form class="modifyArticle-form" action="<?= './index.php?action=deleteArticle&id=' . $post->getId(); ?>" method="POST">
            <div class="modifyArticle-btn">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
        <form class="modifyArticle-form" action="<?= './index.php?action=modifyArticle&articleId=' . $post->getId(); ?>" method="POST">
            <div class="modifyArticle-btn">
                <button type="submit" class="btn btn-primary">Annuler</button>
            </div>
        </form>
    </div>
</div>