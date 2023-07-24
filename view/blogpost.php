<div>
    <article>
        <h3><?= $post->getTitle(); ?></h3>
        <p>Auteur : <?= $post->getAuthorPseudo(); ?> - Date de publication : <?= $post->getDateFr(); ?></p>
        <?php if($post->getLastUpdate() != null) :?>
            <p>Dernière mise à jour : <?= $post->getLastUpdate() ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_isAdmin']) && $_SESSION['user_pseudo']) : ?>
            <a href=<?= "./index.php?action=modifyArticle&articleId=" . $_GET['id'] ?>>Modifier</a>
        <?php endif; ?>
        <h4><?= $post->getChapo(); ?></h4>
        <p><?= $post->getContent(); ?></p>
    </article>
    <div>
        <?php if (isset($_SESSION['user_pseudo'])) : ?>
            <form action=<?= "./index.php?action=postComment&id=" . $_GET['id'] ?> method="post">
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment :</label>
                    <input type="text" name="comment" class="form-control" id="comment" aria-describedby="comment">
                </div>
                <button type="submit" class="btn btn-primary">Commenter</button>
            </form>
        <?php else : ?>
            <p>Connectez vous pour commenter cette article.</p>
        <?php endif; ?>
    </div>
    <?php foreach ($comments as $comment) : ?>
        <div>
            <p>Auteur : <?= $comment->getAuthorPseudo(); ?> - Date de publication : <?= $comment->getDateFr(); ?></p>
            <p>Commentaire : <?= $comment->getComment(); ?></p>
        </div>
    <?php endforeach; ?>
</div>