<div>
    <?php if ($post == null) : ?>
        <p>L'article n'existe pas.</p>
    <?php else : ?>
        <article class="container-sm blogpost">
            <div class="blogpost-header">
                <h3 class="blogpost-title"><?= $post->getTitle(); ?></h3>
                <?php if (AdminController::isAdmin()) : ?>
                    <div class="blogpost-modif">
                        <a class="btn btn-primary blogpost-modif" href=<?= "./index.php?action=modifyArticle&articleId=" . $_GET['id'] ?>>Modifier</a>
                    </div>
                <?php endif; ?>
            </div>
            <p class="blogpost-info">Auteur : <?= $post->getAuthorPseudo(); ?> - Date de publication : <?= $post->getDateFr(); ?>
                <?php if ($post->getLastUpdate() != null) : ?>
                    - Dernière mise à jour : <?= $post->getLastUpdate() ?>
                <?php endif; ?>
            </p>
            <h4 class="blogpost-chapo"><?= $post->getChapo(); ?></h4>
            <p class="blogpost-content"><?= $post->getContent(); ?></p>
        </article>
        <div class="container-sm comment-writer">
            <?php if (isset($_SESSION['user_pseudo'])) : ?>
                <form action=<?= "./index.php?action=postComment&id=" . $_GET['id'] . "&succeed" ?> method="post">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Laissez un commentaire :</label>
                        <input type="text" name="comment" class="form-control" id="comment" aria-describedby="comment">
                    </div>
                    <button type="submit" class="btn btn-primary">Commenter</button>
                </form>
            <?php else : ?>
                <p>Connectez vous pour commenter cette article.</p>
            <?php endif; ?>
        </div>
        <?php if (isset($_GET['succeed'])) : ?>
            <div class="container-sm">
                <p class="blogpost-newComment">commentaire envoyé et en attente de validation par un administrateur.</p>
            </div>
        <?php endif; ?>
</div>
<div class="container-sm comment-section">
    <?php foreach ($comments as $comment) : ?>
        <div class="comment">
            <div class="comment-section-top">
                <p class="comment-section-top-author">Auteur : <?= $comment->getAuthorPseudo(); ?></p>
                <p class="comment-section-top-date">Date de publication : <?= $comment->getDateFr(); ?></p>
            </div>
            <div class="comment-section-bot">
                <p>Commentaire : <?= $comment->getComment(); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php endif; ?>
</div>