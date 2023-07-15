<div>
    <article>
        <h3><?= $post->getTitle(); ?></h3>
        <p>Auteur : <?= $post->getAuthor(); ?> - Date de publication : <?= $post->getDateFr(); ?></p>
        <h4><?= $post->getChapo(); ?></h4>
        <p><?= $post->getContent(); ?></p>
    </article>
</div>