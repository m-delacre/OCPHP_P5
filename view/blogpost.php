<div>
    <article>
        <h3><?= $post->getTitle(); ?></h3>
        <p>Auteur : <?= $post->getAuthorPseudo(); ?> - Date de publication : <?= $post->getDateFr(); ?></p>
        <h4><?= $post->getChapo(); ?></h4>
        <p><?= $post->getContent(); ?></p>
    </article>

    <?php foreach ($comments as $comment) : ?>
        <div>
            <p>Auteur : <?= $comment->getAuthorPseudo();?> - Date de publication : <?= $comment->getDateFr(); ?></p>
            <p>Commentaire : <?= $comment->getComment(); ?></p>
    </div>
    <? endforeach; ?>
</div>