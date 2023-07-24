<?php foreach ($comments as $comment) : ?>
    <div>
        <p>Auteur : <?= $comment->getAuthorPseudo(); ?>
        <p>Commentaire : <?= $comment->getComment(); ?></p>
        <form action= <?= "./index.php?action=manageComment&commentID=" . $comment->getId() . "&articleID=" . $comment->getIdArticle() ?> method="POST">
            <input type="radio" id="visible" name="is_visible" value="visible">
            <label for="visible">visible</label><br>
            <input type="radio" id="hidden" name="is_visible" value="hidden">
            <label for="hidden">hidden</label><br>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
<?php endforeach; ?>