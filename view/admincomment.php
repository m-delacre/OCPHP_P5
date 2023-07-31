<div class="adminCommentPage container-sm">
    <h1>Les commentaires à traiter :</h1>
    <?php foreach ($comments as $comment) : ?>
        <div class="adminCommentPage-comment">
            <div class="adminCommentPage-comment-author">
                <p>Auteur : <?= $comment->getAuthorPseudo(); ?>
            </div>
            <div class="adminCommentPage-comment-content">
                <p>Commentaire : <?= $comment->getComment(); ?></p>
            </div>
            <form action=<?= "./index.php?action=manageComment&commentID=" . $comment->getId() . "&articleID=" . $comment->getIdArticle() ?> method="POST">
                <input type="radio" id="visible" name="is_visible" value="visible">
                <label for="visible">visible</label><br>
                <input type="radio" id="hidden" name="is_visible" value="hidden">
                <label for="hidden">cacher</label><br>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>